<?php

namespace App\Services;

use App\Models\Produk;

class ProdukService
{
    public function store(array $data)
    {
        return Produk::create($data);
    }
}