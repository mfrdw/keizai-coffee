<?php

namespace App\Controllers;

use App\Models\GambarModel;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use CodeIgniter\Controller;

class Administrator extends BaseController
{

    protected $produkModel;
    protected $kategoriModel;
    protected $gambarModel;
    public function __construct()
    {
        $this->produkModel      = new ProdukModel();
        $this->kategoriModel    = new KategoriModel();
        $this->gambarModel      = new GambarModel();
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
    public function addProduct()
    {
        $data = [
            'title' => 'Tambah Produk'
        ];
        return view('admin/addproduct', $data);
    }
    public function editProduct()
    {
        $data = [
            'title' => 'Edit Produk'
        ];
        return view('admin/editProduct', $data);
    }
    public function delProduct($id)
    {
        $produk = $this->produkModel->where('id', $id)->delete();
        $gambar = $this->gambarModel->where('id', $id)->delete();
        return redirect()->to('/listproduct');
    }





    public function listkategori()
    {
        $kategoriAll = $this->kategoriModel->getKategori();
        $data = [
            'title' => 'List Kategori',
            'kategori' => $kategoriAll,
        ];
        return view('admin/listkategori', $data);
    }
    
}