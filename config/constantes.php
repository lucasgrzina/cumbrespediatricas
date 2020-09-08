<?php
return [
    'cookieRegistrado' => 'registrado_v4',
    'eventos' => [
        'cumbre' => [
            'nombre' => 'Abbott Cumbre pediatrica - 3/5',
            'prefix' => 'cumbrepediatrica',
            'controller' => 'HomeController',
            'view' => 'cumbre',
            'cookie' => 'cumbre',
            'activo' => true
        ],
        'similacmama' => [
            'nombre' => 'Similac Mama',
            'prefix' => 'similacmama',
            'controller' => 'HomeSimilaCMamaController',
            'view' => 'similacmama',
            'cookie' => 'similacmama1',
            'activo' => true
        ],
        'danoneday' => [
            'nombre' => 'Danone Day',
            'prefix' => 'danoneday',
            'controller' => 'HomeSimilaCMamaController',
            'view' => 'danoneday',
            'cookie' => 'danoneday',
            'activo' => false
        ],
        'similacmamatest' => [
            'nombre' => 'Similac Mama (Test)',
            'prefix' => 'similacmamatest',
            'controller' => 'HomeSimilaCMamaController',
            'view' => 'similacmama',
            'cookie' => 'similacmamatest',
            'activo' => true
        ],                     
    ],
    'recaptcha' => [
        'key' => '6LcNPcYZAAAAAI5sgO4CAlZxlGHgADMXtUCbARnh',
        'secret' => '6LcNPcYZAAAAADlvzKcu1uIRHw7HVprluNr1WxTf'
    ]
];