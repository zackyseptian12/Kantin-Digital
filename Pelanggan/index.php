<?php
  session_start();
  include '../koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Kantin Digital | Pelanggan</title>
</head>
<form method="post">
    <center>
      <h1><?php echo "Selamat Datang Meja No ".$_SESSION['noMeja'];?></h1>
    </center>
    <ul>
      <li><a href="?menu=pesan">Pesan</a></li>
      <li><a href="?menu=statusPesan">Status Pesan</a></li>
    </ul>
    <?php 
      switch (@$_GET['menu']) {
        case 'pesan':
          include 'pesan.php';
          break;
        case 'statusPesan':
          include 'statuspesan.php';
          break;
        default:
          include 'pesan.php';
          break;
      }
     ?>
</form>
</html>