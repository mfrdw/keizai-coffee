<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container col-md-10 py-4 offset-md-2">
    <dir class="row">
        <div class="d-flex w-100 justify-content-between">
            <div>
                <h4>KATEGORI</h4>
                <h6>Edit Kategori</h6>
            </div>
            <div>
                <a class="btn btn-dark btn-sm" data-toggle="modal" data-target="#konfirmasiModal"><i
                        class="material-icons opacity-10">arrow_back</i> Kembali</a>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form id="editForm" action="/actioneditkategori/<?= $kategori['id']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id" value="<?= $kategori['id']; ?>">
                                <div class="mb-3">
                                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                        placeholder="Masukkan nama kategori" value="<?= $kategori['nama_kategori']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="group_kategori" class="form-label">Group Kategori</label>
                                    <input type="text" class="form-control" id="group_kategori" name="group_kategori"
                                        placeholder="Masukkan group kategori"
                                        value="<?= $kategori['group_kategori']; ?>">
                                </div>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#konfirmasiSimpanModal">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
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
                <button type="button" class="btn btn-dark btn-sm close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin untuk membatalkan tindakan ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
                <a href="/listkategori" class="btn btn-primary">Iya</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="konfirmasiSimpanModal" tabindex="-1" role="dialog"
    aria-labelledby="konfirmasiSimpanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasiSimpanModalLabel">Konfirmasi Simpan Perubahan</h5>
                <button type="button" class="btn-close" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menyimpan perubahan ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
                <button type="submit" form="editForm" class="btn btn-primary">Ya</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>