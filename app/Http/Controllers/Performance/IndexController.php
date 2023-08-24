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
}
