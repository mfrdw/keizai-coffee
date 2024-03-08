<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<!-- End Navbar -->
<div class="container col-md-10 py-4 offset-md-2">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">List Pembeli:</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table mb-0 text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Basic Info</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Metode Pembayaran</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <h6 class="mb-0 text-sm">Nama Pelanggan</h6>
                                                <p class="text-xs text-secondary mb-0">Nomor Meja</p>
                                            </div>
                                            <div>
                                                <hr>
                                                <h6 class="mb-0 text-sm">Item Pesanan</h6>
                                                <p class="text-xs text-secondary mb-0">Nama</p>
                                                <p class="text-xs text-secondary mb-0">Coffee Latte</p>
                                            </div>
                                            <div>
                                                <hr>
                                                <p class="text-xs text-secondary mb-0">Total</p>
                                                <p class="text-xs text-secondary mb-0">Biaya Admin</p>
                                                <p class="text-xs text-secondary mb-0">Total Keseluruhan</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle-top">
                                        <hr>
                                        <span class="badge badge-sm bg-gradient-success">Success</span>
                                        <div>
                                            <hr>
                                            <p class="text-xs text-secondary mb-0">Jumlah</p>
                                            <p class="text-xs text-secondary mb-0">1</p>
                                        </div>
                                    </td>
                                    <td class="align-middle-top">
                                        <div>
                                            <hr>
                                            <p class="text-xs font-weight-bold mb-0">KNZ000005</p>
                                        </div>
                                        <div>
                                            <hr>
                                            <p class="text-xs text-secondary mb-0">Harga Satuan</p>
                                            <p class="text-xs text-secondary mb-0">Rp. 18.000</p>
                                        </div>
                                        <div>
                                            <hr>
                                            <p class="text-xs text-secondary mb-0">Rp. 18.000</p>
                                            <p class="text-xs text-secondary mb-0">Rp. 2.500</p>
                                            <p class="text-xs text-secondary mb-0">Rp. 20.500</p>
                                        </div>
                                    </td>
                                    <td class="align-middle-top">
                                        <hr>
                                        <span class="text-secondary text-xs font-weight-bold">QRIS</span>
                                    </td>
                                    <td class="align-middle-top">
                                        <span class="text-secondary text-xs font-weight-bold">23/04/18, 15:30:31</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>