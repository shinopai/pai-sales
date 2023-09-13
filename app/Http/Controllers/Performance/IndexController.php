<?php

namespace App\Http\Controllers\Performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Performance;

class IndexController extends Controller
{
    public function index()
    {
        $performances = Performance::orderBy('id', 'desc')->paginate(10);

        return view('performances.index', compact('performances'));
    }

    public function search(Request $request)
    {
        $q = Performance::query();

        // パラメータを変数に代入
        $from = $request->input('sales_date_from');
        $to = $request->input('sales_date_to');
        $store_id = $request->input('store_id');
        $item_id = $request->input('item_id');

        // 売上日で検索
        // 売上日(から)のみ存在
        if(isset($from) && !isset($to)) {
            $q->whereDate('sales_date', '>=', $from);
        }

        // 売上日(まで)のみ存在
        if(!isset($from) && isset($to)) {
            $q->whereDate('sales_date', '<=', $to);
        }

        // どちらも存在
        if(isset($from) && isset($to)) {
            $q->whereBetween('sales_date', [$from, $to]);
        }

        // 店舗で検索
        if(isset($store_id)) {
            $q->where('store_id', $store_id);
        }

        // 商品で検索
        if(isset($item_id)) {
            $q->where('item_id', $item_id);
        }

        $performances = $q->paginate(10);

        return view('performances.search', compact('performances'));
    }
}
