<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Supplier::latest()->paginate(5);
        return view('supplier.show', compact('query'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
                'nm_supplier' => 'required|string|max:200|unique:suppliers',
                'alamat' => 'required',
                'telp' => 'required'
            ],
            [
                'nm_supplier.required' => 'Nama Supplier Wajib diisi!',
                'nm_supplier.string' => 'Nama Supplier Harus Huruf!',
                'nm_supplier.max' => 'Nama Supplier max 200!',
                'nm_supplier.unique' => 'Nama Supplier Sudah ada di database!',
                'alamat.required' => 'Alamat Wajib diisi!'
            ]
        );
        $suppl = Supplier::create([
            'nm_supplier' => $request->nm_supplier,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'fax_supplier' => $request->fax_supplier,
            'note' => $request->note
        ]);

        if ($suppl) {
            return redirect()
                ->route('supplier.index')
                ->with([
                    'success' => 'New Supplier has been created successfully'
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
        $query = Supplier::findOrFail($id);
        return view('supplier.edit', compact('query'));
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
                'nm_supplier' => 'required|string|max:200',
                'alamat' => 'required',
                'telp' => 'required'
            ],
            [
                'nm_supplier.required' => 'Nama Supplier Wajib diisi!',
                'nm_supplier.string' => 'Nama Supplier Harus Huruf!',
                'nm_supplier.max' => 'Nama Supplier max 200!',
                'alamat.required' => 'Alamat Wajib diisi!'
            ]
        );
        $suppl = Supplier::findOrFail($id);
        $suppl->update([
            'nm_supplier' => $request->nm_supplier,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'fax_supplier' => $request->fax_supplier,
            'note' => $request->note
        ]);

        if ($suppl) {
            return redirect()
                ->route('supplier.index')
                ->with([
                    'success' => 'New Supplier has been updated successfully'
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
        $query = Supplier::findOrFail($id);
        $query->delete();

        if ($query) {
            return redirect()
                ->route('supplier.index')
                ->with([
                    'success' => 'Data Supplier has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('supplier.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
