<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $allowedFields = [
        'id',
        'nama_produk',
        'harga_produk',
        'harga_shopeefood',
        'harga-gofood',
        'harga_grabfood',
        'kategori_produk',
        'foto_produk',
        'stok_produk',
        'deskripsi_produk',
        'varian'
    ];

    public function getProduk($id = false)
    {
        if ($id == false) {
            return $this->orderBy('id', 'asc')->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    
}