<?php

namespace App\Http\Controllers;

use App\Models\Sabar;
use Illuminate\Http\Request;

class SabarController extends Controller
{
    public function index()
    {
        $query = Sabar::latest()->paginate(5);
        return view('v_sabar.index', compact('query'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
