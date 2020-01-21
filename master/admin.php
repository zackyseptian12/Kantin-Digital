<?php
         session_start();
         include '../koneksi.php';
         ?>
<!DOCTYPE html>
<html>
<head>
	<title>Kantin Digital | Master</title>
</head>

   <body>
	    <h1>Selamat Datang <?php $_SESSION['nama'] ?></h1>
	    <ul>
		<li><a href="?menu=pengguna">Kelola Pengguna</a></li>
		<li><a href="?menu=menu">Kelola Menu</a></li>
		<li><a href="?menu=laporan">Laporan</a></li>
		<li><a href="index.php">Logout</a></li>
	    </ul>
	    <?php
	       switch (@$_GET['menu']) {
	       	case 'pengguna':
	       	include 'pengguna.php';
	       		# code...
	       		break;
	       	case 'menu':
	       	include 'menu.php';
	       		# code...
	       		break;
	       	case 'laporan':
	       	include 'laporan.php';
	       		# code...
	       		break;
	       	
	       	default:
	       	include 'pengguna.php';
	       		# code...
	       		break;
	       }
	       ?>
     </body>
</form>
</html>