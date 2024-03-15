<?php

namespace App\Controllers;

use App\Models\GambarModel;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use CodeIgniter\Controller;

class Administrator extends BaseController
{

    protected $produkModel;
    protected $kategoriModel;
    protected $gambarModel;
    protected $transaksiModel;
    public function __construct()
    {
        $this->produkModel      = new ProdukModel();
        $this->kategoriModel    = new KategoriModel();
        $this->gambarModel      = new GambarModel();
        $this->transaksiModel   = new TransaksiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];
        return view('admin/dashboard', $data);
        
    }

    public function laporanKeuangan()
    {
        $transaksi = $this->transaksiModel->getTransaksi();
        $transaksiterbaru = $this->transaksiModel->orderBy('tanggal', 'desc')->first();
        $transaksiJson = [];
        foreach ($transaksi as $t) {
            $t['item_pesanan'] = json_decode($t['item_pesanan'], true);
            array_push($transaksiJson, $t);
        }
        $data = [
            'title' => 'Laporan Keuangan',
            'transaksi' => $transaksi,
            'transaksiterbaru' => $transaksiterbaru,
            'transaksiJson' => json_encode($transaksiJson)
        ];
        return view('admin/laporankeuangan', $data);

    }

    public function listproduct()
    {
        $kategori = $this->kategoriModel->getKategori(); 
        $produkAll = $this->produkModel->getProduk();
        $produkAllJson = [];
        foreach ($produkAll as $p) {
            $p['varian'] = json_decode($p['varian'], true);
            array_push($produkAllJson, $p);
        }
        $data = [
            'title' => 'List Produk',
            'kategori' => $kategori,
            'produk' => $produkAll,
            'produkJson' => json_encode($produkAllJson)
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
        
        $kategori = $this->kategoriModel->getKategori();   
        $data = [
            'title' => 'Tambah Produk',
            'kategori' => $kategori
        ];
        return view('admin/addproduct', $data);
    }

    public function actionaddproduct()
    {
        $nama = $this->request->getVar('nama_produk');
        $harga = $this->request->getVar('harga_produk');
        $kategori = $this->request->getVar('kategori_produk');
        $stok = $this->request->getVar('stok_produk');
        $deskripsi = $this->request->getVar('deskripsi_produk');
        $harga_shopee = $this->request->getVar('harga_ShopeeFood');
        $harga_gofood = $this->request->getVar('harga_GoFood');
        $harga_grabfood = $this->request->getVar('harga_GrabFood');
        $jmlVarian = $this->request->getVar('rahasia_varian');
        $varian = [];
        if(!empty($_FILES["foto_produk_fix"]['tmp_name']))
            $foto = file_get_contents($this->request->getFile("foto_produk_fix"));
        else
            $foto = '';

        for ($i=1; $i <= $jmlVarian; $i++) { 
            $itemVarian = [
                'nama' => $this->request->getVar('namavarian'.$i),
                'harga' => $this->request->getVar('hargavarian'.$i)
            ];
            array_push($varian, $itemVarian);
        }

        $id = time();
        $this->produkModel->insert([
            'nama_produk' => $nama,
            'harga_produk' => $harga,
            'kategori_produk' => $kategori,
            'stok_produk' => $stok,
            'deskripsi_produk' => $deskripsi,
            'varian_produk' => $nama,
            'harga_shopeefood' => $harga_shopee,
            'harga_gofood' => $harga_gofood,
            'harga_grabfood' => $harga_grabfood,
            'foto_produk' => $foto != '' ? $id:'',
            'varian'=> json_encode($varian)
        ]);

        if($foto != ''){
            $this->gambarModel->insert([
                'id' => $id,
                'gambar_produk'=> $foto
            ]);
        }    
        return redirect()->to('/listproduct');
    }
    

    public function editProduct($id)
    {
        $produk = $this->produkModel->getProduk($id);
        $kategori = $this->kategoriModel->getKategori();
        $gambar = $this->gambarModel->getGambar($produk['foto_produk']);
        $data = [
            'title' => 'Edit Produk',
            'produk' => $produk,
            'kategori' => $kategori,
            'gambar' => $gambar,
            'varian' => json_decode($produk['varian'],true)
        ];
        return view('admin/editproduct', $data);
    }

    public function actionEditProduk($id)
    {
        $nama = $this->request->getVar('nama_produk');
        $harga = $this->request->getVar('harga_produk');
        $kategori = $this->request->getVar('kategori_produk');
        $stok = $this->request->getVar('stok_produk');
        $deskripsi = $this->request->getVar('deskripsi_produk');
        $harga_shopee = $this->request->getVar('harga_ShopeeFood');
        $harga_gofood = $this->request->getVar('harga_GoFood');
        $harga_grabfood = $this->request->getVar('harga_GrabFood');
        $jmlVarian = $this->request->getVar('rahasia_varian');
        $varian = [];
        if(!empty($_FILES["foto_produk_fix"]['tmp_name']))
            $foto = file_get_contents($this->request->getFile("foto_produk_fix"));
        else
            $foto = '';

        for ($i=1; $i <= $jmlVarian; $i++) { 
            $itemVarian = [
                'nama' => $this->request->getVar('namavarian'.$i),
                'harga' => $this->request->getVar('hargavarian'.$i)
            ];
            array_push($varian, $itemVarian);
        }

        $produkSekarang = $this->produkModel->getProduk($id);
        $idbaru = time();
        $this->produkModel->where('id', $id)->set([
            'nama_produk' => $nama,
            'harga_produk' => $harga,
            'kategori_produk' => $kategori,
            'stok_produk' => $stok,
            'deskripsi_produk' => $deskripsi,
            'varian_produk' => $nama,
            'harga_shopeefood' => $harga_shopee,
            'harga_gofood' => $harga_gofood,
            'harga_grabfood' => $harga_grabfood,
            'foto_produk' => $foto != '' ? ($produkSekarang['foto_produk'] ? $produkSekarang['foto_produk']:$idbaru) : $produkSekarang['foto_produk'],
            'varian'=> json_encode($varian)
        ])->update();

        if($foto != ''){
            if($produkSekarang['foto_produk']){
                $this->gambarModel->where('id',$produkSekarang['foto_produk'])->set([
                    'gambar_produk'=> $foto
                ])->update();
            } else {
                $this->gambarModel->insert([
                    'id' => $idbaru,
                    'gambar_produk'=> $foto
                ]);
            }
        }    
        return redirect()->to('/listproduct');

    }

    public function delProduct($id)
    {
        $produk_selected = $this->produkModel->getProduk($id);
        $produk = $this->produkModel->where('id', $id)->delete();
        if ($produk_selected['foto_produk']) {
            $this->gambarModel->where('id', $produk_selected['foto_produk'])->delete();
        }

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
    public function addkategori()
    {
        $data = [
            'title' => 'Tambah Kategori'
        ];
        return view('admin/addkategori', $data);
    }

    public function actionaddkategori()
    {
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nama_kategori' => 'required',
                'group_kategori' => 'required'
            ]);
            if ($validation->withRequest($this->request)->run() == false) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            } else {
                $kategoriData = [
                    'nama_kategori' => $this->request->getVar('nama_kategori'),
                    'group_kategori' => $this->request->getVar('group_kategori')
                ];
                $this->kategoriModel->insert($kategoriData);
                return redirect()->to('/listkategori')->with('success', 'Kategori berhasil ditambahkan.');
            }
        } else {
            $data = [
                'title' => 'Tambah Kategori'
            ];
            return view('admin/addkategori', $data);
        }
    }
    
    public function editkategori($id)
    {
        $kategori = $this->kategoriModel->find($id);
        if (!$kategori) {
            session()->setFlashdata('error', 'Kategori tidak ditemukan.');
            return redirect()->to('/listkategori');
        }
        $data = [
            'title' => 'Edit Kategori',
            'kategori' => $kategori
        ];
        return view('admin/editkategori', $data);
    }

    public function actioneditkategori($id)
    {
        $kategori = $this->kategoriModel->find($id);
        if (!$kategori) {
            session()->setFlashdata('error', 'Kategori tidak ditemukan.');
            return redirect()->to('/listkategori');
        }
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nama_kategori' => 'required',
                'group_kategori' => 'required'
            ]);
            if ($validation->withRequest($this->request)->run() == false) {
                session()->setFlashdata('error', $validation->getErrors());
                return redirect()->to("/editkategori/$id");
            } else {
                $kategoriData = [
                    'nama_kategori' => $this->request->getVar('nama_kategori'),
                    'group_kategori' => $this->request->getVar('group_kategori')
                ];
                $this->kategoriModel->update($id, $kategoriData);
                session()->setFlashdata('success', 'Kategori berhasil diperbarui.');
                return redirect()->to('/listkategori');
            }
        }
        return redirect()->to("/editkategori/$id");
    }


    public function delKategori($id)
    {
        $produk = $this->kategoriModel->where('id', $id)->delete();
        return redirect()->to('/listkategori');
    }


    //Laporan
    
    
}