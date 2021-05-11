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
      //data akan di edit
        $edit = mysqli_query($koneksi, "UPDATE mahasiswa set
                                          nama_mhs = '$_POST[nama_mhs]',
                                          npm = '$_POST[npm]',
                                          jenis_kelamin = '$_POST[jenis_kelamin]',
                                          tahun_masuk = '$_POST[tahun_masuk]',
                                          jurusan = '$_POST[jurusan]',
                                          jml_ukt = '$_POST[jml_ukt]'
                                        WHERE npm = '$_GET[npm]'
                                          ");
        if ($edit) //jika simpan sukses
        {
          echo "<script>
                  alert ('Edit data sukses !');
                  document.location='dtMhs.php';
                </script>";
        }
        else
        {
          echo "<script>
                  alert ('Edit data gagal !');
                  document.location='dtMhs.php';
                </script>";
        }
    }
    else
    {
      //data akan disimpan baru
        $simpan = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama_mhs, npm, jenis_kelamin, tahun_masuk, jurusan, jml_ukt)
                                          VALUES ('$_POST[nama_mhs]', '$_POST[npm]', '$_POST[jenis_kelamin]', '$_POST[tahun_masuk]', '$_POST[jurusan]', '$_POST[jml_ukt]')
                                          ");

        if ($simpan) //jika simpan sukses
        {
          echo "<script>
                  alert ('Simpan data sukses !');
                  document.location='dtMhs.php';
                </script>";
        }
        else
        {
          echo "<script>
                  alert ('Simpan data gagal !');
                  document.location='dtMhs.php';
                </script>";
        }
    }




  }

  //pengujian jika tombol edit atau hapus diklik
  if (isset($_GET['hal']))
  {
    //pengujian jika edit data
    if($_GET['hal'] == "edit")
    {
      //tampilkan data yang akan di edit
      $tampil = mysqli_query($koneksi, "SELECT * from mahasiswa WHERE npm = '$_GET[npm]' ");
      $data = mysqli_fetch_array($tampil);
      if($data)
      {
        //jika data ditemukan, maka data ditampung ke dalam variabel
        $vnama_mhs = $data['nama_mhs'];
        $vnpm = $data['npm'];
        $vjenis_kelamin = $data['jenis_kelamin'];
        $vtahun_masuk = $data['tahun_masuk'];
        $vjurusan = $data['jurusan'];
        $vjml_ukt = $data['jml_ukt'];
      }
    }
    else if($_GET['hal'] == "hapus")
    {
      //persiapan hapus data
      $hapus = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE npm = '$_GET[npm]'");
      if($hapus)
      {
        echo "<script>
                  alert ('Hapus data sukses !');
                  document.location='dtMhs.php';
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
    						<a class="nav-link"  href="#">Mahasiswa</a>
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
      <h2 class="alert-warning text-center text-black">FORM DATA MAHASISWA</h2>
      <div class="card-body">
      <form method="post" action="">
        <div class="form-group">
          <label for="NamaMhs">Nama Mahasiswa</label>
          <input type="text" name="nama_mhs" value="<?=@$vnama_mhs?>" class="form-control" placeholder="Masukkan Nama Lengkap Mahasiswa" id="NamaMhs" required>
        </div>
        <div class="form-group">
          <label for="NPM">NPM</label>
          <input type="text" name="npm" value="<?=@$vnpm?>" class="form-control" placeholder="Masukkan NPM Mahasiswa" id="NPM" required>
        </div>
        <div class="form-group">
          <label for="JK">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin" id="JK" required="">
            <option value="<?=@$vjenis_kelamin?>"></option>
            <option>Perempuan</option>
            <option>Laki-laki</option>
            </select>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="ThnMsk">Tahun Masuk</label>
              <input type="text" name="tahun_masuk" value="<?=@$vtahun_masuk?>" class="form-control" placeholder="Masukkan Tahun Masuk Mahasiswa" id="ThnMsk" required="">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="Jurusan">Jurusan</label>
                <select class="form-control" name="jurusan" value="<?=@$vjurusan?>" id="Jurusan" required="">
                <option></option>
                <option>Teknik Informatika</option>
                <option>Teknik Elektronika</option>
                <option>Teknik Mesin</option>
                <option>Teknik Pengendalian Pencemaran Lingkungan</option>
                <option>Teknik Pengembangan Produk Agroindustri</option>
                </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="JmlUKT">Nominal UKT</label>
          <input type="text" name="jml_ukt" value="<?=@$vjml_ukt?>" class="form-control" placeholder="Masukkan Jumlah UKT Mahasiswa" id="JmlUKT" required="">
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

  <div class="container">

  <!--Awal Card Tabel-->
      <div class="card mt-3">
        <h2 class="card-header alert-primary text-center text-black">LIST DATA MAHASISWA</h2>
      <div class="card-body">

        <table class="table table-bordered table-striped">
          <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>NPM</th>
            <th>Jenis Kelamin</th>
            <th>Tahun Masuk</th>
            <th>Jurusan</th>
            <th>Nominal UKT</th>
            <th>Aksi</th>
          </tr>

          <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * from mahasiswa order by npm asc");
            while ($data = mysqli_fetch_array($tampil)):
          ?>
          <tr>
            <td><?=$no++ ?></td>
            <td><?=$data['nama_mhs']?></td>
            <td><?=$data['npm']?></td>
            <td><?=$data['jenis_kelamin']?></td>
            <td><?=$data['tahun_masuk']?></td>
            <td><?=$data['jurusan']?></td>
            <td><?=$data['jml_ukt']?></td>
            <td>
             <a href="dtMhs.php?hal=edit&npm=<?=$data['npm']?>" class="btn btn-warning">Edit</a>
             <a href="dtMhs.php?hal=hapus&npm=<?=$data['npm']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini ?')" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        <?php endwhile; //penutup perulangan while ?>
        </table>
    </div>
  </div>


  <!--Akhir Card Tabel-->
