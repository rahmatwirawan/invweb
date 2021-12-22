<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabar;

class KabarController extends Controller
{
    public function index()
    {
        $query = Kabar::latest()->paginate(5);
        return view('v_kabar.index', compact('query'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v_kabar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'kategori_barang' => 'required|string|max:100|unique:kabars'
            ],
            [
                'kategori_barang.required' => 'Nama Kategori Wajib diisi!',
                'kategori_barang.string' => 'Nama Kategori Harus Huruf!',
                'kategori_barang.max' => 'Nama Kategori max 100!',
                'kategori_barang.unique' => 'Nama Kategori Sudah ada di database!'
            ]
        );
        $sab = Kabar::create([
            'kategori_barang' => $request->kategori_barang
        ]);

        if ($sab) {
            return redirect()
                ->route('kabar.index')
                ->with([
                    'success' => 'Data Kategori Baru has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = Kabar::findOrFail($id);
        return view('v_kabar.edit', compact('query'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'kategori_barang' => 'required|string|max:10'
            ],
            [
                'kategori_barang.required' => 'Nama Kategori Wajib diisi!',
                'kategori_barang.string' => 'Nama Kategori Harus Huruf!',
                'kategori_barang.max' => 'Nama Kategori max 10!'
            ]
        );
        $sab = Kabar::findOrFail($id);
        $sab->update([
            'kategori_barang' => $request->kategori_barang
        ]);

        if ($sab) {
            return redirect()
                ->route('kabar.index')
                ->with([
                    'success' => 'Data Kategori Baru has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Kabar::findOrFail($id);
        $query->delete();

        if ($query) {
            return redirect()
                ->route('kabar.index')
                ->with([
                    'success' => 'Data Kategori has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('kabar.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
