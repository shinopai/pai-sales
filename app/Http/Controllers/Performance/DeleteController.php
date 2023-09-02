<?php

namespace App\Http\Controllers\Performance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Performance;

class DeleteController extends Controller
{
    public function confirm(Performance $performance)
    {
        return view('performances.delete.confirm', compact('performance'));
    }

    public function submit(Performance $performance)
    {
        $performance->delete();

        return redirect()->route('performances.delete.complete');
    }
}
