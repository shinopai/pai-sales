<?php

namespace App\Lib;

class Functions
{
    public static function isCurrentPage($url, $str)
    {
        return strpos($url, $str);
    }

    public static function getTotalAmount($price, $quantity)
    {
        return number_format($price * $quantity);
    }
}
