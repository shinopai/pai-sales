<?php

namespace App\Http\Controllers\Performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PerformanceRequest;
use App\Models\Performance;

class CreateController extends Controller
{
    public function index()
    {
        return view('performances.create.index');
    }

    public function submit(PerformanceRequest $request)
    {
        $performance = new Performance();

        $performance->fill([
            'sales_date' => $request->input('sales_date'),
            'quantity' => $request->input('quantity'),
            'customer_id' => $request->input('customer_id'),
            'store_id' => $request->input('store_id'),
            'item_id' => $request->input('item_id')
        ]);

        $performance->save();

        return redirect()->route('performances.index')->with('flash', '新規の売上データを登録しました');
    }
}
