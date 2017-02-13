<?php
namespace App\Http\Controllers;
use Mail;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;

use App\Helpers\CryptoHelper;
use App\Helpers\UserHelper;

use App\Factories\UserFactory;

class UserController extends Controller {
    /**
     * Show pages related to the user control panel.
     *
     * @return Response
     */
    public function displayLoginPage(Request $request) {
        return view('login');
    }

    public function displaySignupPage(Request $request) {
        return view('signup');
    }

    public function displayLostPasswordPage(Request $request) {
        return view('lost_password');
    }

    public function performLogoutUser(Request $request) {
        $request->session()->forget('username');
        return redirect()->route('index');
    }

    public function performLogin(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        $credentials_valid = UserHelper::checkCredentials($username, $password);

        if ($credentials_valid != false) {
            // log user in
            $role = $credentials_valid['role'];
            $request->session()->put('username', $username);
            $request->session()->put('role', $role);

            return redirect()->route('index');
        }
        else {
            return redirect('login')->with('error', 'Pasahitza ez da baliozkoa, edo kontua desaktibatuta dago. Saiatu berriro.');
        }
    }

    public function performSignup(Request $request) {
        if (env('POLR_ALLOW_ACCT_CREATION') == false) {
            return redirect(route('index'))->with('error', 'Sentitzen dugu, baina erregistroa desgaituta dago.');
        }

        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');

        if (!self::checkRequiredArgs([$username, $password, $email])) {
            // missing a required argument
            return redirect(route('signup'))->with('error', 'Bete nahitaezko eremu guztiak.');
        }

        $ip = $request->ip();

        $user_exists = UserHelper::userExists($username);
        $email_exists = UserHelper::emailExists($email);

        if ($user_exists || $email_exists) {
            // if user or email email
            return redirect(route('signup'))->with('error', 'Sentitzen dugu, baina zure helbide elektronikoa edo erabiltzaile-izena badaude lehendik ere. Saiatu berriro.');
        }

        $email_valid = UserHelper::validateEmail($email);

        if ($email_valid == false) {
            return redirect(route('signup'))->with('error', 'Erabili baliozko helbide elektroniko bat izena emateko.');
        }

        $acct_activation_needed = env('POLR_ACCT_ACTIVATION');

        if ($acct_activation_needed == false) {
            // if no activation is necessary
            $active = 1;
            $response = redirect(route('login'))->with('success', 'Eskerrik asko izena emateagatik! Saioa has dezakezu orain.');
        }
        else {
            // email activation is necessary
            $response = redirect(route('login'))->with('success', 'Eskerrik asko izena emateagatik! Berretsi zure helbide elektronikoa, jarraitzeko.');
            $active = 0;
        }

        $api_active = false;
        $api_key = null;

        if (env('SETTING_AUTO_API')) {
            // if automatic API key assignment is on
            $api_active = 1;
            $api_key = CryptoHelper::generateRandomHex(env('_API_KEY_LENGTH'));
        }


        $user = UserFactory::createUser($username, $email, $password, $active, $ip, $api_key, $api_active);

        if ($acct_activation_needed) {
            Mail::send('emails.activation', [
                'username' => $username, 'recovery_key' => $user->recovery_key, 'ip' => $ip
            ], function ($m) use ($user) {
                $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

                //$m->to($user->email, $user->username)->subject(env('APP_NAME') . ' account activation');
                $m->to($user->email, $user->username)->subject(env('APP_NAME') . ' kontuaren aktibazioa');
            });
        }

        return $response;
    }

    public function performSendPasswordResetCode(Request $request) {
        if (!env('SETTING_PASSWORD_RECOV')) {
            return redirect(route('index'))->with('error', 'Pasahitza berreskuratzeko aukera desgaituta dago.');
        }

        $email = $request->input('email');
        $ip = $request->ip();
        $user = UserHelper::getUserByEmail($email);

        if (!$user) {
            return redirect(route('lost_password'))->with('error', 'Helbide elektronikoa ez dago erabiltzaile bati lotua.');
        }

        $recovery_key = UserHelper::resetRecoveryKey($user->username);

        Mail::send('emails.lost_password', [
            'username' => $user->username, 'recovery_key' => $recovery_key, 'ip' => $ip
        ], function ($m) use ($user) {
            $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

            $m->to($user->email, $user->username)->subject(env('APP_NAME') . ' Pasahitza berrezartzea');
        });

        return redirect(route('index'))->with('success', 'Pasahitza berrezartzeko mezu elektronikoa bidali da. Begiratu sarrerako ontzia xehetasunak ikusteko.');
    }

    public function performActivation(Request $request, $username, $recovery_key) {
        $user = UserHelper::getUserByUsername($username, true);

        if (UserHelper::userResetKeyCorrect($username, $recovery_key, true)) {
            // Key is correct
            // Activate account and reset recovery key
            $user->active = 1;
            $user->save();

            UserHelper::resetRecoveryKey($username);
            return redirect(route('login'))->with('success', 'Kontua aktibatu da. Saioa has dezakezu orain.');
        }
        else {
            return redirect(route('index'))->with('error', 'Erabiltzaile-izena edo aktibazio-gakoa ez da zuzena.');
        }
    }

    public function performPasswordReset(Request $request, $username, $recovery_key) {
        $new_password = $request->input('new_password');
        $user = UserHelper::getUserByUsername($username);

        if (UserHelper::userResetKeyCorrect($username, $recovery_key)) {
            if (!$new_password) {
                return view('reset_password');
            }

            // Key is correct
            // Reset password
            $user->password = Hash::make($new_password);
            $user->save();

            UserHelper::resetRecoveryKey($username);
            return redirect(route('login'))->with('success', 'Pasahitza berrezartzea. Saioa has dezakezu orain.');
        }
        else {
            return redirect(route('index'))->with('error', 'Erabiltzaile-izena edo berrezartze-gakoa ez da zuzena.');
        }

    }

}
