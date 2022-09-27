<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>Silahkan Melakukan Konfirmasi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/login.css" rel="stylesheet" type="text/css">

</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Konfirmasi Akun Anda</h1></h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post">
					<?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
					<input class="text email" type="email" name="email_user" placeholder="Masukan Email Anda" required="">
                    <input type="submit" name="check-email" value="submit">
				</form>
			</div>
		</div>
		
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>