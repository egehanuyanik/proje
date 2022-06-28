<?php 
    require 'inc/config.php';

    $kullanici_id = @$_SESSION['login'];
    $kullanici = DB::getRow("SELECT * FROM kullanicilar WHERE id=? ",array($kullanici_id)); 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/8e5f8a0f73.js" crossorigin="anonymous"></script>

    <title>Spor Turizmi</title>
</head>
<body>
    <div class="navbar">
        <nav class="navbar bg-warning w-100 navbar-expand-sm" style="margin-top: -8px;">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="index.php" class="btn btn-outline-dark">Anasayfa</a></li>
                    <li class="nav-item"><a href="forum.php" class="btn btn-outline-dark ms-2">Forum</a></li>
                    <li class="nav-item"><a href="iletisim.php" class="btn btn-outline-dark ms-2">İletişim</a></li>
                </ul>
                <ul class="navbar-nav">
                <li class="nav-item"><p class="baslik2"><?php echo @$kullanici->kullanici_adi ?></p></li>
                    <li class="nav-item">
                        <div class="btn-group ms-2">
                           <a href="girisYap.php" class="btn btn-outline-dark">Giriş Yap</a> 
                           <a href="kayitOl.php" class="btn btn-outline-dark">Kayıt Ol</a> 
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="input-group ms-2">
                            <input type="text" placeholder="Ara..." class="form-control form-control-sm">
                            <a href="#" class="btn btn-outline-success ">Ara</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>    
    </div>

    <section class="sectionIndex">
        <div class="container">
            <h2 class="baslik1">Spor Turizmi</h2>
            <div class="w-100 mb-4">
                
                <div class="row shadow">
                    <div class="col-md-6 mt-2">
                        <img class="resim img-thumbnail" src="images/ali-dagi-kayseri.jpg"><p>
                        <p class="baslik2">Ali Dağı, Kayseri</p>
                        <p class="text-black-50"><i class="fa-solid fa-calendar-days me-2"></i>27.05.2022</p>
                        <p class="icerikyazi">
                            Yolu Kayseri’ye düşen ekstrem spor meraklıları, iki macerayı aynı anda yaşayabilir. Yamaç paraşütü yapmak isteyenler için tandem uçuş olanağı...</p> 
                        </p>
                        <p class="text-end devamOku"><a class="text-decoration-none text-black-50" href="kategoriler/alidagi.php">Devamını Oku<i class="fa-solid fa-circle-arrow-right me-5 ms-2"></i></a></p>
                    </div>
                    <div class="col-md-6 mt-2">
                        <img class="resim img-thumbnail" src="images/bozdag.jpg"><p>
                        <p class="baslik2">Bozdağ, İzmir</p>
                        <p class="text-black-50"><i class="fa-solid fa-calendar-days me-2"></i>27.05.2022</p>
                        <p class="icerikyazi">
                            İzmir’in Ödemiş ilçesine bağlı bulunan Bozdağ Kayak Merkezi; Ege’nin ılıman iklimine rağmen her kış mevsiminde ortaya çıkan bir doğal cennet.</p> 
                        </p>
                        <p class="text-end devamOku"><a class="text-decoration-none text-black-50 " href="kategoriler/bozdag.php">Devamını Oku<i class="fa-solid fa-circle-arrow-right me-5 ms-2"></i></a></p>
                    </div>
                    
                </div>
            </div>
            <div class="row shadow">
                <div class="col-md-6 mt-2">
                    <img class="resim img-thumbnail" src="images/buyukresif.jpg"><p>
                    <p class="baslik2">Büyük Resif, Bodrum</p>
                    <p class="text-black-50"><i class="fa-solid fa-calendar-days me-2"></i>27.05.2022</p>
                    <p class="icerikyazi">
                        Bu dalış bölgesi Kızıldeniz göçmenlerine ev sahipliği yapan ve aynı zamanda Ege bölgesindeki bütün sualtı canlılarını...</p> 
                    </p>
                    <p class="text-end devamOku"><a class="text-decoration-none text-black-50" href="kategoriler/buyukresif.php">Devamını Oku<i class="fa-solid fa-circle-arrow-right me-5 ms-2"></i></a></p>
                </div>
                <div class="col-md-6 mt-2">
                    <img class="resim img-thumbnail" src="images/uludag.webp"><p>
                    <p class="baslik2">Uludağ, Bursa</p>
                    <p class="text-black-50"><i class="fa-solid fa-calendar-days me-2"></i>27.05.2022</p>
                    <p class="icerikyazi">
                        Bursa şehir merkezine yalnızca 40 km uzaklıkta konumlanan Uludağ’a hem İstanbul hem de Yalova tarafından...</p> 
                    </p>
                    <p class="text-end devamOku"><a class="text-decoration-none text-black-50 " href="kategoriler/uludag.php">Devamını Oku<i class="fa-solid fa-circle-arrow-right me-5 ms-2"></i></a></p>
                </div>

                
        </div>
            <div class="container col-4 mt-3">
                <div class="row pb-3">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Diğer Kategoriler
                        </button>
                        <ul class="dropdown-menu w-75 ms-5 mb-2 text-center bg-success">
                        <li><a class="dropdown-item " href="tarihi.php">Tarihi Mekanlar</a></li>
                        <li><a class="dropdown-item" href="dogal.php">Doğal Güzellikler</a></li>
                        <li><a class="dropdown-item disabled" href="spor.php">Spor Turizmi</a></li>
                        </ul>
                    </div>
                </div>
            </div>    

            

            
        </div>
    </section>

    <footer class="bg-dark p-3 w-100">
        <div class="container w-100 ">
            <ul class="d-inline-block">
                <li class="footer-li"><a class="footer-a" href="iletisim.php">İletişim</a></li>
                <li class="footer-li"><a class="footer-a" href="girisYap.php">Giriş Yap</a></li>
                <li class="footer-li"><a class="footer-a" href="kayitOl.php">Kayıt Ol</a></li>
            </ul>
            <div class="float-end">
                <ul>
                    <li class="sosyal"><a href="https://www.facebook.com/"><img class="logo" src="images/facebook-logo.png"></a></li>
                    <li class="sosyal"><a href="https://www.instagram.com/"><img class="logo" src="images/instagram-logo.png"></a></li>
                    <li class="sosyal"><a href="https://twitter.com/"><img class="logo" src="images/twitter-logo.png"></a></li>
                    <li class="sosyal"><a href="https://www.youtube.com/"><img class="logo" src="images/youtube-logo.png"></a></li>
                </ul>
            </div>
            <div class="w-100 text-center">
                <span class="text-white">© 2022 Tüm Hakları Saklıdır.</span>
            </div>
            
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>