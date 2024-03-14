<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container col-md-10 py-4 offset-md-2">
    <dir class="row">
        <div class="d-flex w-100 justify-content-between">
            <div>
                <h4>PRODUK</h4>
                <h6>Edit Produk</h6>
            </div>
            <div>
                <a class="btn btn-dark" data-toggle="modal" data-target="#konfirmasiModal"><i
                        class="material-icons opacity-10">arrow_back</i> Kembali</a>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/actioneditproduct/<?= $produk['id'] ?>" method="post"
                                enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="d-flex gap-4">
                                    <div style="flex:1;">
                                        <label for="nama_produk">Foto Produk</label>
                                        <img src="<?= $produk['foto_produk'] != '' ? '/foto/'.$produk['foto_produk']:"/assets/img/prev.png";?>"
                                            alt="prev" class="w-100 mb-2" style="max-width: 300px;" id="fotoprev">
                                        <div>
                                            <label class="btn btn-dark" for="inputGroupFile01">Upload</label>
                                            <input type="file" class="form-control" name="foto_produk"
                                                style="display:none;" id="inputGroupFile01">
                                            <input type="file" class="form-control" name="foto_produk_fix"
                                                style="display:none;" id="inputGroupFileFix" disabled>

                                            <button class="btn btn-primary" type="button"
                                                onclick="hapusGambar()">Hapus</button>
                                        </div>
                                    </div>
                                    <div style="flex:2;">
                                        <div class="form-group mb-2">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" class="form-control border" name="nama_produk"
                                                placeholder="Masukkan nama produk" style="padding: 0.5rem;"
                                                value="<?= $produk['nama_produk']; ?>" required>
                                        </div>
                                        <div class=" form-group mb-2">
                                            <label for="harga_produk">Harga Produk</label>
                                            <input type="number" class="form-control border" name="harga_produk"
                                                placeholder="Masukkan harga produk" style="padding: 0.5rem;"
                                                value="<?= $produk['harga_produk']; ?>" required>
                                        </div>
                                        <div class="d-flex gap-2 mb-2">
                                            <div class=" form-group w-100">
                                                <label for="kategori_produk">Kategori Produk</label>
                                                <select class="form-select border" name="kategori_produk"
                                                    aria-label="Default select example" style="padding: 0.5rem;">
                                                    <?php foreach ($kategori as $k) { ?>
                                                    <option value="<?= $k['nama_kategori'] ?>"
                                                        <?= ($k['nama_kategori'] == $produk['kategori_produk']) ? 'selected' : ''; ?>>
                                                        <?= $k['nama_kategori'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class=" form-group w-100">
                                                <label for="stok_produk">Stok Produk</label>
                                                <input type="number" class="form-control border" name="stok_produk"
                                                    placeholder="Masukkan stok produk" style="padding: 0.5rem;"
                                                    value="<?= $produk['stok_produk']; ?>">
                                            </div>
                                        </div>
                                        <div class=" form-group w-100 mb-2">
                                            <label for="deskripsi_produk">Deskripsi Produk</label>
                                            <input type="text" class="form-control border" name="deskripsi_produk"
                                                placeholder="Masukkan deskripsi produk" style="padding: 0.5rem;"
                                                value="<?= $produk['deskripsi_produk']; ?>">
                                        </div>

                                        <label>Varian Produk</label>
                                        <div>
                                            <button id="tambahvarianBtn" class="btn btn-light"><i
                                                    class="material-icons opacity-10">add</i>
                                                Tambah Varian</button>
                                            <div id="container-varian">
                                                <?php foreach ($varian as $index => $v) { ?>
                                                <div class="d-flex gap-2" id="itemvarian<?= $index +1 ?>">
                                                    <div class="w-100">
                                                        <input type="text" name="namavarian<?= $index +1 ?>"
                                                            placeholder="Nama Varian" class="form-control border px-2"
                                                            value="<?= $v['nama'] ?>">
                                                    </div>
                                                    <div class="w-100">
                                                        <input type="number" name="hargavarian<?= $index +1 ?>"
                                                            placeholder="Harga Varian" class="form-control border px-2"
                                                            value="<?= $v['harga'] ?>">
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-primary" id="closevarian<?= $index +1 ?>"
                                                            onclick="closeVarian(<?= $index +1 ?>)" type="button"><i
                                                                class="material-icons opacity-10">close</i></button>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class=" form-group w-100 mb-2">
                                        <label for="harga_ShopeeFood">Harga ShopeeFood</label>
                                        <input type="number" class="form-control border" name="harga_ShopeeFood"
                                            placeholder="Masukan harga" style="padding: 0.5rem;"
                                            value="<?= $produk['harga_shopeefood']; ?>">
                                    </div>
                                    <div class=" form-group w-100 mb-2">
                                        <label for="harga_GoFood">Harga GoFood</label>
                                        <input type="number" class="form-control border" name="harga_GoFood"
                                            placeholder="Masukan harga" style="padding: 0.5rem;"
                                            value="<?= $produk['harga_gofood']; ?>">
                                    </div>
                                    <div class=" form-group w-100 mb-2">
                                        <label for="harga_GrabFood">Harga GrabFood</label>
                                        <input type="number" class="form-control border" name="harga_GrabFood"
                                            placeholder="Masukan harga" style="padding: 0.5rem;"
                                            value="<?= $produk['harga_grabfood']; ?>">
                                    </div>
                                </div>
                                <input type="number" name="rahasia_varian" value="0" style="display: none;"
                                    id="rahasiaVarian">
                                <button type="submit" class="btn btn-dark" style="margin-top: 10px;">Simpan
                                    Perubahan</button>
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


<script>
let hitungVarian = <?= count($varian) ?>;
const rahasiavarianElm = document.getElementById('rahasiaVarian');
const containervarianElm = document.getElementById('container-varian');
const tambahvarianElm = document.getElementById('tambahvarianBtn');
const fotoprevElm = document.getElementById('fotoprev');
const fileElm = document.getElementById('inputGroupFile01');
const fileFixElm = document.getElementById('inputGroupFileFix');
fileElm.addEventListener('change', (e) => {
    const file = fileElm.files[0];
    const blobFile = new Blob([file], {
        type: file.type
    });

    const dataTranfer = new DataTransfer();
    dataTranfer.items.add(file);
    fileFixElm.files = dataTranfer.files;
    fileFixElm.disabled = false;

    fotoprevElm.src = URL.createObjectURL(blobFile);

})
tambahvarianElm.addEventListener('click', (e) => {
    e.preventDefault()
    hitungVarian++;
    rahasiavarianElm.value = Number(rahasiavarianElm.value) + 1;
    // const itemVarian = document.createElement('div');
    // itemVarian.classList.add('d-flex');
    // itemVarian.classList.add('gap-2');

    // <div class="d-flex gap-2">
    //     <div class="w-100">
    //         <input type="text" name="namavarian1" placeholder="Nama Varian"
    //             class="form-control border px-2">
    //     </div>
    //     <div class="w-100">
    //         <input type="number" name="hargavarian1"
    //             placeholder="Harga Varian" class="form-control border px-2">
    //     </div>
    //     <div>
    //         <button class="btn btn-dark" id="closevarian1"><i
    //                 class="material-icons opacity-10">close</i></button>
    //     </div>
    // </div>
    containervarianElm.innerHTML +=
        '<div class="d-flex gap-2" id="itemvarian' + hitungVarian +
        '"><div class="w-100"><input type="text" name="namavarian' + hitungVarian +
        '" placeholder="Nama Varian" class="form-control border px-2"></div><div class="w-100"><input type="number" name="hargavarian' +
        hitungVarian +
        '" placeholder="Harga Varian" class="form-control border px-2"></div><div><button onclick="closeVarian(' +
        hitungVarian + ')" type="button" class="btn btn-primary" id="closevarian' +
        hitungVarian + '"><i class="material-icons opacity-10">close</i></button></div></div>'
    console.log(rahasiavarianElm.value)
})

function closeVarian(urutan) {
    console.log("ini hapus varian nomor: " + urutan);
    containervarianElm.removeChild(document.getElementById('itemvarian' + urutan));
}

function hapusGambar() {
    fotoprevElm.src = "/assets/img/prev.png";
    fileFixElm.disabled = true
}
</script>

<?= $this->endSection(); ?>