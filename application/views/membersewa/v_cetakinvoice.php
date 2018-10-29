<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=Kwitansi-Invoice.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?> 
<b>Kwitansi Invoice Penerimaan</b>
<table border="1">
	<?php if(empty($invoice)){ ?>
		<tr>
			<td colspan="8">Data Kosong</td>
		</tr>
	<?php }else{
		$no=0;
		foreach($invoice as $value){ $no++;?>
			<tr>
				<td><b>No. Invoice</b></td><td><?php echo $value->no_invoice;?></td>
			</tr>
			<tr>
				<td><b>Nama</b></td><td><?php echo $value->nama;?></td>
			</tr>
			<tr>
				<td><b>No. GL</b></td><td><?php echo $value->nogl;?></td>
			</tr>
			<tr>
				<td><b>Nilai</b></td><td><?php echo number_format($value->nilai,2,",",".");?></td>
			</tr>
			<tr>
				<td><b>Tanggal invoice</b></td><td><?php echo date('d F Y', strtotime($value->tglinvoice));?></td>
			</tr>
			<?php
		}
	}
	?>

</table>