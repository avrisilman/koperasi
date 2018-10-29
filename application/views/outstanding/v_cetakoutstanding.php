<?php
$tanggal = date('Y-m-d');
$sub_tanggal = substr($tanggal,8);
?>

<!-- <?php
if ($sub_tanggal == '26') {
	echo "1";
}else{
	echo "kosong";
}
?> -->
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
		<td><b>Angsuran Pinjaman</b></td>
		<td><b>Jasa Pinjaman</b></td>
		<td><b>Jumlah Tagihan</b></td>
		<!-- <td><b>Jumlah</b></td> -->
		<td><b>Status</b></td>
	</tr>

	<?php if($sub_tanggal != '29'){ ?>
		<tr>
			<td colspan="8">Data Kosong</td>
		</tr>
	<?php }else if($sub_tanggal == '29'){
		$no=0;
		foreach($outstanding as $value){ $no++;?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $value->member_id;?></td>
				<td><?php echo $value->nama;?></td>
				<td><?php echo $value->dept;?></td>
				<td><?php echo $value->tanggalangs;?></td>
				<td><?php echo number_format($value->simwajib,2,",",".");?></td>
				<td><?php echo number_format($value->simrela,2,",",".");?></td>
				<td><?php echo $value->jenis_pinjaman;?></td>
				<td><?php echo number_format(($value->jmlpinjaman/$value->tenor),2,',','.');?></td>
				<td><?php echo number_format((($value->jmlpinjaman)/100)*$value->bunga,2,',','.');?></td>
				<td><?php echo number_format(($value->jmlpinjaman/$value->tenor)+((($value->jmlpinjaman)/100)*$value->bunga),2,",",".");?></td>
				<!-- <td><?php echo number_format(($value->simwajib+$value->simrela+$value->angpinjam+$value->jasapinjam),2,",",".");?></td> -->
				<td><?php echo $value->status;?></td>
			</tr>
			<?php
		}
	}
	?>

	
</table>