<?php
session_start();
if (!isset($_SESSION['log'])){
  echo "<script>alert('ANDA HARUS LOGIN DAHULU');document.location.href='login.php';</script>";
    exit;
    // return var_dump($_SESSION);
}

?>
<?php
include "koneksi.php"; //memngambi data dari koneksi.php
date_default_timezone_set("Asia/Jakarta");
$err = array();
if (isset($_GET['id_update'])) {
    $id_update   = $_GET['id_update'];
    $update      = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_update'");
    $data       = mysqli_fetch_assoc($update);
    // return var_dump($data['folder']);
    // membuat function untuk set aktif radio button
        function active_radio_button($value,$input){
        // apabilan value dari radio sama dengan yang di input
        $result =  $value==$input?'checked':'';
        return $result;
        }
    }
if(isset($_POST['submit'])){
	$email_user= $_POST['email_user'];
	$nama_user= $_POST['nama_user'];
	$password = md5($_POST["password_user"]);
	$tanggal_login = $_POST['tgl_login'];
	$no_user = $_POST['no_user'];
	$provinsi = $_POST['provinsi'];
	$alamat = $_POST['alamat'];
	$kota = $_POST['kota'];
	$kecamatan = $_POST['kecamatan'];
	$desa = $_POST['kelurahan'];
	$date = $_POST['date'];
	$cek_user = mysqli_query($conn, 'SELECT * FROM user INNER JOIN provinces on user.id = provinces.id
    INNER JOIN regencies on user.id = regencies.id');
	$row      = mysqli_num_rows($cek_user);
	if($row > 0 ){
		echo "<script type='text/javascript'>alert('Register Gagal Email Anda Buat Telah Terpakai'); 
  		window.location='sign.php'; </script>";
		
	}else{
		array_push($err);
		mysqli_query($conn,"insert into user set email_user= '$email_user', nama_user='$nama_user', 
			id_provinsi='$provinsi', id_kota='$kota', id_kecamatan ='$kecamatan', id_desa='$desa', 
			alamat = '$alamat', no_user = '$no_user', tanggal_lahir='$date', password_user = '$password'");
		echo "<script type='text/javascript'>alert('Register_Berhasil'); 
		window.location='login.php'; </script>";	
	}
	
}
                       
                    
?>
<!DOCTYPE html>
<html>
<head>
<title>Silahkan Melakukan Regristasi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<link href="css/register.css" rel="stylesheet" type="text/css" >
<link href="css/select.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="asset/bootstrap-3.3.7/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="asset/select2-4.0.6-rc.1/dist/css/select2.min.css">
<script src="jquery 2.0.2.min.js"></script>
<script src="asset/jquery/jquery-3.3.1.min.js"></script>
<script src="asset/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
<script src="asset/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script> 
<script src="asset/js/app.js"></script>

</head>
<body>
<?php
    include("koneksi.php");     
?>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Form Ubah Profil</h1></h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post">
					<input type="hidden" name="tgl_login" value="<?=date ('Y-m-d H:i')?>">
                    <input type="hidden" value="<?php echo $data['id_user'];?>" name="id_user">
					<input target= _blank class="text email" id="email_user" type="email" name="email_user" placeholder="Email"  value="<?php echo $data['email_user'] ?>">
					<input class="text" id="name_user" type="text" name="nama_user" placeholder="Masukan Nama Anda"  required="" minlength="4" maxlength="50" value="<?php echo $data['nama_user'] ?>">
					<input class="text email" type="text" id="no_user" onkeypress="return cek_input(event)" name="no_user" placeholder="Masukan Nomer Anda" value="<?php echo $data['no_user'] ?>">
					<input id="date" name="date" placeholder="Masukan Tanggal Lahir Anda" type="text" value="<?php echo $data['tanggal_lahir'] ?>">
					<br>
					<label>Isikan alamat anda</label>			
                  	<?php                    
                    	$sql_provinsi = mysqli_query($conn,"SELECT * FROM provinces ORDER BY name ASC");
					?>
                  	<select class="form-control" id="provinsi" name="provinsi" value="<?php echo $data['name'] ?>">
                    <option></option>
                    <?php                       
                        while($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)){ 
                           echo '<option value="'.$rs_provinsi['id'].'">'.$rs_provinsi['name'].'</option>';
                        }                        
                    ?>
                  	</select>
					<br>

                  	<select class="form-control" type="text" name="kota"  id="kota" value="<?php echo $data['name'] ?>">
                    <option></option>
                 	</select>
					<br>
                  
                    <select class="form-control" type="text" name="kecamatan" id="kecamatan"  value="<?php echo $data['id_kecamatan'] ?>">
                    <option></option>
                  	</select>
					<br>
       
                  	<select class="form-control" type="text" name="kelurahan" id="kelurahan"  value="<?php echo $data['id_desa'] ?>">
                    <option></option>
                  	</select>
					<br><br>
					<input class="text" type="text" id="alamat" name="alamat" placeholder="Silahkan isi alamat jalan, Gedung, No.rumah" required="">
					<input class="text email" type="password" id="password_user" name="password_user" placeholder="Password" required="">
                    <input type="submit" name="submit" value="submit" onclick="kirim()">
				</form>
				
			</div>
		</div>
		
	</div>
	<script>
		function kirim(){
 
			var email_user = document.getElementById('email_user').value;
			var name_user = document.getElementById('name_user').value;
			var no_user = document.getElementById('no_user').value;
			var password_user = document.getElementById('password_user').value;
			var provinsi = document.getElementById('provinsi').value;
			var alamat = document.getElementById('alamat').value;
			var date = document.getElementById('date').value;
			var validasiAngka = /^[0-9]+$/;
			

			if (email_user != "" && name_user!="" && no_user!="" &&  password_user!="" && provinsi!="" && alamat!="" && date!="" ) {
			return true;
			}else{
			alert('Anda harus mengisi data dengan lengkap !');
			}

			if ( email_user == ""){
			 return alert('email tidak boleh kosong');
			}

			if ( name_user == ""){
			 return alert('Nama tidak boleh kosong');
			}

            if ( date == "") {
				return alert('Tanggal Lahir tidak boleh kosong');
			}

			if ( password_user == "") {
				return alert('password tidak boleh kosong');
			}

			if ( provinsi == ""){
			 return alert('Alamat tidak boleh kosong');
			}

			if ( alamat == ""){
			 return alert('lengkapi Alamat Anda');
			}

			if (no_user.value.match(validasiAngka)) {
  			} else {
      		alert("Masukkan no Anda!\nFormat wajib angka!");
      		no_user.value="";
      		no_user.focus();
      		return false;
  			}
		}
			function cek_input(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				alert("input hanya boleh di isi angka!");
				return false;
			}
		}	
	</script> 
	
<!-- Menambahakan Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
			$(document).ready(function(){
			var date_input=$('input[name="date"]');
			var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
			date_input.datepicker({
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
			})

		})
</script>
</body>
</html>