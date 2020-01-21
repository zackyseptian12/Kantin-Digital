<?php

   if(isset($_POST['simpan'])){
   	$name = $_FILES['foto']['name'];
   	$file = $_FILES['foto']['tmp_name'];
   	move_uploaded_file($file, '../image/'.$name);

   	$sql=mysqli_query($con, "INSERT INTO tb_menu VALUES ('','$_POST[namaMenu]','$_POST[jenis]','$_POST[harga]','$name','$_POST[stok]') ");
   	
   		 if ($sql){
    		echo "<script>alert('Data Berhasil Disimpan');
    		document.location.href='?menu=menu';</script>";
   	}else{
   		 
    		echo "<script>alert('Data Gagal Disimpan');
    		document.location.href='?menu=menu';</script>";
   	}
   }
   if(isset($_GET['hapus'])){
   	$sql =mysqli_query($con,"DELETE FROM tb_menu
   		 WHERE id_menu= '$_GET[id]'");
   	if($sql){
   		
    		echo "<script>alert('Data Berhasil Dihapus');
    		document.location.href='?menu=menu';</script>";
   	}else{
   		 
    		echo "<script>alert('Data Gagal Dihapus');
    		document.location.href='?menu=pengguna';</script>";
   	}
   }
   ?>


<html>
<head></head>
<form method="post" enctype="multipart/form-data">
	<body>
		<table>
			<tr>
				<td>Nama Menu</td>
				<td>:</td>
				<td><input type="text" name="namaMenu"></td>

			</tr>
			<tr>
				<td>Jeni</td>
                <td>:</td>
                <td>
                	<select name="jenis">
                		<option value="" disabled selected>--Pilih Jenis--</option>
                		<option value="Makanan">Makanan</option>
                		<option value="Minuman">Minuman</option>
                	</select>
                </td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td><input type="number" name="harga"></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td>:</td>
				<td><input type="file" name="foto"></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td>:</td>
				<td><input type="number" name="stok"></td>
			</tr>
			<tr>
				<td><input type="submit" name="simpan" value="SIMPAN"></td>
			</tr>
		</table>
        <table border="1">
        	<tr>
        		<td>NO.</td>
        		<td>Nama Menu</td>
			    <td>Jenis</td>
			    <td>Harga</td>
			    <td>Foto</td>
			    <td>Stok</td>
			    <td>Aksi</td>
        	</tr>
        	<?php
        	   $no=0;
        	   $sql = mysqli_query($con,"SELECT * FROM tb_menu");
        	   while($r=mysqli_fetch_array($sql)) {
        	   	$no++; 
        	 ?>
        	     
		    <tr>
		    	<td><?php echo $no ; ?></td>
		    	<td><?php echo $r['nama_menu']; ?></td>
		    	<td><?php echo $r['jenis']; ?></td>
		    	<td><?php echo $r['harga']; ?></td>
		    	<td><img src="../image/<?php echo $r['foto'] ?>" width="100px"></td>
		    	<td><?php echo $r['stok'];?></td>
		    	<td><a href="?menu=menu&hapus&id=<?php echo $r['id_menu'] ?>" onClick ="return confirm('Anda Yakin')">Hapus</a></td>

             </tr>
             <?php }?>
        </table>
</body>
</form>
</html>