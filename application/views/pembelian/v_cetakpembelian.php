<table border="1">
	<tr><td colspan="7"><b>Inventaris Kantor</b></td></tr>
	<tr>
		<td><b>Inventaris</b></td>
		<td><b>Jumlah</b></td>
		<td><b>Nominal</b></td>
		<td><b>Nilai Buku</b></td>
		<td><b>Manfaat</b></td>
		<td><b>Nilai Manfaat</b></td>
		<td><b>Perbulan</b></td>
	</tr>

	<?php if(empty($pembeliankantor)){ ?>
		<tr>
			<td colspan="7">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($pembeliankantor as $value){ $no++;?>
			<tr>
				<td><?php echo $value->inventaris;?></td>
				<td><?php echo $value->jml;?></td>
				<td><?php echo number_format($value->nominal,2,",",".");?></td>
				<td></td>
				<td><?php echo $value->manfaat;?></td>
				<td><?php echo $value->sisa_manfaat;?></td>
				<td><?php echo number_format(($value->nominal/$value->manfaat),2,",",".");?></td>
			</tr>
			<?php
		}
	}
	?>

</table>
<br/>
<table border="1">
	<tr><td colspan="7"><b>Inventaris Kantin</b></td></tr>
	<tr>
		<td><b>Inventaris</b></td>
		<td><b>Jumlah</b></td>
		<td><b>Nominal</b></td>
		<td><b>Nilai Buku</b></td>
		<td><b>Manfaat</b></td>
		<td><b>Nilai Manfaat</b></td>
		<td><b>Perbulan</b></td>
	</tr>

	<?php if(empty($pembeliankantin)){ ?>
		<tr>
			<td colspan="7">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($pembeliankantin as $value){ $no++;?>
			<tr>
				<td><?php echo $value->inventaris;?></td>
				<td><?php echo $value->jml;?></td>
				<td><?php echo number_format($value->nominal,2,",",".");?></td>
				<td></td>
				<td><?php echo $value->manfaat;?></td>
				<td><?php echo $value->sisa_manfaat;?></td>
				<td><?php echo number_format(($value->nominal/$value->manfaat),2,",",".");?></td>
			</tr>
			<?php
		}
	}
	?>

</table>