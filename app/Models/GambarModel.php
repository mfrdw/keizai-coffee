<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarModel extends Model
{
    protected $table = 'gambar';
    protected $allowedFields = [
        'id',
        'gambar_produk'
    ];

    public function getGambar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    
}