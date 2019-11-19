<?php

namespace App\Libraries;

class Client 
{
    private static $client;
    public function __construct($headers)
    {
        self::$client = new \GuzzleHttp\Client([
            "headers" => $headers,
        ]);
    }

    public static function get($url) {

        try {
            $response = self::$client->request("GET", $url);
            if ($response->getStatusCode() != 200) {
                throw new \Exception();
            }
        } catch(\Exception $e) {
            return $e->getMessage();
        }

        return $response->getBody();

    }
}