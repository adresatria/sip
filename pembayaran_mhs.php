<?php
session_start();
include 'koneksi.php';
 //jika tombol simpan diklik
  if(isset($_POST['bsimpan']))
  {
    //pengujian apakah data akan diedit atau disimpan baru



      //data akan disimpan baru
      $nama_mhs=$_POST['nama_mhs'];
      $npm=$_POST['npm'];
      $tahun_masuk=$_POST['tahun_masuk'];
      $jurusan=$_POST['jurusan'];
      $semester=$_POST['semester'];
      $tanggal=$_POST['tanggal'];
      //Membuat Variabel untuk menyimpan Foto atau Gambar
      $lokasi_foto=$_FILES['bukti']['tmp_name'];
      $nama_foto=$_FILES['bukti']['name'];
      $tipe_foto=$_FILES['bukti']['type'];
      $folder="bayar/$nama_foto";
      //Membuat Nofitikasi upload Foto atau Gambar
      if(!empty($lokasi_foto))
      {
      move_uploaded_file($lokasi_foto,$folder);
      }
      $masuk="INSERT INTO pembayaran (npm, nama_mhs, tahun_masuk, jurusan, semester, tanggal, bukti) VALUES
      ('$npm','$nama_mhs','$tahun_masuk','$jurusan','$semester','$tanggal','$nama_foto')";

      mysqli_query($koneksi,$masuk);



        if ($masuk) //jika simpan sukses
        {
          echo "<script>
                  alert ('Simpan data sukses !');
                  document.location='pembayaran_mhs.php';
                </script>";
        }
        else
        {
          echo "<script>
                  alert ('Simpan data gagal !');
                  document.location='pembayaran_mhs.php';
                </script>";
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

    <title>Pembayaran</title>
  </head>
  <body>
    //ini navbar
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="welcome_mhs.html">SIP UKT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="welcome_mhs.html">Welcome</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pembayaran_mhs.php">Pembayaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="status_pembayaran.php">Status Pembayaran</a>
          </li>
        </ul>
        <form class="navbar-nav ml-auto">
          <a href="../sip/logout.php" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </form>
      </div>
    </div>
  </nav>
  <br><br>
    <div class="container">

      <!--Awal Card Form-->
      <div class="card mt-3">
      <h2 class="alert-warning text-center">FORM DATA PEMBAYARAN</h2>
      <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="NamaMhs">Nama Mahasiswa</label>
          <input type="text" name="nama_mhs" value="<?=@$vnama_mhs?>" class="form-control" placeholder="Masukkan Nama Lengkap Anda" id="NamaMhs" required="">
        </div>
        <div class="form-group">
          <label for="NPM">NPM</label>
          <input type="text" name="npm" value="<?=@$vnpm?>" class="form-control" placeholder="Masukkan NPM Anda" id="NPM" required="">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="ThnMsk">Tahun Masuk</label>
              <input type="text" name="tahun_masuk" value="<?=@$vtahun_masuk?>" class="form-control" placeholder="Masukkan Tahun Masuk Anda" id="ThnMsk" required="">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="Jurusan">Jurusan</label>
                <select class="form-control" name="jurusan" id="Jurusan" required="">
                <option value="<?=@$vjurusan?>"><?=@$vjurusan?></option>
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
          <label for="Semester">Semester</label>
                <select class="form-control" name="semester" id="Semester" required="">
                <option value="<?=@$vsemester?>"><?=@$vsemester?></option>
                <option>Semester 1</option>
                <option>Semester 2</option>
                <option>Semester 3</option>
                <option>Semester 4</option>
                <option>Semester 5</option>
                <option>Semester 6</option>
                <option>Semester 7</option>
                <option>Semester 8</option>
                </select>
        </div>
        <div class="form-group">
          <label for="TglPem">Tanggal Pembayaran</label>
          <input type="date" name="tanggal" value="<?=@$vtanggal?>" class="form-control" id="TglPem" required="">
        </div>
        <div class="form-group">
          <label for="Bukti">Bukti Pembayaran</label>
          <input type="file" name="bukti" value="<?=@$vbukti?>" class="form-control-file" id="Bukti" required="">
        </div>
        <button type="submit"  class="btn btn-primary" name="bsimpan">SIMPAN</button>
        <button type="reset" class="btn btn-danger" name="breset">BATAL</button>
        <a href="welcome_mhs.html" class="btn btn-success">KEMBALI</a>
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



<?php
  //Membuat Koneksi Databse
 $koneksi = mysqli_connect("localhost","root","");
 $database = mysqli_select_db($koneksi, "ukt2");



//pengujian jika tombol edit atau hapus diklik
  if (isset($_GET['hal']))
  {
    //pengujian jika edit data
    if($_GET['hal'] == "edit")
    {
      //tampilkan data yang akan di edit
      $tampil = mysqli_query($koneksi, "SELECT * from pembayaran WHERE npm = '$_GET[npm]' ");
      $data = mysqli_fetch_array($tampil);
      if($data)
      {
        //jika data ditemukan, maka data ditampung ke dalam variabel
        $vnama_mhs = $data['nama_mhs'];
        $vnpm = $data['npm'];
        $vtahun_masuk = $data['tahun_masuk'];
        $vjurusan = $data['jurusan'];
        $vsemester = $data['semester'];
        $vtanggal = $data['tanggal'];
        $vbukti = $data['bukti']['type'];
      }
    }
    else if($_GET['hal'] == "hapus")
    {
      //persiapan hapus data
      $hapus = mysqli_query($koneksi, "DELETE FROM pembayaran WHERE npm = '$_GET[npm]'");
      if($hapus)
      {
        echo "<script>
                  alert ('Hapus data sukses !');
                  document.location='pembayaran.php';
                </script>";
      }
    }
  }

 ?>
