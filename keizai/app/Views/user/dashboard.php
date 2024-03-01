<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keizai Coffee</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        #carouselExampleIndicators {
            height: 400px;
            max-width: 100%;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 20px;
        }

        .carousel-item img {
            height: 400px;
            object-fit: cover;
            width: 100%;
            border-radius: 20px;
        }

        .category-card {
            cursor: pointer;
            transition: color 0.3s;
            /* Efek transisi untuk perubahan warna */
        }

        .category-card:hover {
            color: red;
            /* Warna teks yang berubah saat kursor berada di atas kartu */
        }

        .category-container {
            overflow-x: auto;
            /* Menambahkan overflow-x */
            white-space: nowrap;
            padding-bottom: 15px;
            /* Menambahkan padding bawah untuk memberikan ruang agar kategori tidak terpotong */
        }

        .category-card {
            display: inline-block;
            /* Mengatur kartu kategori agar berbaris secara horizontal */
            margin-right: 55px;
            /* Margin antar kartu */
        }

        /* Untuk ukuran layar kecil (mobile) */
        @media (max-width: 576px) {
            .category-card {
                font-size: 0.8rem;
                /* Menyesuaikan ukuran font */
                margin-right: 15px;
                /* Mengurangi margin antar kartu untuk membuat lebih banyak ruang */
            }

            .category-card i {
                font-size: 2rem;
                /* Menyesuaikan ukuran ikon */
            }

            .category-container {
                width: 100%;
                /* Mengatur lebar kontainer kategori agar memenuhi layar */
                padding-right: 15px;
                /* Menambahkan padding di sisi kanan untuk memberikan ruang untuk scrollbar */
                margin-bottom: 15px;
                /* Menambahkan margin bawah untuk memberikan ruang agar tidak terpotong */
            }
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container"><a class="navbar-brand" href="#">Keizai Coffee</a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Masuk</a></li>
                    <li class="nav-item">
                        <form class="d-flex"><input class="form-control me-2" type="search" placeholder="Cari" aria-label="Cari"><button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button></form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Dashboard -->
    <div class="container mt-4">
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active"><img src="https://via.placeholder.com/1200x400?text=Slide+1" class="d-block" alt="Slide 1"></div>
                <div class="carousel-item"><img src="https://via.placeholder.com/1200x400?text=Slide+2" class="d-block" alt="Slide 2"></div>
                <div class="carousel-item"><img src="https://via.placeholder.com/1200x400?text=Slide+3" class="d-block" alt="Slide 3"></div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container">
            <h2 class="mt-5 mb-4">Kategori</h2>
            <div class="row justify-content-center g-4 category-container">
                <div class="col">
                    <div class="d-flex flex-nowrap justify-content-center">
                        <a href="#" class="text-decoration-none text-dark mb-4 category-card">
                            <div class="text-center">
                                <i class="fas fa-coffee fa-3x mb-2"></i>
                                <h5 class="card-title">Kategori 1</h5>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none text-dark mb-4 category-card">
                            <div class="text-center">
                                <i class="fas fa-mug-hot fa-3x mb-2"></i>
                                <h5 class="card-title">Kategori 2</h5>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none text-dark mb-4 category-card">
                            <div class="text-center">
                                <i class="fas fa-glass-martini fa-3x mb-2"></i>
                                <h5 class="card-title">Kategori 3</h5>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none text-dark mb-4 category-card">
                            <div class="text-center">
                                <i class="fas fa-wine-glass-alt fa-3x mb-2"></i>
                                <h5 class="card-title">Kategori 4</h5>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none text-dark mb-4 category-card">
                            <div class="text-center">
                                <i class="fas fa-beer fa-3x mb-2"></i>
                                <h5 class="card-title">Kategori 5</h5>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none text-dark mb-4 category-card">
                            <div class="text-center">
                                <i class="fas fa-wine-glass-alt fa-3x mb-2"></i>
                                <h5 class="card-title">Kategori 6</h5>
                            </div>
                        </a>
                        <a href="#" class="text-decoration-none text-dark mb-4 category-card">
                            <div class="text-center">
                                <i class="fas fa-beer fa-3x mb-2"></i>
                                <h5 class="card-title">Kategori 7</h5>
                            </div>
                        </a>
                        <!-- Tambahkan kategori lainnya di sini -->
                    </div>
                </div>
            </div>
        </div>


        <hr>
        <h2>Produk</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card"><img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama Produk</h5>
                        <p class="card-text">Kategori: Kategori 1</p>
                        <p class="card-text">Harga: $10</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card"><img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama Produk</h5>
                        <p class="card-text">Kategori: Kategori 2</p>
                        <p class="card-text">Harga: $12</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card"><img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama Produk</h5>
                        <p class="card-text">Kategori: Kategori 3</p>
                        <p class="card-text">Harga: $15</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card"><img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nama Produk</h5>
                        <p class="card-text">Kategori: Kategori 1</p>
                        <p class="card-text">Harga: $10</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and Font Awesome JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>