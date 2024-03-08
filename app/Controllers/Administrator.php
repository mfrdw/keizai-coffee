<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Administrator extends BaseController
{
    public function index(): string
    {
        // Mengambil isi dari header.php dan footer.php
        $header = view('layout/header');
        $sidebar = view('layout/sidebar');
        $footer = view('layout/footer');

        // Menggabungkan semua isi tampilan
        $output = $header;
        $output .= $sidebar;
        $output .= view('admin/dashboard');
        $output .= $footer;

        // Mengembalikan tampilan lengkap
        return $output;
    }
}
