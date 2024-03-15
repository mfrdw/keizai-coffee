<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <img src="<?php echo base_url('assets/img/logo-ct.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Administrator</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <!-- Foto profil dengan lingkaran warna -->
                <div class="text-center mb-3">
                    <div class="rounded-circle bg-primary d-inline-block"
                        style="width: 60px; height: 60px; line-height: 60px;">
                        <span class="text-white"></span>
                    </div>
                    <div class="mt-2 text-white">Halo, Admin</div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $title == 'Beranda' ? "active bg-gradient-primary " : ""; ?>"
                    href="/">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" onclick="laporanKeuangan()">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i id="laporanIcon" class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Laporan</span>
                </a>
                <div id="laporanCollapse" style="display: none;" class="text-white">
                    <a class="nav-link text-white" href="/laporankeuangan" onclick="laporanKeuangan()">
                        <i class="material-icons opacity-10" style="font-size: 20px;">arrow_forward</i>
                        <span class="nav-link-text ms-1">Laporan Penjualan</span>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $title == 'List Produk' ? "active bg-gradient-primary " : ""; ?>"
                    onclick="toggleCollapse()">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i id="produkIcon" class="material-icons opacity-10">folder_open</i>
                    </div>
                    <span class="nav-link-text ms-1">Produk</span>
                </a>
                <div id="produkCollapse" style="display: none;" class="text-white">
                    <a class="nav-link text-white" href="/listproduct" onclick="toggleCollapse()">
                        <i class="material-icons opacity-10" style="font-size: 20px;">arrow_forward</i>
                        <span class="nav-link-text ms-1">Produk Detail</span>
                    </a>
                    <a class="nav-link text-white" href="/listkategori" onclick="toggleCollapse()">
                        <i class="material-icons opacity-10" style="font-size: 20px;">arrow_forward</i>
                        <span class="nav-link-text ms-1">Kategori</span>
                    </a>
                </div>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link text-white" href="../pages/billing.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Tambah Produk</span>
                </a>
            </li> -->
        </ul>
    </div>
    <script>
    function toggleCollapse() {
        var collapseDiv = document.getElementById("produkCollapse");
        var icon = document.getElementById("produkIcon");
        if (collapseDiv.style.display === "none") {
            collapseDiv.style.display = "block";
            icon.innerHTML = "folder";
        } else {
            collapseDiv.style.display = "none";
            icon.innerHTML = "folder_open";
        }
    }

    function laporanKeuangan() {
        var lapcollapseDiv = document.getElementById("laporanCollapse");
        var lapicon = document.getElementById("laporanIcon");
        if (lapcollapseDiv.style.display === "none") {
            lapcollapseDiv.style.display = "block";
            icon.innerHTML = "table";
        } else {
            lapcollapseDiv.style.display = "none";
            lapicon.innerHTML = "table_view";
        }
    }
    </script>
</aside>