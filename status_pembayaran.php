<?php
session_start();
include 'koneksi.php';
 //jika tombol simpan diklik
  if(isset($_POST['bsimpan']))
  {
      $masuk="INSERT INTO validasi (npm, pesan) VALUES
      ('$npm','$pesan')";
      $hasil=mysqli_query($masuk);
        if ($hasil) //jika simpan sukses
        {
          echo "<script>
                  alert ('Simpan data sukses !');
                  document.location='status_pembayaran.php';
                </script>";
        }
        else
        {
          echo "<script>
                  alert ('Simpan data gagal !');
                  document.location='status_pembayaran.php';
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



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Status pembayaran</title>
  </head>
  <body>
    <div class="container">

      <!--Awal Card Tabel-->
      <div class="card mt-3">
        <h2 class="card-heade alert-primary text-center text-black">STATUS PEMBAYARAN UKT MAHASISWA</h2>
        <div class="card-body">
            <table class="table table-bordered table-striped">
              <tr>
                  <th>No.</th>
                  <th>NPM</th>
                  <th>Keterangan</th>
              </tr>

              <?php
                    $no=1;
                    $tampil = mysqli_query($koneksi, "SELECT * from validasi order by npm asc");
                    while ($data = mysqli_fetch_array($tampil)) :
               ?>
              <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data["npm"]?></td>
                  <td><?=$data["pesan"]?></td>
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
