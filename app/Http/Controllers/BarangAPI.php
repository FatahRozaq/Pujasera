<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangAPI extends Controller
{
    public function getData(){

        try
        {
            $barang = Barang::all();
            // return response()->json($barang);
            return response()->json([
                'message' => 'Semua data barang',
                'barangs' => $barang,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
        
    }

    public function store(BarangRequest $request)
    {
        $validatedData = $request->validated();

        // $barangs = new Barang([
        //     'NamaBarang' => $request->input('NamaBarang'),
        //     'Satuan' => $request->input('Satuan'),
        //     'HargaSatuan' => $request->input('HargaSatuan'),
        //     'Stok' => $request->input('Stok'),
        // ]);
        $barangs = new Barang([
            'NamaBarang' => $validatedData['NamaBarang'],
            'Satuan' => $validatedData['Satuan'],
            'HargaSatuan' => $validatedData['HargaSatuan'],
            'Stok' => $validatedData['Stok'],
        ]);

        $barangs->save();

        return response()->json([
            'message' => 'Data barang berhasil disimpan',
            'barangs' => $barangs,
        ], 201);
    }

    public function update($id, BarangRequest $request){
        try {
            $barang = Barang::findorFail($id);

            if (!$barang) {
                return response()->json(['message' => 'Data barang tidak ditemukan'], 404);
            }

            $validatedData = $request->validated();

            // $barang->update([
            //     'NamaBarang' => $request->NamaBarang,
            //     'Satuan' => $request->Satuan,
            //     'HargaSatuan' => $request->HargaSatuan,
            //     'Stok' => $request->Stok,
            // ]);
            $barang->update([
                'NamaBarang' => $validatedData['NamaBarang'],
                'Satuan' => $validatedData['Satuan'],
                'HargaSatuan' => $validatedData['HargaSatuan'],
                'Stok' => $validatedData['Stok'],
            ]);

            return response()->json([
                'message' => 'Data barang berhasil diperbarui',
                'barangs' => $barang,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    public function destroy($id){
        try {
            $barang = Barang::find($id);

            if (!$barang) {
                return response()->json(['message' => 'Data barang tidak ditemukan'], 404);
            }

            $barang->delete();

            return response()->json(['message' => 'Data barang berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
}
