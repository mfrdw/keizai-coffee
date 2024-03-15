<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container col-md-10 py-4 offset-md-2">
    <dir class="row">
        <div class="d-flex w-100 justify-content-between mb-6">
            <div>
                <h4>LAPORAN</h4>
                <h6>Laporan Penjualan</h6>
            </div>
            <div>
                <a class="btn btn-dark btn-sm" data-toggle="modal" data-target="#konfirmasiModal"><i
                        class="material-icons opacity-10">arrow_back</i> Kembali</a>
            </div>
        </div>
        <div class="card mb-1">
            <div class="d-flex gap-2">
                <h6 class="flex-grow-1">Laporan Keuangan</h6>
                <a class="btn btn-dark" href="#">Dowdload Excel</a>
                <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                        class="material-icons opacity-10 m-2">filter_list</i>Filter</button>
                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Filter
                        </h5>
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="offcanvas"
                            aria-label="Close"><i class="material-icons opacity-10">close</i></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class=" form-group w-100">
                            <label for="kategori_produk">Harga</label>
                            <select class="form-select border" name="kategori_produk"
                                aria-label="Default select example" style="padding: 0.5rem;">
                                <option selected>Pilih harga</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class=" form-group w-100">
                            <label for="input-waktu">Waktu</label>
                            <div class="d-flex gap-2">
                                <select class="form-select border w-100" onchange="gantiWaktu(event)"
                                    aria-label="Default select example" style="padding: 0.5rem;" id="pilih-waktu">
                                    <option selected value="harian">Laporan Harian</option>
                                    <option value="bulanan">Laporan Bulanan</option>
                                    <option value="tahunan">Laporan Tahunan</option>
                                </select>
                                <div class="ganti-waktu">
                                    <input type="date" class="w-100 form-control border" value="<?php
                                            $d = strtotime($transaksiterbaru['tanggal']);
                                            echo date("Y-m-d", $d);
                                        ?>" id="input-tanggal">
                                </div>
                                <div class="w-100 sembunyi ganti-waktu">
                                    <div class="d-flex gap-2">
                                        <select class="form-select border" name="" id="pilih-bulan">
                                            <option value="01">Jan</option>
                                            <option value="02">Feb</option>
                                            <option value="03">Mar</option>
                                            <option value="04">Apr</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Jun</option>
                                            <option value="07">Jul</option>
                                            <option value="08">Ags</option>
                                            <option value="09">Sep</option>
                                            <option value="10">Okt</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Des</option>
                                        </select>
                                        <select class="form-select border" name="" id="">
                                            <?php for ($i = 24; $i > 10; $i--) { ?>
                                            <option value="20<?= $i ?>">20<?= $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="sembunyi ganti-waktu w-100">
                                    <select class="form-select border" name="" id="">
                                        <?php for ($i = 24; $i > 10; $i--) { ?>
                                        <option value="20<?= $i ?>">20<?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=" form-group w-100">
                            <label for="kategori_produk">Pembayaran</label>
                            <select class="form-select border" name="kategori_produk"
                                aria-label="Default select example" style="padding: 0.5rem;">
                                <option selected>Pilih Pembayaran</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="mt-6">
                            <button type="button" class="btn btn-dark" onclick="actionFilter()">Terapkan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="d-flex">
                    <div class="d-flex gap-1" style="flex:1;">
                        <p>Total Penjualan</p>
                        <button type="button" class="btn btn-light btn-sm">Detail</button>
                    </div>
                    <div class="" style="flex:2">
                        <p id="total-harga">Rp <?= $transaksiterbaru['total_harga'] ?> </p>
                    </div>
                </div>
            </div>
    </dir>
</div>
<script>
let totalHarga = 0;
const pilihBulanElm = document.getElementById('pilih-bulan');
const transaksi = JSON.parse('<?= $transaksiJson ?>');
console.log(transaksi)
const gantiWaktuElm = document.querySelectorAll(".ganti-waktu");
const pilihWaktuElm = document.getElementById('pilih-waktu');
const inputTanggalElm = document.getElementById('input-tanggal');
const totalHargaElm = document.getElementById('total-harga');

function gantiWaktu(e) {
    if (e.target.value == 'harian') {
        gantiWaktuElm[0].classList.remove('sembunyi')
        gantiWaktuElm[1].classList.add('sembunyi')
        gantiWaktuElm[2].classList.add('sembunyi')
    } else if (e.target.value == 'bulanan') {
        gantiWaktuElm[0].classList.add('sembunyi')
        gantiWaktuElm[1].classList.remove('sembunyi')
        gantiWaktuElm[2].classList.add('sembunyi')

        pilihBulanElm.value = transaksi[0].tanggal.split(" ")[0].split("-")[1];
    } else if (e.target.value == 'tahunan') {
        gantiWaktuElm[0].classList.add('sembunyi')
        gantiWaktuElm[1].classList.add('sembunyi')
        gantiWaktuElm[2].classList.remove('sembunyi')
    }
}

function actionFilter() {
    let hasilFilterWaktu;
    let hasilFilterHarga;
    let hasilFilterPembayaran;
    totalHarga = 0;

    //Filter Waktu
    if (pilihWaktuElm.value == 'harian') {
        hasilFilterWaktu = transaksi
            .filter((tr) => {
                if (inputTanggalElm.value == tr.tanggal.split(" ")[0])
                    return true;
                else return false;
            })
            .map((produk) => {
                totalHarga += Number(produk.total_harga);
                return produk;
            });
    } else if (pilihWaktuElm.value == 'bulanan') {} else if (pilihWaktuElm.value == 'tahunan') {}
    console.log(hasilFilterWaktu)
    totalHargaElm.innerHTML = totalHarga



    //Filter harga
}
</script>


<?= $this->endSection(); ?>