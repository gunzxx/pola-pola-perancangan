<?php

class Mobil
{
    private static $instance = null;

    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new Mobil();
        }
        return self::$instance;
    }
}

$mobil1 = Mobil::getInstance();
$mobil2 = Mobil::getInstance();

echo ($mobil1 === $mobil2); // True