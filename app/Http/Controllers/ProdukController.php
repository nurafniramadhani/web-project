<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\ProdukRequest;
use App\Services\ProdukService;

class ProdukController extends Controller
{
    protected $produkService;

    public function __construct(ProdukService $produkService)
    {
        $this->produkService = $produkService;
    }

    // Tampilkan data
    public function index()
    {
        return response()->json(Produk::all());
    }

    // Tambah data
    public function store(ProdukRequest $request)
    {
        try {

            $produk = $this->produkService->store(
                $request->validated()
            );

            return response()->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $produk
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Terjadi kesalahan',
                'error' => $e->getMessage()
            ], 500);

        }
    }

    // Update data
    public function update(ProdukRequest $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $produk->update($request->validated());

        return response()->json([
            'message' => 'Data berhasil diubah'
        ]);
    }

    // Hapus data
    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}