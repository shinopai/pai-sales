<?php

namespace App\Lib;

use App\Models\Customer;
use Carbon\Carbon;

class Functions
{
    /**
     * 現在のページかどうかを判定
     */
    public static function isCurrentPage($url, $str)
    {
        return strpos($url, $str);
    }

    /**
     * 合計金額を算出(売上一覧)
     */
    public static function getTotalAmount($price, $quantity)
    {
        return number_format($price * $quantity);
    }

    /**
     * 顧客毎の最終購入日を取得
     */
    public static function getLastPurchaseDate($customer_id)
    {
        $customer = Customer::find($customer_id);
        $res = $customer->performances()->orderBy('sales_date', 'desc')->first();

        if (isset($res)) {
            $last_date = $res->sales_date;

            return Carbon::parse($last_date)->format('Y/m/d');
        }
    }

    /**
     * 顧客毎の購入合計金額を算出
     */
    public static function getTotalPurchasePrice($customer_id)
    {
        $res = Customer::find($customer_id);
        $total_price = 0;

        foreach ($res->performances()->get() as $performance) {
            $total_price += $performance->quantity * $performance->item->price;
        }

        return number_format($total_price);
    }
}
