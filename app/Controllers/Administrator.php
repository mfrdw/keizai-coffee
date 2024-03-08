<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Administrator extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];
        return view('admin/dashboard', $data);
        
    }

    public function listproduct()
    {
        $data = [
            'title' => 'List Produk'
        ];
        return view('admin/listproduct', $data);
    }
}