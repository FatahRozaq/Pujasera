<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Requests\BarangRequest;

class BarangController extends Controller
{
    public function getData()
    {
        try
        {
            $barang = Barang::all();
            return view('Barang.index')->with('barangs', $barang);
        } catch (\Exception $e) {
            return view('error')->with('message', 'An error occurred');
        }
    }

    public function create()
    {
        return view('Barang.add');
    }

    public function store(BarangRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $barangs = new Barang([
                'NamaBarang' => $validatedData['NamaBarang'],
                'Satuan' => $validatedData['Satuan'],
                'HargaSatuan' => $validatedData['HargaSatuan'],
                'Stok' => $validatedData['Stok'],
            ]);

            $barangs->save();

            $barang = Barang::all(); // Assuming you want to display all data after saving
            return view('Barang.index')->with('barangs', $barang)->with('message', 'Data barang berhasil disimpan');
        } catch (\Exception $e) {
            return view('error')->with('message', 'An error occurred');
        }
    }

    public function edit($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            return view('Barang.edit')->with('barang', $barang);
        } catch (\Exception $e) {
            return view('error')->with('message', 'Data barang tidak ditemukan');
        }
    }

    public function update($id, BarangRequest $request)
    {
        try {
            $barang = Barang::findOrFail($id);

            $validatedData = $request->validated();

            $barang->update([
                'NamaBarang' => $validatedData['NamaBarang'],
                'Satuan' => $validatedData['Satuan'],
                'HargaSatuan' => $validatedData['HargaSatuan'],
                'Stok' => $validatedData['Stok'],
            ]);

            return view('Barang.index')->with('barangs', Barang::all())->with('message', 'Data barang berhasil diperbarui');
        } catch (\Exception $e) {
            return view('error')->with('message', 'An error occurred');
        }
    }

    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);

            $barang->delete();

            return view('Barang.index')->with('barangs', Barang::all())->with('message', 'Data barang berhasil dihapus');
        } catch (\Exception $e) {
            return view('error')->with('message', 'An error occurred');
        }
    }
}
