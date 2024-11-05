<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-3 mb-4">
            <img src="fotoppkd.png" alt="gambar1" class="img-fluid" width="150">
        </div>
        <div class="col-6 text-center mb-4">
            <h1>SELAMAT DATANG DI PPKD JAKPUS</h1>
            <p>Jl. Karet Pasar Baru Barat V No. 23,
                Karet Tengsin Jakarta Pusat.</p>
        </div>
            <div class="col-3 mb-3">
                <img src="fotoppkd.png" alt="gambar1" class="img-fluid" width="150">
            </div>
        </div>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg shadow-sm sticky-top" style="background-color: #bee1fa">
            <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navAltMarkup" 
                aria-controls="navAltMarkup" 
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse" id="navAltMarkup">
                <div class="navbar-nav">
                    <a href="home.php" class="nav-link">Home</a>
                    <a href="index.php" class="nav-link active">Login</a>
                    <a href="#" class="nav-link">Department</a>
                    <a href="register.php" class="nav-link"></a>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- Running text -->
         <marquee behavior="" direction="">Angkatan 3 Sedang Membuat Project WEB</marquee>
        <!-- End Running text -->
        
        <div class="container mt-5 mb-5">
            <div class="row justify-content-start">
                <h2 class="mb-4">Kegiatan</h2>
            <div class="col-6">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="foto4.png" class="rounded mx-auto d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                <img src="foto5.png" class="rounded mx-auto d-block w-100" alt="">
                        </div>
             <div class="carousel-item">
                            <img src="foto6.png" class="rounded mx-auto d-block w-100" alt="">
                        </div>
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
            </div>
            
            <div class="col-6">
                <h2>Apalah-apalah</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem maxime reprehenderit, nisi aperiam harum qui ducimus quam dolorum, ratione enim mollitia, fugiat nihil quisquam similique eveniet praesentium officiis deleniti ipsum?</p>
                <h2>Intinya Apalah</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia, eveniet dolorum voluptatibus totam aliquam nostrum magni consequuntur iure necessitatibus doloremque corrupti dolorem, quas ducimus cumque nemo laudantium inventore! Quibusdam, officia!</p>
            </div>
        </div>
       
      



    <footer class="shadow-sm mt-5" style="background-color: #bee1fa; min-height: 65px">
        <div class="row">
        <div class="col-md-6 d-flex justify-content-between">
            <p class="text-center ps-4 pt-3">Copyright  &copy 2024 PPKD Jakarta Pusat</p>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <p class="text-center pt-3 pe-4">Privacy Policy</p>
        </div>
        </div> 
    </footer>
</div>
         
    
    
    <script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
