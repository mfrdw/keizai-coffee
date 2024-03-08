<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container col-md-10 py-4 offset-md-2">
    <dir class="row">
        <div class="d-flex w-100 justify-content-between">
            <div>
                <h6>PRODUK</h6>
                <h2>Produk</h2>
            </div>
            <div>
                <a class="btn btn-light" href="#">Import Produk</a>
                <a class="btn btn-dark" href="#">Tambah Produk</a>
            </div>
        </div>
        <div>
            <div>
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="material-icons opacity-10">search</i>
                        <input type="text" placeholder="Cari data" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </dir>
</div>

<?= $this->endSection(); ?>