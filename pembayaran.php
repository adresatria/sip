<?php
session_start();
include 'koneksi.php';
 //jika tombol simpan diklik
  if(isset($_POST['bsimpan']))
  {
    //pengujian apakah data akan diedit atau disimpan baru
    if($_GET['hal'] == "edit")
    {
      //data akan di edit
        $edit = mysqli_query($koneksi, "UPDATE pembayaran set
                                          nama_mhs = '$_POST[nama]',
                                          npm = '$_POST[npm]',
                                          tahun_masuk = '$_POST[masuk]',
                                          jurusan = '$_POST[jurusan]',
                                          semester = '$_POST[semester]',
                                          tanggal = '$_POST[tgl]',
                                          bukti = '$_POST[bukti]'
                                        WHERE npm = '$_GET[npm]'
                                          ");
        if ($edit) //jika simpan sukses
        {
          echo "<script>
                  alert ('Edit data sukses !');
                  document.location='pembayaran.php';
                </script>";
        }
        else
        {
          echo "<script>
                  alert ('Edit data gagal !');
                  document.location='pembayaran.php';
                </script>";
        }
    }
    else
    {
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
      $folder="bukti/$nama_foto";
      //Membuat Nofitikasi upload Foto atau Gambar
      if(!empty($lokasi_foto))
      {
      move_uploaded_file($lokasi_foto,$folder);
      }
      $masuk="INSERT INTO pembayaran (nama_mhs, npm, tahun_masuk, jurusan, semester, tanggal, bukti) VALUES
      ('$nama_mhs','$npm','$tahun_masuk','$jurusan','$semester','$tanggal','$nama_foto')";
      $hasil=mysqli_query($masuk);
        if ($hasil) //jika simpan sukses
        {
          echo "<script>
                  alert ('Simpan data sukses !');
                  document.location='pembayaran.php';
                </script>";
        }
        else
        {
          echo "<script>
                  alert ('Simpan data gagal !');
                  document.location='pembayaran.php';
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

    <title>Pembayaran</title>
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
  <br><br>
    <div class="container">



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>



<?php
  //Membuat Koneksi Database
 $koneksi = mysqli_connect("localhost","root","");
 $database = mysqli_select_db($koneksi, "ukt");



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

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>List Pembayaran</title>
  </head>
  <body>
    <div class="container">

      <!--Awal Card Tabel-->
      <div class="card mt-3">
        <h2 class="card-heade alert-primary text-center text-black">HISTORY DATA PEMBAYARAN</h2>
        <div class="card-body">
            <table class="table table-bordered table-striped">
              <tr>
                  <th>No.</th>
                  <th>Tanggal Pembayaran</th>
                  <th>NPM</th>
                  <th>Nama Mahaiswa</th>
                  <th>Tahun Masuk</th>
                  <th>Jurusan</th>
                  <th>Semester</th>
                  <th>Bukti Pembayaran</th>
                  <th>Aksi</th>
              </tr>

              <?php
                    $no=1;
                    $tampil = mysqli_query($koneksi, "SELECT * from pembayaran order by tanggal asc");
                    while ($data = mysqli_fetch_array($tampil)) :
               ?>
              <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data["tanggal"]?></td>
                  <td><?=$data["npm"]?></td>
                  <td><?=$data["nama_mhs"]?></td>
                  <td><?=$data["tahun_masuk"]?></td>
                  <td><?=$data["jurusan"]?></td>
                  <td><?=$data["semester"]?></td>
                   <?php
                   echo " <td><img src='bayar/".$data['bukti']."' width='150' height='100'></td>";
                   ?>

                   <td>
                   <a href="pesan.php?hal=edit&npm=<?=$data['npm']?>" class="btn btn-success" >Validasi</a>
                 </td>
            </tr>
              <?php endwhile; ?>

            </table>
        </div>
      </div>
    </div>
    <!--Akhir Card Tabel-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
