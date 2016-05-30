<?php

namespace Plustelecom\Statsd;

use Domnikl\Statsd\Client;
use Domnikl\Statsd\Connection\UdpSocket;

class Statsd {

    private static $client;
    private static $tracking = true;

    public static function init() {
        $connection = new UdpSocket(env('STATSD_HOST', 'localhost'), env('STATSD_PORT', 8125));
        self::$client = new Client($connection, env('STATSD_NAMESPACE', ''));
        self::$tracking = env('STATSD_TRACKING', false) === true;
    }

    public static function client(){
        if (is_null(self::$client)) self::init();
        return self::$client;
    }

    public static function increment($key){
        if (self::$tracking) {
            self::client()->increment($key);
        }
    }

    public static function gauge($key, $value){
        if (self::$tracking) {
            self::client()->gauge($key, $value);
        }
    }
}
