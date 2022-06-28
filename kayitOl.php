<?php
    require 'inc/config.php';

    if ($_POST){

       $ad_soyad = $_POST['ad_soyad'];
       $email = $_POST['email'];
       $kullanici_adi = $_POST['kullanici_adi'];
       $sifre = $_POST['sifre'];

       $id = DB::insert("INSERT INTO kullanicilar(ad_soyad,email,kullanici_adi,sifre) VALUES(?,?,?,?)",array(
            $ad_soyad,
            $email,
            $kullanici_adi,
            $sifre
       ));

       header("Location:girisYap.php?success=1");
    }

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
    <title>Kayıt Ol</title>
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
    <section class="kayitolSection">
       <div class="container w-25 mx-auto">
            <form action="" method="POST" class="form kayitolForm">
                <div class="w-100 text-center bg-success rounded-2 p-2 text-white mb-3">
                    <span>Aramıza Hoş Geldiniz</span>
                </div>
                <div class="w-100 mb-2">
                    <label class="form-label">Adınız Soyadınız</label>
                    <input type="text" name="ad_soyad" class="form-control border border-info" placeholder="Adınız ve Soyadınız" required>
                </div>
                <div class="w-100 mb-2">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control border border-info" placeholder="Email Giriniz" required>
                </div>
                <div class="w-100 mb-2">
                    <label class="form-label">Kullanıcı Adı</label>
                    <div class="input-group">
                        <span class="input-group-text border border-info">@</span>
                        <input type="text" name="kullanici_adi"  class="form-control border border-info" placeholder="Kullanıcı Adınızı Oluşturunuz" required>
                    </div>
                </div>
                <div class="w-100 mb-2">
                    <label class="form-label">Parola</label>
                    <input type="password" name="sifre" class="form-control border border-info" placeholder="Parolanızı Oluşturun" required>
                </div>
                <div class="w-100 mb-1">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input border border-info" required>
                        <label class="form-label">Hizmet Koşullarını ve Gizlilik Politikasını kabul ediyorum. KVKK Aydınlatma Metni'ni okudum ve kişisel verilerimin Rıza Metni uyarınca işlenmesine onay veriyorum.</label>
                    </div>
                </div>
                <div class="w-25 mx-auto">
                    <button class="btn btn-success w-100">Kayıt Ol</button>
                </div>
            </form>
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