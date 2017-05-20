<?php
/**
 * Created by PhpStorm.
 * User: laptop88
 * Date: 5/12/2017
 * Time: 6:38 AM
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Settings all for web application
    |--------------------------------------------------------------------------
    |
    */
    'app' => [
        'name' => 'Food & Drink',
        'default-slide-show' => 0,
    ],
    'food' => [
        'number_rating' => 5,
        'is_read' => 1,
        'limit' => 12,
        'favorite' => 1,
        'not-found' => 0,
    ],
    'user' => [
        'role' => [
            'admin' => 1,
            'member' => 0,
        ],
        'is_activated' => 1,
        'avatar_default' => 'notavailable.jpeg',
    ],
    'pagination' => [
        'limit' => 12,
    ],
];
