<?php

namespace Plustelecom\Statsd;

use Domnikl\Statsd\Client;
use Domnikl\Statsd\Connection\UdpSocket;

class Statsd {

    private static $client;

    public static function init() {
        if (env('STATSD_TRACKING', false) === true) {
            $connection = new UdpSocket(env('STATSD_HOST', 'localhost'), env('STATSD_PORT', 8125));
            self::$client = new Client($connection, env('STATSD_NAMESPACE', ''));
        }
    }

    public static function client(){
        if (is_null(self::$client)) self::init();
        return self::$client;
    }
}
