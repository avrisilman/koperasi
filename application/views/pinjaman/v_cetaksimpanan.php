<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=Laporan SLIP-UANG MASUK.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?> 
<table border="1">
	<tr>
		<td colspan="12"><center><b><a style="font-size: 20px;">SLIP UANG MASUK</a></b></center></td>
	</tr>
	<tr>
		<td colspan="12"><center><b><a style="font-size: 16px;">KOPERASI KARYAWAN ANGGREK JAYA MULIA INTI PELANGI</a></b></center></td>
	</tr>
	<tr>
		<td align="center" width="200">Nama</td>
		<td align="center"  width="200">Departement</td>
		<td align="center"  width="200">Simpanan Pokok</td>
		<td align="center"  width="200">Simpanan Wajib</td>
		<td align="center"  width="200">Simpanan Sukarela</td>
		<td align="center"  width="200">Angsuran Pinjaman</td>
		<td align="center"  width="200">Jasa Pinjaman</td>
		<td align="center"  width="200">Denda</td>
		<td align="center"  width="200">Lain-lain</td>
		<td align="center"  width="200">Angsuran Ke</td>
		<td align="center"  width="200">Jumlah</td>
		<td align="center"  width="200">Keterangan</td>
	</tr>

	<?php if(empty($simpanan)){ ?>
		<tr>
			<td colspan="8">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($simpanan as $value){ $no++;?>
			<tr>
				<td height="70"><?php echo $value->nama;?></td>
				<td><?php echo $value->dept;?></td>
				<td align="right"><?php echo number_format($value->simpokok,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->simwajib,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->simrela,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->angpinjam,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->jasapinjam,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->denda,2,',','.');?></td>
				<td align="right"><?php echo number_format($value->lain,2,',','.');?></td>
				<td></td>
				<td align="right"><?php echo number_format($value->total,2,',','.');?></td>
				<td><?php echo $value->ket;?></td>
			</tr>
			<tr>
				<td colspan="6"></td>
				<td colspan="6" align="right">Jakarta, <?php echo date('d F Y', strtotime($value->tanggalangs));?></td>
			</tr>
			<tr>
				<td colspan="6"><b>Bendahara Admin</b></td>
				<td colspan="6" align="right"><b>Disetor Oleh</b></td>
			</tr>
			<tr>
			
				<td colspan="6" height="120">(......................................)</td>
				<td colspan="6" align="right" height="120">(......................................)</td>
			</tr>
			<?php
		}
	}
	?>

</table>
