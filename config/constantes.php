<?php
return [
    'cookieRegistrado' => 'registrado_v4',
    'eventos' => [
        'cumbre' => [
            'nombre' => 'Abbott Cumbre pediatrica - 3/5',
            'prefix' => 'cumbrepediatrica',
            'controller' => 'HomeController',
            'view' => 'cumbre',
            'cookie' => 'cumbre3',
            'activo' => true
        ],
        'similacmama' => [
            'nombre' => 'Similac Mama - 9/9',
            'prefix' => 'similacmama',
            'controller' => 'HomeSimilaCMamaController',
            'view' => 'similacmama',
            'cookie' => 'similacmama1',
            'activo' => false
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
        'similacmama169' => [
            'nombre' => 'Similac Mama - 16/9',
            'prefix' => 'similacmama',
            'controller' => 'HomeSimilaCMamaController',
            'view' => 'similacmama',
            'cookie' => 'similacmama_16_9',
            'activo' => true
        ],                           
    ],
    'recaptcha' => [
        'key' => '6LcNPcYZAAAAAI5sgO4CAlZxlGHgADMXtUCbARnh',
        'secret' => '6LcNPcYZAAAAADlvzKcu1uIRHw7HVprluNr1WxTf'
    ]
];