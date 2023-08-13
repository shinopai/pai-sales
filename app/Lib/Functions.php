<?php

namespace App\Lib;

class Functions
{
    public static function isCurrentPage($url, $str)
    {
        return strpos($url, $str);
    }
}
