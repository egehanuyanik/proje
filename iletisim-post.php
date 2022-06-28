<?php 


require 'inc/config.php';

if ( $_POST ) 
{
	$ad_soyad = $_POST['ad_soyad'];      
	$mail      = $_POST['mail'];    
	$mesaj      = $_POST['mesaj'];    

	DB::insert("INSERT INTO iletisim(ad_soyad,mail,mesaj) VALUES(?,?,?)",array(
		$ad_soyad,
		$mail,
		$mesaj
	));


	$mail_icerik = "Merhaba yönetici, sitenizden yeni bir iletişim formu gönderildi. Bilgileri aşağıdadır.";
	$mail_icerik .= "Adı Soyadı: $ad_soyad<br>";
	$mail_icerik .= "Email: $mail<br>";
	$mail_icerik .= "Mesaj: $mesaj<br>";









	header("Location:iletisim.php?success=1");
}

?>