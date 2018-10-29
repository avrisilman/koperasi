<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=Kwitansi-PENGELUARAN.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?> 
<table border="1">
	<tr>
		<td colspan="3"><center><b><a style="font-size: 20px;">SLIP PENGELUARAN</a></b></center></td>
	</tr>
	<tr>
		<td colspan="3"><center><b><a style="font-size: 16px;">KOPERASI KARYAWAN ANGGREK JAYA MULIA INTI PELANGI</a></b></center></td>
	</tr>
	
	<?php if(empty($pengeluaran)){ ?>
		<tr>
			<td colspan="3">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($pengeluaran as $value){ $no++;?>
			<tr>
				<td align="center" width="200">Tanggal</td>
				<td align="center"  width="200"><?php echo $value->nogl;?></td>
				<td align="center"  width="200">Keterangan</td>
			</tr>
			<tr>
				<td height="70"><?php echo date('d F Y', strtotime($value->tanggal));?></td>
				<td align="right"><?php echo number_format($value->jml_bayar,2,",",".");?></td>
				<td><?php echo $value->ket;?></td>
			</tr>
			<tr>
				<td colspan="1"></td>
				<td colspan="2" align="right">Jakarta, <?php echo date('d F Y', strtotime($value->tanggal));?></td>
			</tr>
			<tr>
				<td colspan="1"><b>Bendahara Admin</b></td>
				<td colspan="2" align="right"><b>Disetor Oleh</b></td>
			</tr>
			<tr>
			
				<td colspan="1" height="120">(......................................)</td>
				<td colspan="2" align="right" height="120">(......................................)</td>
			</tr>
			<?php
		}
	}
	?>

</table>
