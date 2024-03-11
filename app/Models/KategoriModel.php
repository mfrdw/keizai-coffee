<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $allowedFields = [
        'id',
        'nama_kategori',
        'group_kategori'
    ];

    public function getKategori($id = false)
    {
        if ($id == false) {
            return $this->orderBy('nama_kategori', 'asc')->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    
}