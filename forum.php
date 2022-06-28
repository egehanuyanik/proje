<?php
 require 'inc/config.php';
 require 'inc/func.php';

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" >
    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>Forum</title>
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
                        <form action="" method="POST">
                        <div class="input-group ms-2">
                            <input type="text" name="arama" placeholder="Ara..." class="form-control form-control-sm">
                            <a href="#" class="btn btn-outline-success ">Ara</a>
                        </div>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>    
    </div>

    <section class="forumSection">
        <div class="container">
            
            <div class="container">
            <div class="w-100">
                <div class="container">
                    <form action="" method="POST" class="forumForm" enctype="multipart/form-data">
                        <div class="w-75 mx-auto">
                        <?php
                                if($_POST){
                                    @$kullanici_adi = $_POST["kullanici_adi"];
                                    $baslik = $_POST["baslik"];
                                    $aciklama = $_POST["aciklama"];
                                    $resim = $_POST["resim"];
                                    $link = permalink($baslik);
                                    
                                    $veriekle = DB::prepare("INSERT INTO forum SET kullanici_adi=?,baslik=?,aciklama=?,resim=?,link=?");
                                    $veriekle ->execute([
                                        @$kullanici->kullanici_adi,
                                        $baslik,
                                        $aciklama,
                                        $resim,
                                        $link
                                    ]);

                                    if($veriekle){
                                        echo '<p class="alert alert-success">Gönderi oluşturuldu.</p>';
                                        header("REFRESH:5;URL=forum.php");
                                    }
                                    else{
                                        echo '<p class="alert alert-danger">Gönderi oluşturulamadı.</p>';
                                        header("REFRESH:2;URL=forum.php");
                                    }
                                }

                                

                            ?>
                            
                            <?php if (@$kullanici->kullanici_adi==NULL): ?>
                                    <div class="alert alert-danger">
                                        Gönderi oluşturmak için lütfen giriş yapınız.
                                    </div>
                                <?php endif ?>
                            <div class="w-100 mb-3 bg-success text-white rounded-2 p-2 text-center">
                                <span>Gönderinizi Oluşturun</span>
                            </div>
                            <div class="w-100 mb-3">
                                <label class="form-label">Gönderi Başlığınız</label>
                                <input class="form-control border border-info" name="baslik" type="text" placeholder="Gönderi Başlığını Giriniz" required>
                            </div>
                            <div class="w-100 mb-3">
                                <label class="form-label">Seyahat Deneyimleriniz</label>
                                <textarea class="form-control border border-info" name="aciklama" id="" cols="30" rows="8" placeholder="Sehayat Anılarınızı Yazınız" required></textarea>
                            </div>
                            <div class="btn-group mx-auto w-100 mb-4">
                                <!--<input type="file" name="resim">-->
                                <button type="submit" class="btn btn-success ms-4" >Oluştur</button>
                                <button type="reset" class="btn btn-success ms-4" >İptal Et</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="card shadow mt-5 p-md-3 bg-dark">
                    <table class="table table-dark table-striped">
                        <thead class="thead-dark">
                                <tr>
                                    <td>Başlık</td>
                                    <td>Kullanıcı Adı</td>
                                    <td>Tarih</td>
                                </tr>
                        </thead>
                                <?php

                                $veri = DB::prepare("SELECT * FROM forum ORDER BY id DESC");
                                $veri->execute();
                                $islem = $veri->fetchALL(PDO::FETCH_ASSOC);

                                foreach($islem as $row){
                                    echo 
                                    '<tr>
                                        <td class="card-body">
                                            <a href="forumGonderi.php?link='.$row["link"].'" class="text-white" target="_blank">'.$row["baslik"].'</a>
                                        </td>
                                        <td class="card-body">
                                            '.$row["kullanici_adi"].'
                                        </td>
                                        <td class="card-body">
                                            '.$row["tarih"].'
                                        </td>
                                    </tr>';
                                }
                                ?> 
                        
                    </table>
                                
                            

                            
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