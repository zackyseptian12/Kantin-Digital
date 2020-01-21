<?php
         session_start();
         include '../koneksi.php';
         ?>
<!DOCTYPE html>
<html>
<head>
	<title>Kantin Digital | Master</title>
</head>
<form method="post" >
   <body>
	    <h1>Selamat Datang <?php $_SESSION['nama'] ?></h1>
	    <ul>
		<li><a href="?menu=pesanan">Pesanan</a></li>
		<li><a href="?menu=Pembayaran">Pembayaran</a></li>
		
		<li><a href="index.php">Logout</a></li>
	    </ul>
	    <?php
	       switch (@$_GET['menu']) {
	       	case 'pesanan':
	       	include '../pelanggan/statuspesan.php';
	       		# code...
	       		break;
	       	case 'Pembayaran':
	       	include 'Pembayaran.php';
	       		# code...
	       		break;
	       	case 'logout':
	       	include 'logout.php';
	       		# code...
	       		break;
	       	
	       	default:
	       	include '../pelanggan/statuspesan.php';
	       		# code...
	       		break;
	       }
	       ?>
     </body>
</form>
</html>