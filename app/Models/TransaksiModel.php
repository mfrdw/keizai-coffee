<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields =
    [
        'tanggal',
        'id',
        'nama_pelanggan',
        'item_pesanan',
        'metode_pembayaran',
        'total_harga',
        'id_promo'
    ];

    public function getTransaksi($id = false)
    {
        if ($id == false) {
            return $this->orderBy('tanggal', 'desc')->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    
}