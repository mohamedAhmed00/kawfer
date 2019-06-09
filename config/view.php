<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        resource_path('views'),
        app_path('Modules/Credential/View'),
        app_path('Modules/Category/View'),
        app_path('Modules/Product/View'),
        app_path('Modules/User/View'),
        app_path('Modules/Worker/View'),
        app_path('Modules/Operation/View'),
        app_path('Modules/Setting/View'),
        app_path('Modules/Role/View'),
        app_path('Modules/Permission/View'),
        app_path('Generic/View'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
