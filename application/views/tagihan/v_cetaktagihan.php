<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=Laporan Tagihan.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?> 
<table border="1">
	<tr>
		<td><b>No</b></td>
		<td><b>Id Member</b></td>
		<td><b>Nama</b></td>
		<td><b>Dept</b></td>
		<td><b>Bulan Tagihan</b></td>
		<td><b>Simpanan Wajib</b></td>
		<td><b>Simpanan Sukarela</b></td>
		<td><b>Jenis Pinjaman</b></td>
		<td><b>Jumlah Tagihan</b></td>
		<td><b>Jumlah</b></td>
		<td><b>Status</b></td>
	</tr>

	<?php if(empty($tagihan)){ ?>
		<tr>
			<td colspan="8">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($tagihan as $value){ $no++;?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $value->member_id;?></td>
				<td><?php echo $value->nama;?></td>
				<td><?php echo $value->dept;?></td>
				<td><?php echo $value->tanggalangs;?></td>
				<td><?php echo number_format($value->simwajib,2,",",".");?></td>
				<td><?php echo number_format($value->simrela,2,",",".");?></td>
				<td><?php echo $value->jenis_pinjaman;?></td>
				<td><?php echo number_format(($value->angpinjam+$value->jasapinjam),2,",",".");?></td>
				<td><?php echo number_format(($value->simwajib+$value->simrela+$value->angpinjam+$value->jasapinjam),2,",",".");?></td>
				<td><?php echo $value->status;?></td>
			</tr>
			<?php
		}
	}
	?>

	<?php if(empty($sumtagihan)){ ?>
		<tr>
			<td colspan="8">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($sumtagihan as $value){ $no++;?>
			<tr>
				<td colspan="5" align="right"><b>Total</b></td>
				<td><b><?php echo number_format($value->sw,2,",",".");?></b></td>
				<td><b><?php echo number_format($value->sr,2,",",".");?></b></td>
				<td></td>
				<td><b><?php echo number_format(($value->angp+$value->jasa),2,",",".");?></b></td>
				<td><b><?php echo number_format(($value->sw+$value->sr+$value->angp+$value->jasa),2,",",".");?></b></td>
				<td></td>
			</tr>
			<?php
		}
	}
	?>

</table>