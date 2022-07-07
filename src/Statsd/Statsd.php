<?php

namespace Plustelecom\Statsd;

use Domnikl\Statsd\Client;
use Domnikl\Statsd\Connection\UdpSocket;

class Statsd {

    private static $client;
    private static $tracking = true;

    public static function init() {
        try {

            $connection = new UdpSocket(env('STATSD_HOST', 'localhost'), env('STATSD_PORT', 8125));
            self::$client = new Client($connection);
            self::$tracking = env('STATSD_TRACKING', false) === true;

        } catch (\Exception $e) {}
    }

    public static function client(){
        try {

            if (is_null(self::$client)) self::init();
            return self::$client;

        } catch (\Exception $e) {}

        return null;
    }

    public static function increment($key){
        try {

            self::client();
            if (self::$tracking) {
                self::client()->increment(self::addTags($key));
            }
        } catch (\Exception $e) {}
    }

    public static function count($key, $val = 1, float $sampleRate = 1.0){
        try {

            self::client();
            if (self::$tracking) {
                self::client()->count(self::addTags($key), $val, $sampleRate);
            }
        } catch (\Exception $e) {}
    }
    

    public static function gauge($key, $value){
        try {

            self::client();
            if (self::$tracking) {
                self::client()->gauge(self::addTags($key), $value);
            }
        } catch (\Exception $e) {}
    }

    public static function timing($key, $value){
        try {

            self::client();
            if (self::$tracking) {
                self::client()->timing(self::addTags($key), $value);
            }
        } catch (\Exception $e) {}
    }

    private static function addTags($key){
        try {
            //add service
            $key .= ",service=".env('STATSD_NAMESPACE');

            return $key;
        } catch (\Exception $e) {}

        return "";
    }
}
