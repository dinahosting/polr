<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;

use App\Models\Link;
use App\Models\User;
use App\Helpers\UserHelper;

class AdminController extends Controller {
    /**
     * Show the admin panel, and process admin AJAX requests.
     *
     * @return Response
     */
    public function displayAdminPage(Request $request) {
        if (!$this->isLoggedIn()) {
            return redirect(route('login'))->with('error', 'Hasi saioa arbelera sartzeko.');
        }

        $username = session('username');
        $role = session('role');

        $admin_users = null;
        $admin_links = null;

        if ($this->currIsAdmin()) {
            $admin_users = User::paginate(15,['*'],'admin-users');
            $admin_links = Link::paginate(15,['*'],'admin-links');
        }

        $user = UserHelper::getUserByUsername($username);

        if (!$user) {
            return redirect(route('index'))->with('error', 'Kontua ez da baliozkoa, edo desgaituta dago.');
        }

        $user_links = Link::where('creator', $username)
            ->paginate(15,['*'],'user-links');

        return view('admin', [
            'role' => $role,
            'admin_users' => $admin_users,
            'admin_links' => $admin_links,
            'user_links' => $user_links,
            'api_key' => $user->api_key,
            'api_active' => $user->api_active,
            'api_quota' => $user->api_quota,
            'user_id' => $user->id
        ]);
    }

    public function changePassword(Request $request) {
        if (!$this->isLoggedIn()) {
            return abort(404);
        }
        $username = session('username');
        $old_password = $request->input('current_password');
        $new_password = $request->input('new_password');

        if (UserHelper::checkCredentials($username, $old_password) == false) {
            // Invalid credentials
            return redirect('admin')->with('error', 'Uneko pasahitza ez da baliozkoa. Saiatu berriro.');
        }
        else {
            // Credentials are correct
            $user = UserHelper::getUserByUsername($username);
            $user->password = Hash::make($new_password);
            $user->save();

            $request->session()->flash('success', "Pasahitza behar bezala aldatu da.");
            return redirect(route('admin'));
        }
    }
}
