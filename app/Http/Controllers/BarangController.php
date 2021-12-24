<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $query = Barang::with(['sabar', 'kabar'])->latest()->paginate(5);
        return view('v_barang.index', compact('query'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
