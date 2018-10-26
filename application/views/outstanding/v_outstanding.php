
<?php
$tanggal = date('Y-m-d');
$sub_tanggal = substr($tanggal,8);
?>

<?php
if ($sub_tanggal == '26') {
	echo "1";
}else{
	echo "kosong";
}
?>