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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v_sabar.create');
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
                'nama_satuan' => 'required|string|max:10|unique:sabars'
            ],
            [
                'nama_satuan.required' => 'Nama Satuan Wajib diisi!',
                'nama_satuan.string' => 'Nama Satuan Harus Huruf!',
                'nama_satuan.max' => 'Nama Satuan max 10!',
                'nama_satuan.unique' => 'Nama Satuan Sudah ada di database!'
            ]
        );
        $sab = Sabar::create([
            'nama_satuan' => $request->nama_satuan
        ]);

        if ($sab) {
            return redirect()
                ->route('nama_satuan.index')
                ->with([
                    'success' => 'Data Satuan Baru has been created successfully'
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
        $query = Sabar::findOrFail($id);
        return view('v_sabar.edit', compact('query'));
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
                'nama_satuan' => 'required|string|max:10'
            ],
            [
                'nama_satuan.required' => 'Nama Satuan Wajib diisi!',
                'nama_satuan.string' => 'Nama Satuan Harus Huruf!',
                'nama_satuan.max' => 'Nama Satuan max 10!'
            ]
        );
        $sab = Sabar::findOrFail($id);
        $sab->update([
            'nama_satuan' => $request->nama_satuan
        ]);

        if ($sab) {
            return redirect()
                ->route('sabar.index')
                ->with([
                    'success' => 'Data Satuan Baru has been updated successfully'
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
        $query = Sabar::findOrFail($id);
        $query->delete();

        if ($query) {
            return redirect()
                ->route('sabar.index')
                ->with([
                    'success' => 'Data Satuan Baru has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('sabar.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
