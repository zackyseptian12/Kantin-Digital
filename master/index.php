<?php 
     session_start();
     include '../koneksi.php';
     if(isset($_POST['login'])) {
     	$pass = md5($_POST['password']);
     	$sql = mysqli_query($con, "SELECT * FROM tb_pengguna WHERE username = '$_POST[username]'  && password = '$pass'");
     	$cek = mysqli_num_rows($sql);
     	$f = mysqli_fetch_array($sql);
     	$_SESSION['nama'] = $f['nama_pengguna'];
     	if($cek > 0){
     		if($f['level'] == "Manajer"){
     			echo "<script>alert( 'Selamat Datang');document.location.href= 'manajer.php';</script>";
     		}else if($f['level'] == "admin"){
     			echo"<script>alert('Selamat Datang');document.location.href= 'admin.php';</script>";
     		}else if($f['level'] == "Kasir"){
     			echo"<script>alert('Selamat Datang');document.location.href='kasir.php';</script>";
     		}else{
     			echo"<script>alert('Gagal Login');document.location.href='manajer.php';</script>";
     		}
     	}
     	else{
     			echo"<script>alert('Gagal Login');document.location.href='index.php';</script>";
     }
 }
 ?>

<html>
<head>
	<title>Kantin Digital | Master</title>
</head>
<form method="post">
<body>
	<center>
		<h1>Selamat Datang</h1>
          <table>
          	<tr>
          		<td>Username</td>
          		<td>:</td>
          		<td><input type="text" name="username"></td>
          	</tr>
          	<tr>
          		<td>Password</td>
          		<td>;</td>
          		<td><input type="password" name="password"></td>
          	</tr>
          	<tr>
          		<td><input type="submit" name="login" value = "login"></td>
          	</tr>
          </table>	
	</center>

</body>
</html>