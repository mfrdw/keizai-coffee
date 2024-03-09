<?php

namespace App\Controllers;

use App\Models\GambarModel;
use App\Models\ProdukModel;
use CodeIgniter\Controller;

class Administrator extends BaseController
{

    protected $produkModel;
    protected $gambarModel;
    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->gambarModel = new GambarModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];
        return view('admin/dashboard', $data);
        
    }

    public function listproduct()
    {
        $produkAll = $this->produkModel->getProduk();
        $data = [
            'title' => 'List Produk',
            'produk' => $produkAll,
        ];
        return view('admin/listproduct', $data);
    }

    public function foto($id)
    {
        $gambar = $this->gambarModel->getGambar($id)['gambar_produk'];
        $this->response->setHeader("Content-Type", "image/webp");
        echo $gambar;
    }
}