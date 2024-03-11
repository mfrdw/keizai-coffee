<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container col-md-10 py-4 offset-md-2">
    <dir class="row">
        <div class="d-flex w-100 justify-content-between">
            <div>
                <h4>PRODUK</h4>
                <h6>Tambah Produk</h6>
            </div>
            <div>
                <a class="btn btn-dark" data-toggle="modal" data-target="#konfirmasiModal"><i
                        class="material-icons opacity-10">arrow_back</i> Kembali</a>
            </div>
        </div>
    </dir>
</div>

<div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Pembatalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin untuk membatalkan tindakan ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
                <a href="/listproduct" class="btn btn-primary">Iya</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>