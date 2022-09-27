<?php
// Secret Key ini kita ambil dari halaman Google reCaptcha
// Sesuai pada catatan saya di STEP 1 nomor 6
$secret_key = "6LdwWjIiAAAAAHgLPgGJg7TvlvtlMkRrC2MpNqgu";
// Disini kita akan melakukan komunkasi dengan google recpatcha
// dengan mengirimkan scret key dan hasil dari response recaptcha nya
$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
$response = json_decode($verify);
if($response->success){ // Jika proses validasi captcha berhasil
  echo "<script type='text/javascript'>alert('Register_Berhasil'); 
		window.location='login.php'; </script>";
}else{ // Jika captcha tidak valid
    echo "<script type='text/javascript'>alert('Chapta Tidak Valid Cheklist Saya Bukan Robot'); 
    window.location='sign.php'; </script>";
}
?>