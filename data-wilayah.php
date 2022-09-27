<?php
	include("koneksi.php");     
	switch ($_GET['jenis']) {
		//ambil data kota / kabupaten
		case 'kota':
		$id_provinces = $_POST['id_provinces'];
		if($id_provinces == ''){
		     exit;
		}else{
		     $getcity = mysqli_query($conn,"SELECT  * FROM regencies WHERE province_id ='$id_provinces' ORDER BY name ASC") or die ('Query Gagal');
		     while($data_kota = mysqli_fetch_array($getcity)){
		          echo '<option value="'.$data_kota['id'].'">'.$data_kota['name'].'</option>';
		     }
		     exit;    
		}
		break;

		//ambil data kecamatan
		case 'kecamatan':
		$id_regencies = $_POST['id_regencies'];
		if($id_regencies == ''){
		     exit;
		}else{
		     $getcity = mysqli_query($conn,"SELECT  * FROM districts WHERE regency_id ='$id_regencies' ORDER BY name ASC") or die ('Query Gagal');
		     while($data_kecamatan = mysqli_fetch_array($getcity)){
		          echo '<option value="'.$data_kecamatan['id'].'">'.$data_kecamatan['name'].'</option>';
		     }
		     exit;    
		}
		break;
		

		//ambil data kelurahan
		case 'kelurahan':
		$id_district = $_POST['id_district'];
		if($id_district == ''){
		     exit;
		}else{
		     $getcity = mysqli_query($conn,"SELECT  * FROM villages WHERE district_id ='$id_district' ORDER BY name ASC") or die ('Query Gagal');
		     while($data_kelurahan = mysqli_fetch_array($getcity)){
		          echo '<option value="'.$data_kelurahan['id'].'">'.$data_kelurahan['name'].'</option>';
		     }
		     exit;    
		}
		break;
		
	}
?>