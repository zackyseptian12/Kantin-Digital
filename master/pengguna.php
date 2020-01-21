<?php 
	include '../koneksi.php';
	error_reporting(0);
    if(isset($_POST['simpan'])) {
    	$pas =md5($_POST['password']);
    	$sql =mysqli_query($con, "INSERT INTO tb_pengguna VALUES('','$_POST[nama]','$_POST[jabatan]','$_POST[username]','$pas')");
    	if ($sql){
    		echo "<script>alert('Data Berhasil Disimpan');
    		document.location.href='?menu=pengguna';</script>";
    	}else{
    		echo "<script>alert('Data Gagal Disimpan');
    		document.location.href='?menu=pengguna';</script>";
    	}
    }

    if(isset($_GET['edit'])){
    	$sql = mysqli_query($con, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$_GET[id]'");
    	$isi = mysqli_fetch_array($sql);
    }
    if (isset($_GET['hapus'])){
    
    	$sql = mysqli_query($con, "DELETE FROM tb_pengguna WHERE id_pengguna = '$_GET[id]'");
    	$isi = mysqli_fetch_array($sql);
    	if ($sql){
    		echo "<script>alert('Data Berhasil Dihapus');
    		document.location.href='?menu=pengguna';</script>";
    	}else {
    		echo "<script>alert('Data Gagal Dihapus');
    		document.location.href='?menu=pengguna';</script>";
    	}
    }
    ?>

<html>
<head>
	<title></title>
</head>
<form method="post">
<body>
	<table>
		<tr>
			<td>Nama Pengguna</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $isi['nama_pengguna']?>"></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>
			    <select name="jabatan">
			    	<option value="" disabled selected>
			    		--- Pilihan Jabatan ---
			    	</option>
			    	<option value="admin">Admin</option>
			    	<option value="Manajer">Manejer</option>
			    	<option value="Kasir">Kasir</option>
			    </select>
			</td>
		</tr>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td><input type="text" name="username" value="<?php echo $isi['username']?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="text" name="password" value="<?php echo $isi['password']?>"></td>
		</tr>
		<tr>
			<td><input type="submit" name="simpan" value="SIMPAN"></td>
		</tr>
	</table>
	<table border="1">
		<tr>
			<td>NO.</td>
			<td>NamaPengguna</td>
			<td>Jabatan</td>
			<td>Username</td>
			<td>Password</td>
			<td colspan="2">Aksi</td>
		</tr>
		<?php
		    $no=0;
		    $sql=mysqli_query($con,"SELECT * FROM tb_pengguna " );
		    while ($r=mysqli_fetch_array($sql)) {
		     	$no++;?>
		     	
		     
		   
		    
		    <tr>
		    	<td><?php echo $no ; ?></td>
		    	<td><?php echo $r['nama_pengguna']; ?></td>
		    	<td><?php echo $r['level']; ?></td>
		    	<td><?php echo $r['username']; ?></td>
		    	<td><?php echo $r['password']; ?></td>
		    	<td><a href="?menu=pengguna&edit&id= <?php echo $r['id_pengguna'] ?> ">EDIT</a></td>
		        <td><a href="?menu=pengguna&hapus&id= <?php echo $r['id_pengguna'] ?>" onClick="return confirm('Anda Yakin')">HAPUS</a></td>
		    </tr>
		<?php } ?>
	</table>


</body>
</form>
</html>