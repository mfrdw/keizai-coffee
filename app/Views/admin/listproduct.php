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
                <a class="btn btn-dark" href="/addproduct">Tambah Produk</a>
            </div>
        </div>
        <div>
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="d-flex align-items-center gap-2">
                        <form class="d-flex flex-grow-1 search-box" role="search" id="form-cari">
                            <div class="input-group">
                                <input required type="text" class="form-control search-input" placeholder="Search"
                                    aria-label="Search" aria-describedby="button-addon2">
                                <button class="btn btn-dark" type="submit"><i class="material-icons">search</i></button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <!-- <button class="btn btn-light m-0"><i
                                class="material-icons opacity-10 m-2">filter_list</i>Filter</button> -->
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                                class="material-icons opacity-10 m-2">filter_list</i>Filter</button>
                        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                            tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Filter
                                </h5>
                                <button type="button" class="btn btn-dark" data-bs-dismiss="offcanvas"
                                    aria-label="Close"><i class="material-icons opacity-10">close</i></button>
                            </div>
                            <div class="offcanvas-body">
                                <div class=" form-group w-100">
                                    <label for="kategori_produk">Kategori Produk</label>
                                    <select class="form-select border" name="kategori_produk"
                                        aria-label="Default select example" style="padding: 0.5rem;">
                                        <option selected>Pilih Kategori</option>
                                        <?php foreach ($kategori as $k) { ?>
                                        <option value="<?= $k['nama_kategori'] ?>">
                                            <?= $k['nama_kategori'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabel" id="tabel-produk">
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
                        <img src="<?= $p['foto_produk'] != '' ? '/foto/'.$p['foto_produk']:"/assets/img/prev.png";?>"
                            width="60" height="60">
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
                            <li><a class="dropdown-item" href="/editproduct/<?= $p['id'];?>">Edit</a></li>
                            <li><a class="dropdown-item hapus-produk" data-produk-id="<?= $p['id'];?>">Hapus</a>
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
    $('.hapus-produk').click(function() {
        var kategoriId = $(this).data('produk-id');
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus produk ini?',
            text: "Anda tidak akan dapat mengembalikan data yang sudah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/delproduk/' + kategoriId;
            }
        });
    });
});

const formCariElm = document.getElementById("form-cari");
const semuaProduk = JSON.parse('<?= $produkJson ?>');
const tabelProdukElm = document.getElementById("tabel-produk");
console.log(semuaProduk)

formCariElm.addEventListener('submit', (e) => {
    e.preventDefault();
    const hasilPencarian = e.target.children[0].children[0].value;
    const hasilFilter = semuaProduk
        .filter((produk) => {
            if (
                produk.nama_produk
                .toLowerCase()
                .match(eval("/" + hasilPencarian.toLowerCase() + ".*/"))
            )
                return true;
            else return false;
        })
        .map((produk) => {
            return produk;
        });

    tabelProdukElm.innerHTML =
        '<div class="d-flex w-100 baris-tabel head"><div style="flex:0.5;"><p class="text-center m-0">GAMBAR</p></div><div style="flex:1;"><p class="text-center m-0">PRODUK</p></div><div style="flex:1;"><p class="text-center m-0">KATEGORI</p></div><div style="flex:1;"><p class="text-center m-0">HARGA</p></div><div style="flex:1;"><p class="text-center m-0">TERSEDIA</p></div><div style="flex:1;"><p class="text-center m-0">ACTION</p></div></div>'

    if (hasilFilter.length > 0) {
        hasilFilter.forEach(produk => {
            let srcImg = '/foto/' + produk.foto_produk;
            if (produk.foto_produk == '') srcImg = "/assets/img/prev.png"

            let warnaTersedia = '';
            if (produk.stok_produk <= 0) warnaTersedia = 'merah'

            let kataTersedia = 'Yes';
            if (produk.stok_produk <= 0) kataTersedia = 'No'

            tabelProdukElm.innerHTML +=
                '<div class="d-flex baris-tabel"><div style="flex:0.5;" class="d-flex justify-content-center"><img src="' +
                srcImg +
                '" width="60" height="60"></div><div style="flex:1;" class="d-flex align-items-center justify-content-center"><p class="text-center m-0">' +
                produk.nama_produk +
                '</p></div><div style="flex:1;" class="d-flex align-items-center justify-content-center"><p class="text-center m-0">' +
                produk.kategori_produk +
                '</p></div><div style="flex:1;" class="d-flex align-items-center justify-content-center"><p class="text-center m-0">Rp ' +
                produk.harga_produk.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
                '</p></div><div style="flex:1;" class="d-flex align-items-center justify-content-center"><p class="text-center m-0 ' +
                warnaTersedia +
                '">' + kataTersedia +
                '</p></div><div style="flex:1;" class="dropdown d-flex justify-content-center align-items-center gap-3"><button class="btn btn-dark btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button><ul class="dropdown-menu" style="flex:1;" class="d-flex justify-content-center align-items-center gap-3"><li><a class="dropdown-item" href="/editproduct/' +
                produk.id +
                '">Edit</a></li><li><a class="dropdown-item hapus-produk" data-produk-id="' +
                produk.id + '">Hapus</a></li></ul></div></div>'
        });
    } else {
        tabelProdukElm.innerHTML +=
            '<div class="baris-tabel py-2"><p class="m-0 text-center">Tidak ada produk</p></div>'
    }

})
</script>

<?= $this->endSection(); ?>