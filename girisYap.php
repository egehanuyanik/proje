<?php
    require 'inc/config.php';

    if($_POST){

        $kullanici_adi = $_POST['kullanici_adi'];
        $sifre = $_POST['sifre'];

        $kontrol = DB::getRow("SELECT * FROM kullanicilar WHERE kullanici_adi=? AND sifre=?",array(
            $kullanici_adi,
            $sifre
        ));
        /** başarılı ise */
        if ($kontrol){
            $_SESSION['login']= $kontrol -> id;
            header("Location:index.php");
            die();
        }
        else
        {
            header("Location:girisYap.php?error=1");
            die();
        }
        
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
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest"> 
    <title>Giriş Yap</title>
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
    <section class="girisyapSection">
        <div class="container w-25 mx-auto">
            <form action="" method="POST" class="girisyapForm">
                <div class="w-100 mb-3 bg-success text-white rounded-2 p-2 text-center">
                    <span>Hoş Geldiniz</span>
                </div>
                <div class="w-100 mb-3">
                    <label class="form-label">Kullanıcı Adı</label>
                    <input type="text" name="kullanici_adi" class="form-control border-info" placeholder="Kullanıcı Adı Giriniz" required>
                </div>
                <div class="w-100 mb-3">
                    <label class="form-label">Parola</label>
                    <input type="password" name="sifre" class="form-control border-info" placeholder="Parola Giriniz" required>
                </div>
                <div class="w-100 mb-3">
                <?php if (@$_GET['success']): ?>
                    <div class="alert alert-success">
                        Başarıyla kayıt oldunuz.
                    </div>
                <?php endif ?>
                <?php if (@$_GET['error']): ?>
                    <div class="alert alert-danger">
                        Kullanıcı adı veya şifre hatalı.
                    </div>
                <?php endif ?>
                </div>
                <div class="w-25 girisyap">
                    <button class="btn btn-success">
                    Giriş Yap
                    </button>
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