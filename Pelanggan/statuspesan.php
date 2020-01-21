<table cellspacing="0" cellpadding="0" border="1">
<tr>
	<td colspan="7"><h2>Daftar Pesanan Anda</h2></td>
</tr>
<tr>
	<td>No</td>
	<td>No Meja</td>
	<td>ID Transaksi</td>
	<td>Nama Menu</td>
	<td>Harga</td>
	<td>Jumlah</td>
	<td>Total</td>
</tr>
<?php
		$no=0;
	$sql = mysqli_query($con, "SELECT * FROM qw_pesanan WHERE no_meja
		= '$_SESSION[noMeja]' ");
	while ($r=mysqli_fetch_array($sql)) {$no++;
?>
<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $r['no_meja'] ; ?></td>
	<td><?php echo $r['id_transaksi'];?></td>
	<td><?php echo $r['nama_menu'];?></td>
	<td><?php echo $r['harga'];?></td>
	<td><?php echo $r['jumlah'];?></td>
	<td><?php echo $r['jml'];?></td>
</tr>
<?php } ?>	

<?php 
	$ssq = mysqli_query($con, "SELECT SUM(jml) AS sub FROM qw_pesanan WHERE no_meja = '$_SESSION[noMeja]' ");
	$f = mysqli_fetch_array($ssq);
 ?>
 <tr>
 	
 	<td  colspan="7">Subtotal : <?php echo $f['sub'] ; ?></td>
 	
 </tr>
 </table>