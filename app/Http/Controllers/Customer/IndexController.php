<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class IndexController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->paginate(10);

        return view('customers.index', compact('customers'));
    }

    public function search(Request $request)
    {
        $customers = Customer::where('name', 'LIKE', '%'.$request->input('name').'%')->paginate(10);

        return view('customers.search', compact('customers'));
    }
}
