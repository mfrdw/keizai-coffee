<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container col-md-10 py-4 offset-md-2">
    <dir class="row">
        <div class="d-flex w-100 justify-content-between">
            <div>
                <h4>PRODUK</h4>
                <h6>Produk</h6>
            </div>
            <div>
                <a class="btn btn-light" href="#">Import Produk</a>
                <a class="btn btn-dark" href="#">Tambah Produk</a>
            </div>
        </div>
        <div>
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="d-flex align-items-center gap-2">
                        <input type="text" placeholder="Cari data" class="form-control border border-secondary px-2">
                        <a href="" style="height:fit-content;">
                            <i class="material-icons opacity-10">search</i>
                        </a>
                    </div>
                    <div><button class="btn btn-light m-0"><i
                                class="material-icons opacity-10">filter</i>Filter</button>
                    </div>
                </div>
            </div>
            <div class="tabel">
                <div class="d-flex w-100 baris-tabel head">
                    <div style="flex:0.5;">
                        <p class="text-center m-0">GAMBAR</p>
                    </div>
                    <div style="flex:1;">
                        <p class="text-center m-0">PRODUK</p>
                    </div>
                    <div style="flex:1;">
                        <p class="text-center m-0">KATEGORI</p>
                    </div>
                    <div style="flex:1;">
                        <p class="text-center m-0">HARGA</p>
                    </div>
                    <div style="flex:1;">
                        <p class="text-center m-0">TERSEDIA</p>
                    </div>
                    <div style="flex:1;">
                        <p class="text-center m-0">ACTION</p>
                    </div>
                </div>

                <?php foreach ($produk as $p) { ?>
                <div class="d-flex baris-tabel">
                    <div style="flex:0.5;" class="d-flex justify-content-center">
                        <img src="/foto/<?= $p['foto_produk'];?>" width="60" height="60">
                    </div>
                    <div style="flex:1;" class="d-flex align-items-center justify-content-center">
                        <p class="text-center m-0"><?= $p['nama_produk'];?></p>
                    </div>
                    <div style="flex:1;" class="d-flex align-items-center justify-content-center">
                        <p class="text-center m-0"><?= $p['kategori_produk'];?></p>
                    </div>
                    <div style="flex:1;" class="d-flex align-items-center justify-content-center">
                        <p class="text-center m-0">Rp <?= number_format($p['harga_produk'], 0, ",", "."); ?></p>
                    </div>
                    <div style="flex:1;" class="d-flex align-items-center justify-content-center">
                        <p class="text-center m-0 <?= $p['stok_produk'] > 0? '':'merah';?>">
                            <?= $p['stok_produk'] > 0? 'Yes':'No';?></p>
                    </div>
                    <div style="flex:1;" class="dropdown d-flex justify-content-center align-items-center gap-3">
                        <button class="btn btn-dark btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" style="flex:1;"
                            class="d-flex justify-content-center align-items-center gap-3">
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Hapus</a></li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </dir>
</div>

<?= $this->endSection(); ?>