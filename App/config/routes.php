<?php
return [
    
    'home' => [
        'controller' => 'HomeController',
        'method' => 'index'
    ],

    
    'register' => [
        'controller' => 'HomeController',
        'method' => 'register'
    ],

    
    'login' => [
        'controller' => 'HomeController',
        'method' => 'login'
    ],

    
    'dashboard' => [
        'controller' => 'HomeController',
        'method' => 'dashboard'
    ],

    
    'logout' => [
        'controller' => 'HomeController',
        'method' => 'logout'
    ],
'DashboardEnseignant' => [
    'controller' => 'HomeController', 
    'method' => 'dashboardEnseignant' 
],


    
    '404' => [
        'controller' => 'HomeController',
        'method' => 'notFound'
    ]
];
