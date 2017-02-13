<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute-k onartuta egon behar du.',
    'active_url'           => ':attribute ez da URL baliodun bat.',
    'after'                => ':attribute-k :date baino geroagokoa izan behar du.',
    'alpha'                => ':attribute-k hizkiak bakarrik izan ditzake.',
    'alpha_dash'           => ':attribute-k hizkiak, zenbakiak eta marrak bakarrik izan ditzake.',
    'alpha_num'            => ':attribute-k hizkiak eta zenbakiak bakarrik izan ditzake.',
    'array'                => ':attribute-k matrize bat izan behar du.',
    'before'               => ':attribute-k :date baino lehenagokoa izan behar du.',
    'between'              => [
        'numeric' => ':attribute-k :min eta :max artean egon behar du.',
        'file'    => ':attribute-k :min eta :max kilobyte artean egon behar du.',
        'string'  => ':attribute-k :min eta :max karaktere artean egon behar du.',
        'array'   => ':attribute-k :min eta :max elementu bitarte izan behar ditu.',
    ],
    'boolean'              => ':attribute eremuak egia edo gezurra izan behar du.',
    'confirmed'            => ':attribute berrespena ez dator bat.',
    'date'                 => ':attribute ez da data baliodun bat.',
    'date_format'          => ':attribute-k ez du betetzen :format formatua.',
    'different'            => ':attribute-k eta :other-ek desberdinak izan behar dute.',
    'digits'               => ':attribute-k :digits digitu izan behar ditu.',
    'digits_between'       => ':attribute-k :min eta :max digitu bitarte izan behar ditu.',
    'email'                => ':attribute-k helbide elektroniko baliozko bat izan behar du.',
    'filled'               => ':attribute eremua beharrezkoa da.',
    'exists'               => 'Hautatutako :attribute baliogabea da.',
    'image'                => ':attribute-k irudi bat izan behar du.',
    'in'                   => 'Hautatutako :attribute baliogabea da.',
    'integer'              => ':attribute-k osoko zenbaki bat izan behar du.',
    'ip'                   => ':attribute-k IP helbide baliozko bat izan behar du.',
    'max'                  => [
        'numeric' => ':attribute ezin da izan :max baino handiagoa.',
        'file'    => ':attribute ezin da izan :max kilobyte baino handiagoa.',
        'string'  => ':attribute ezin da izan :max karaktere baino handiagoa.',
        'array'   => ':attribute-k ezin du izan :max elementu baino gehiago.',
    ],
    'mimes'                => ':attribute-k mota honetako fitxategi bat izan behar du: :values.',
    'min'                  => [
        'numeric' => ':attribute-k :min izan behar ditu gutxienez.',
        'file'    => ':attribute-k :min kilobyte izan behar ditu gutxienez.',
        'string'  => ':attribute-k :min karaktere izan behar ditu gutxienez.',
        'array'   => ':attribute-k :min elementu izan behar ditu gutxienez.',
    ],
    'not_in'               => 'Hautatutako :attribute baliogabea da.',
    'numeric'              => ':attribute-k zenbaki bat izan behar du.',
    'regex'                => ':attribute formatua baliogabea da.',
    'required'             => ':attribute eremua beharrezkoa da.',
    'required_if'          => ':attribute eremua beharrezkoa da :other :value denean.',
    'required_with'        => ':attribute eremua beharrezkoa da :values ageri denean.',
    'required_with_all'    => ':attribute eremua beharrezkoa da :values ageri denean.',
    'required_without'     => ':attribute eremua beharrezkoa da :values ageri ez denean.',
    'required_without_all' => ':attribute eremua beharrezkoa da :values bat ere ageri ez denean.',
    'same'                 => ':attribute-k eta :other-ek bat etorri behar dute.',
    'size'                 => [
        'numeric' => ':attribute-k :size izan behar du.',
        'file'    => ':attribute-k :size kilobyte izan behar ditu.',
        'string'  => ':attribute-k :size karaktere izan behar ditu.',
        'array'   => ':attribute-k :size elementu izan behar ditu.',
    ],
    'unique'               => ':attribute erabilita dago.',
    'url'                  => ':attribute formatua baliogabea da.',
    'timezone'             => ':attribute-k zona baliozko bat izan behar du.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
