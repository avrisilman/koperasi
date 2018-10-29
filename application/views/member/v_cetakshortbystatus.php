<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=Laporan Member-Short By Bulan.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?> 
<table border="1">
	<tr>
		<td><b>No</b></td>
		<td><b>No. Karyawan</b></td>
		<td><b>Nama</b></td>
		<td><b>Tanggal Bergabung</b></td>
		<td><b>Jenis Kelamin</b></td>
		<td><b>Departement</b></td>
		<td><b>Telphone</b></td>
		<td><b>Aktif</b></td>
	</tr>

	<?php if(empty($anggota)){ ?>
		<tr>
			<td colspan="6">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($anggota as $value){ $no++;?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $value->member_id;?></td>
				<td><?php echo $value->nama;?></td>
				<td><?php echo $value->tglgabung;?></td>
				<td><?php echo $value->sex;?></td>
				<td><?php echo $value->dept;?></td>
				<td><?php echo $value->hp;?></td>
				<td><?php echo $value->aktif;?></td>
			</tr>
			<?php
		}
	}
	?>

</table>