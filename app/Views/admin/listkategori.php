<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container col-md-10 py-4 offset-md-2">
    <dir class="row">
        <div class="d-flex w-100 justify-content-between">
            <div>
                <h4>PRODUK</h4>
                <h6>Kategori</h6>
            </div>
            <div>
                <a class="btn btn-dark" href="/addkategori">Tambah Kategori</a>
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
                                class="material-icons opacity-10 m-2 ">filter_list</i>Filter</button>
                    </div>
                </div>
            </div>
            <div class="tabel">
                <div class="d-flex w-100 baris-tabel head">
                    <div style="flex:0.5;">
                        <p class="text-center m-0">KATEGORI</p>
                    </div>
                    <div style="flex:0.5;">
                        <p class="text-center m-0">GROUP</p>
                    </div>
                    <div style="flex:1;">
                        <p class="text-center m-0">AKSI</p>
                    </div>
                </div>

                <?php foreach ($kategori as $k) { ?>
                <div class="d-flex baris-tabel">
                    <div style="flex:0.5;" class="d-flex align-items-center justify-content-center">
                        <p class="text-center m-0"><?= $k['nama_kategori'];?></p>
                    </div>
                    <div style="flex:0.5;" class="d-flex align-items-center justify-content-center">
                        <p class="text-center m-0"><?= $k['group_kategori'];?></p>
                    </div>
                    <div style="flex:1;"
                        class="dropdown d-flex justify-content-center align-items-center gap-3 position-relative">
                        <button class="btn btn-dark btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" style="flex:1; position: absolute; top: 100%; left: 0;">
                            <li><a class="dropdown-item" href="/editkategori/<?= $k['id'];?>">Edit</a></li>
                            <li><a class="dropdown-item hapus-kategori" data-kategori-id="<?= $k['id'];?>">Hapus</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <?php } ?>
            </div>
        </div>
    </dir>
</div>



<script>
$(document).ready(function() {
    $('.hapus-kategori').click(function() {
        var kategoriId = $(this).data('kategori-id');
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus kategori ini?',
            text: "Anda tidak akan dapat mengembalikan data yang sudah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/delkategori/' + kategoriId;
            }
        });
    });
});
</script>

<?= $this->endSection(); ?>