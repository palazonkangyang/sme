<?php

/*
 * This file is part of Laravel Instagram.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Instagram Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */


    'connections' => [

        'main' => [
            'id' => 'c9c4ecf1751945a8b1a36f7337308b1f',
            'secret' => '4a09688a05d145b39ca39006b72e5655',
            'access_token' => '{"access_token": "3290424021.2b1974f.042c428ffade4791a7fafa6be9948bb6"}',
        ],

        'alternative' => [
            'id' => 'c9c4ecf1751945a8b1a36f7337308b1f',
            'secret' => '4a09688a05d145b39ca39006b72e5655',
            'access_token' => '{"access_token": "3290424021.2b1974f.042c428ffade4791a7fafa6be9948bb6"}',
        ],
    ],
];
