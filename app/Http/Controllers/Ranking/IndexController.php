<?php

namespace App\Http\Controllers\Ranking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Performance;
use App\Models\Item;

class IndexController extends Controller
{
    public function index()
    {
        // 商品毎の売上数合計を取得
        $res = Performance::select('item_id')->selectRaw('SUM(quantity) as sum_quantity')->groupBy('item_id')->get();

        // 売上数合計が多い商品トップ5を取得
        $items = $res->sortByDesc('sum_quantity')->take(5);

        // トップ5の商品名と売上数を配列で取得
        $names = [];
        $quantities = [];

        foreach ($items as $item) {
            array_push($names, Item::find($item->item_id)->name);
            array_push($quantities, $item->sum_quantity);
        }

        return view('ranking.index', compact('names', 'quantities'));
    }
}
