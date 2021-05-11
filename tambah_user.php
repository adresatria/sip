<?php
    $server ="localhost";
    $user ="root";
    $pass ="";
    $database ="ukt";

    $koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));


    //jika tombol simpan di klik
    if(isset($_POST['bsimpan']))
    {
        //Pengujian apakah data akan diedit atau disimpan baru
        if($_GET['hal'] == "edit")
        {
            //Data akan diedit
            $edit =mysqli_query($koneksi, "UPDATE user
                                         set username= '$_POST[tusername]',
                                             password= '$_POST[tpassword]',
                                             level = '$_POST[tlevel]'
                                         where username = '$_GET[username]'
                                        ");

            if($edit)
            {
                echo "<script>alert('Edit data SUKSES!');
                document.location = 'tambah_user.php';
                </script>";
            }
            else
            {
                echo "<script>alert('Edit data GAGAL!');
                document.location = 'tambah_user.php';
                </script>";
            }
        }else
        {
            //Data akan disimpan baru
            $simpan =mysqli_query($koneksi, "INSERT INTO user (username, password, level)
                                         VALUES ('$_POST[tusername]',
                                                 '$_POST[tpassword]',
                                                 '$_POST[tlevel]')
                                        ");

            if($simpan)
            {
                echo "<script>alert('Simpan data SUKSES!');
                document.location = 'tambah_user.php';
                </script>";
            }
            else
            {
                echo "<script>alert('Simpan data GAGAL!');
                document.location = 'tambah_user.php';
                </script>";
            }
        }



    }
    //Pengujian tombol hapus
    if (isset($_GET['hal']))
    {
        if($_GET['hal']=="edit")
        {
            $tampil =mysqli_query($koneksi, "SELECT * FROM user where username = '$_GET[username]' ");
            $data =mysqli_fetch_array($tampil);
            if($data)
            {
                $vusername = $data['username'];
                $vpassword = $data['password'];
            }
        }
        else if ($_GET['hal'] == "hapus")
        {
            //Persiapan hapus data
            $hapus =mysqli_query($koneksi, "DELETE FROM user where username = '$_GET[username]' ");
            if($hapus)
            {
                echo "<script>alert('Hapus data SUKSES!');
                document.location = 'tambah_user.php';
                </script>";
            }
        }
    }


?>
<!DOCTYPE html>
<html>
<head>
    <title>Pengguna</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
//ini navbar
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
						<a class="nav-link" href="dtMhs.php">Mahasiswa</a>
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

    <!--Awal Card Form -->
    <div class="card mt-3">
  <h2 class="card-heade alert-warning text-center">FORM DATA USER</h2>
  <div class="card-body">
    <form method="post" action="">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="tusername" value= "<?=@$vusername?>" class="form-control" placeholder=" " required="">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="tpassword" value= "<?=@$vpassword?>" class="form-control" placeholder=" " required="">
        </div>
        <div class="form-group">
            <label>Level</label>
            <select class="form-control" name="tlevel" value="<?=@$vlevel?>" required="">
                <option></option>
                <option>admin</option>
                <option>mahasiswa</option>
                </select>
        </div>



        <button type="submit" class="btn btn-primary" name="bsimpan">SIMPAN</button>
        <button type="reset" class="btn btn-danger" name="breset">BATAL</button>
        <a href="welcome.html" class="btn btn-success">KEMBALI</a>
    </form>
  </div>
    </div>
    <!-- Akhir Card Form -->

    <!--Awal Card Tabel -->
    <div class="card mt-3">
  <h2 class="card-heade alert-primary text-center">LIST DATA USER</h2>
  <div class="card-body">
    <table class="table table-bordered table-stripped">
        <tr>
        <th>No.</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Aksi</th>
        </tr>
        <?php
            $no =1;
            $tampil =mysqli_query($koneksi, "SELECT * FROM user order by username desc");
            while ($data = mysqli_fetch_array($tampil)) :

        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$data['username']?></td>
            <td><?=$data['password']?></td>
            <td><?=$data['level']?></td>
            <td>
                <a href="tambah_user.php?hal=edit&username=<?=$data['username']?>" class="btn btn-warning">Edit</a>
                <a href="tambah_user.php?hal=hapus&username=<?=$data['username']?>" onclick="return confirm('Apakah Yakin Ingin Menghapus Data Ini?')" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
    <?php endwhile; //penutup perulangan while ?>
    </table>
  </div>
    </div>
    <!-- Akhir Card Table -->
</div>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
