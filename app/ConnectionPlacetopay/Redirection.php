<?php

namespace App\ConnectionPlacetopay;

use Dnetix\Redirection\PlacetoPay;

class Redirection
{
    private static $instance = null;
    private $conn;

    private $login = 'redirection_credentials.login';
    private $trankey = 'redirection_credentials.trankey';
    private $url = 'redirection_credentials.url';

    /**
     * Redirection constructor.
     */
    private function __construct()
    {
        $this->conn = new PlacetoPay([
            'login' =>config($this->login),
            'tranKey' => config($this->trankey),
            'url' => config($this->url),
        ]);
    }

    /**
     * @return null
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Redirection();
        }
        return self::$instance;
    }

    /**
     * @return PlacetoPay
     */
    public function getConn(): PlacetoPay
    {
        return $this->conn;
    }
}
