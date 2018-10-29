<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=Laporan Pinjaman-Short By Bulan.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?> 
<table border="1">
	<tr>
		<td>No</td>
		<td align="center" width="200">No. Karyawan</td>
		<td align="center"  width="200">Nama</td>
		<td align="center"  width="200">Tanggal Bergabung</td>
		<td align="center"  width="200">Jenis Kelamin</td>
		<td align="center"  width="200">Departement</td>
		<td align="center"  width="200">Telphone</td>
		<td align="center"  width="200">Jenis Pinjaman</td>
		<td align="center"  width="200">Jumlah Pinjaman</td>
	</tr>

	<?php if(empty($pinjaman)){ ?>
		<tr>
			<td colspan="8">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($pinjaman as $value){ $no++;?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $value->member_id;?></td>
				<td><?php echo $value->nama;?></td>
				<td><?php echo $value->tanggal;?></td>
				<td><?php echo $value->sex;?></td>
				<td><?php echo $value->dept;?></td>
				<td><?php echo $value->hp;?></td>
				<td><?php echo $value->jenis_pinjaman;?></td>
				<td><?php echo number_format($value->jmlpinjaman,2,',','.');?></td>
			</tr>
			<?php
		}
	}
	?>

</table>