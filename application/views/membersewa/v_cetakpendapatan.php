<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=Kwitansi-UANG SEWA.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?> 
<table border="1">
	<tr>
		<td colspan="9"><center><b><a style="font-size: 20px;">SLIP UANG MASUK SEWA</a></b></center></td>
	</tr>
	<tr>
		<td colspan="9"><center><b><a style="font-size: 16px;">KOPERASI KARYAWAN ANGGREK JAYA MULIA INTI PELANGI</a></b></center></td>
	</tr>
	
	<?php if(empty($pendapatan)){ ?>
		<tr>
			<td colspan="9">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($pendapatan as $value){ $no++;?>
			<tr>
				<td align="center" width="200">No. Sewa</td>
				<td align="center"  width="200">Nama</td>
				<td align="center"  width="200"><?php echo $value->nogl;?></td>
				<td align="center"  width="200">Pendapatan Listrik Dan Air</td>
				<td align="center"  width="200">Biaya Admin</td>
				<td align="center"  width="200">Iuran Sampah</td>
				<td align="center"  width="200">Denda</td>
				<td align="center"  width="200">Total</td>
				<td align="center"  width="200">Keterangan</td>
			</tr>
			<tr>
				<td height="70"><?php echo $value->no_sewa;?></td>
				<td><?php echo $value->nama;?></td>
				<td align="right"><?php echo number_format($value->jml_bayar,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->air,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->adm,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->sampah,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->denda,2,',','.');?></td>
				<td align="right"><?php echo number_format(($value->jml_bayar+$value->air+$value->adm+$value->sampah+$value->denda),2,',','.');?></td>
				<td><?php echo $value->ket;?></td>
			</tr>
			<tr>
				<td colspan="4"></td>
				<td colspan="5" align="right">Jakarta, <?php echo date('d F Y', strtotime($value->tanggal));?></td>
			</tr>
			<tr>
				<td colspan="4"><b>Bendahara Admin</b></td>
				<td colspan="5" align="right"><b>Disetor Oleh</b></td>
			</tr>
			<tr>
			
				<td colspan="4" height="120">(......................................)</td>
				<td colspan="5" align="right" height="120">(......................................)</td>
			</tr>
			<?php
		}
	}
	?>

</table>
