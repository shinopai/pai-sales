<?php

namespace App\Http\Controllers\Performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PerformanceRequest;
use App\Models\Performance;

class EditController extends Controller
{
    public function index(Performance $performance)
    {
        return view('performances.edit.index', compact('performance'));
    }

    public function submit(PerformanceRequest $request, Performance $performance)
    {
        $performance->update([
            'sales_date' => $request->input('sales_date'),
            'quantity' => $request->input('quantity'),
            'customer_id' => $request->input('customer_id'),
            'store_id' => $request->input('store_id'),
            'item_id' => $request->input('item_id')
        ]);

        return redirect()->route('performances.index')->with('flash', '売上データを更新しました');
    }
}
