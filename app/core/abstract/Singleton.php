<?php
namespace App\Core;

abstract class Singleton {

    private static ?self $instance = null;

    private function __construct() {}

    public static function getInstance() 
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;

    }

}