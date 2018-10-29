<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=Laporan SLIP-UANG KELUAR.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?> 
<table border="1">
	<tr>
		<td colspan="9"><center><b><a style="font-size: 20px;">SLIP UANG KELUAR</a></b></center></td>
	</tr>
	<tr>
		<td colspan="9"><center><b><a style="font-size: 16px;">KOPERASI KARYAWAN ANGGREK JAYA MULIA INTI PELANGI</a></b></center></td>
	</tr>
	<tr>
		<td align="center" width="200">No. Karyawan</td>
		<td align="center"  width="200">Nama</td>
		<td align="center"  width="200">Simpanan Pokok</td>
		<td align="center"  width="200">Simpanan Wajib</td>
		<td align="center"  width="200">Simpanan Sukarela</td>
		<td align="center"  width="200">Dana Sosial</td>
		<td align="center"  width="200">Jasa Pinjaman</td>
		<td align="center"  width="200">Lain-lain</td>
		<td align="center"  width="200">Jumlah</td>
	</tr>

	<?php if(empty($pengeluaran)){ ?>
		<tr>
			<td colspan="8">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($pengeluaran as $value){ $no++;?>
			<tr>
				<td height="70"><?php echo $value->member_id;?></td>
				<td><?php echo $value->nama;?></td>
				<td align="right"><?php echo number_format($value->simpokok,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->simwajib,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->simrela,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->danasosial,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->jasapinjam,2,",",".");?></td>
				<td align="right"><?php echo number_format($value->lain,2,',','.');?></td>
				<td align="right"><?php echo number_format($value->total,2,',','.');?></td>
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
