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
            'cookie' => 'similacmama',
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
        'similacmama2' => [
            'nombre' => 'Similac Mama Dia 2',
            'prefix' => 'similacmama',
            'controller' => 'HomeSimilaCMamaController',
            'view' => 'similacmama',
            'cookie' => 'similacmama2',
            'activo' => true
        ],              
    ]
];