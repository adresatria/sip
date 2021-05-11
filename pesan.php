<?php
  //Membuat Koneksi Database
  $koneksi = mysqli_connect("localhost","root","");
  $database = mysqli_select_db($koneksi, "ukt");

//jika tombol simpan diklik
  if(isset($_POST['bsimpan']))
  {
    //pengujian apakah data akan diedit atau disimpan baru
    if($_GET['hal'] == "edit")

    {
      //data akan disimpan baru
        $simpan = mysqli_query($koneksi, "INSERT INTO validasi (npm, pesan)
                                          VALUES ('$_POST[npm]', '$_POST[pesan]')
                                          ");

        if ($simpan) //jika simpan sukses
        {
          echo "<script>
                  alert ('Simpan data sukses !');
                  document.location='pesan.php';
                </script>";
        }
        else
        {
          echo "<script>
                  alert ('Simpan data gagal !');
                  document.location='pesan.php';
                </script>";
        }
    }




  }


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Mahasiswa</title>
  </head>
  <body>
    <!--ini navbar-->
    	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    		<div class="container-fluid">
    			<a class="navbar-brand" href="welcome.html">SIP UKT</a>
    			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
    			</button>
    			<div class="collapse navbar-collapse" id="navbarCollapse">
    				<ul class="navbar-nav me-auto mb-2 mb-md-0">
    					<li class="nav-item">
    						<a class="nav-link" aria-current="page" href="welcome.html">Welcome</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link"  href="dtMhs.php">Mahasiswa</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link" href="pembayaran.php">Pembayaran</a>
    					</li>
    					<li class="nav-item">
    						<a class="nav-link" href="tambah_user.php">Pengguna</a>
    					</li>
    				</ul>
    				<form class="navbar-nav ml-auto">
    					<a href="../sip/logout.php" class="btn btn-outline-danger">Logout</a>
    				</form>
    			</div>
    		</div>
    	</nav>
      <br></br>


    <div class="container">
      <!--Awal Card Form-->
      <div class="card mt-3">
      <h2 class="alert-warning text-center text-black">FORM ISI PESAN</h2>
      <div class="card-body">
      <form method="post" action="">
        <div class="form-group">
          <label for="NamaMhs">NPM</label>
          <input type="text" name="npm" value="<?=@$vnpm?>" class="form-control" placeholder="Masukkan NPM Mahasiswa" id="npm" required>
        </div>
        <div class="form-group">
          <label for="NPM">Pesan</label>
          <input type="text" name="pesan" value="<?=@$vpesan?>" class="form-control" placeholder="Masukkan Pesan" id="pesan" required>
        </div>
        <button type="submit" class="btn btn-primary" name="bsimpan">SIMPAN</button>
        <button type="reset" class="btn btn-danger" name="breset">BATAL</button>
        <a href="welcome.html" class="btn btn-success">KEMBALI</a>
      </form>
      </div>
      </div>
    </div>
    <!--Akhir Card Form-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
