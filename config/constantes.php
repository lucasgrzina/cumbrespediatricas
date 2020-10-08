<?php
return [
    'cookieRegistrado' => 'registrado_v4',
    'eventos' => [
        'cumbre' => [
            'nombre' => 'Abbott Cumbre pediatrica - 3/5',
            'prefix' => 'cumbrepediatrica',
            'controller' => 'HomeCumbrePediatricaController',
            'view' => 'cumbre',
            'cookie' => 'cumbre3',
            'activo' => false,
            'registroExterno' => true,
            'urlWebServiceRegistrado' => 'https://www.quimicavirtualevents.com/recorrido/app/webservice.php',
            'urlSitioPrincipal' => 'https://www.quimicavirtualevents.com/cumbrepediatrica',
            'urlCertificado' => 'https://www.quimicavirtualevents.com/recorrido/app/certificado.php?id=_ID_&token=_TOKEN_'
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
            'controller' => 'HomeDanonedayMamaController',
            'view' => 'danoneday',
            'cookie' => 'danoneday',
            'activo' => false,
            'evitarRoute' => true 
        ],
        'similacmamatest' => [
            'nombre' => 'Similac Mama (Test)',
            'prefix' => 'similacmamatest',
            'controller' => 'HomeSimilaCMamaController',
            'view' => 'similacmama',
            'cookie' => 'similacmamatest',
            'activo' => false
        ],  
        'similacmama169' => [
            'nombre' => 'Similac Mama - 16/9',
            'prefix' => 'similacmama',
            'controller' => 'HomeSimilaCMamaController',
            'view' => 'similacmama',
            'cookie' => 'similacmama_16_9',
            'activo' => false
        ],
        'similacmama179' => [
            'nombre' => 'Similac Mama - 17/9',
            'prefix' => 'similacmama',
            'controller' => 'HomeSimilaCMamaController',
            'view' => 'similacmama',
            'cookie' => 'similacmama_17_9',
            'activo' => false
        ],        
        'cumbretest' => [
            'nombre' => 'Abbott Cumbre pediatrica - 3/5 (Test)',
            'prefix' => 'cumbrepediatricatest',
            'controller' => 'HomeCumbrePediatricaController',
            'view' => 'cumbre',
            'cookie' => 'cumbre3test',
            'activo' => false,
            'registroExterno' => true,
            'urlWebServiceRegistrado' => 'https://www.quimicavirtualevents.com/recorrido/app/webservice.php',
            'urlSitioPrincipal' => 'https://www.quimicavirtualevents.com/cumbrepediatrica',
            'urlCertificado' => 'https://www.quimicavirtualevents.com/recorrido/app/certificado.php?id=_ID_&token=_TOKEN_'
        ],   
        'similacmama229' => [
            'nombre' => 'Similac Mama - 22/9',
            'prefix' => 'similacamama22',
            'controller' => 'HomeSimilaCMamaController',
            'view' => 'similacmama22',
            'cookie' => 'similacmama_22_9',
            'activo' => false
        ],  
        'danonedaytest' => [
            'nombre' => 'Danone Day (test)',
            'prefix' => 'danonedaytest',
            'controller' => 'HomeDanonedayMamaController',
            'view' => 'danoneday',
            'cookie' => 'danonedaytest',
            'activo' => false 
        ],             
        'forosas' => [
            'nombre' => 'Foro Sas',
            'prefix' => 'forosas',
            'controller' => 'HomeForoSasController',
            'view' => 'forosas',
            'cookie' => 'forosas',
            'activo' => true,
            'evitarRoute' => true 
        ],     
        'nasa' => [
            'nombre' => 'Abbott Cumbre Nasa',
            'prefix' => 'cumbrenasa',
            'controller' => 'HomeCumbreNasaController',
            'view' => 'nasa',
            'cookie' => 'cumbrenasa',
            'activo' => false,
            'registroExterno' => true,
            'urlWebServiceRegistrado' => 'https://quimicavirtualevents.com/cumbrenasa/app/webservice.php',
            'urlSitioPrincipal' => 'https://www.quimicavirtualevents.com/cumbrenasa',
            'urlCertificado' => 'https://quimicavirtualevents.com/cumbrenasa/app/certificado.php?id=_ID_&token=_TOKEN_'
        ],  
        'cumbre4' => [
            'nombre' => 'Abbott Cumbre pediatrica - 4/5',
            'prefix' => 'cumbrepediatrica',
            'controller' => 'HomeCumbrePediatricaController',
            'view' => 'cumbre',
            'cookie' => 'cumbre4',
            'activo' => true,
            'registroExterno' => true,
            'urlWebServiceRegistrado' => 'https://www.quimicavirtualevents.com/recorrido/app/webservice.php',
            'urlSitioPrincipal' => 'https://www.quimicavirtualevents.com/cumbrepediatrica',
            'urlCertificado' => 'https://www.quimicavirtualevents.com/recorrido/app/certificado.php?id=_ID_&token=_TOKEN_'
        ],                 
    ],
    'recaptcha' => [
        'key' => '6LcNPcYZAAAAAI5sgO4CAlZxlGHgADMXtUCbARnh',
        'secret' => '6LcNPcYZAAAAADlvzKcu1uIRHw7HVprluNr1WxTf'
    ]
];