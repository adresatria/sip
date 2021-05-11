<!DOCTYPE html>
<html>
<head>
	<title>Login - SIP UKT</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

		<?php
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
				echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
			}
		}
		?>
</head>
<body>

	<main class="kotak_login">
		<div  class="text-center">
		<img class="mb-4" src="logo/logo.png" alt="" width="70" height="55">
	</div>
		<h2 class="tulisan_login">Silahkan login</h2>

		<form action="cek_login.php" method="post">
			<label><i class="fas fa-user"></i> Username</label>
			<input type="text" name="username" class="form_login" placeholder="Masukkan Username Anda" required="required">

			<label><i class="fas fa-lock"></i> Password</label>
			<input type="password" name="password" class="form_login" placeholder="Masukkan Password Anda" required="required">

			<input type="submit" class="tombol_login" value="LOGIN">
			<br></br>
			<center>
			<a href="index.php" class="btn btn-danger">KEMBALI</a>
		</center>
			<center>
				<br>
				<p>Developed by Kelompok 1 <i class="far fa-grin-hearts"></i></p>
			</center>
		</form>

	</main>
</body>
</html>
