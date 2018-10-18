<?php
foreach($neraca as $value){
$kas 					= $value->kas;
$bca 					= $value->bca; 
$niaga 					= $value->niaga;
$sumusipa 				= $value->sumusipa;
$sumangsuran 			= $value->sumangsuran;
$taktagih 				= $value->taktagih;
$air 					= $value->air;
$elektronik 			= $value->elektronik;
$motor 					= $value->motor;
$kpr 					= $value->kpr;
$shu 					= $value->shu;
$piutangusipa 			= $value->piutangusipa;
$pendapatanairlistrik 	= $value->pendapatanairlistrik;
$ayatbca				= $value->ayatbca;
$kantin 				= $value->kantin;
$simpokok 				= $value->simpokok;
$simwajib 				= $value->simwajib;
$simrela 				= $value->simrela;
$byrlistrik 			= $value->byrlistrik;
$byrair 				= $value->byrair;
$byrtlp 				= $value->byrtlp;
$danasosial 			= $value->danasosial;
$kantinluar 			= $value->kantinluar;
$kantinp3 				= $value->kantinp3;
$gaji 					= $value->gaji;
$pengurus 				= $value->pengurus;
$thr 					= $value->thr;
$staff 					= $value->staff;
$meal 					= $value->meal;
$cbn 					= $value->cbn;
$bungabankbca 			= $value->bungabankbca;
$lain 					= $value->lain;
$adminbca 				= $value->adminbca;
$pajakbungabca 			= $value->pajakbungabca;
$biayamateraibca 		= $value->biayamateraibca;
$kop 					= $value->kop;
$dendakantin 			= $value->dendakantin;
$deposit 				= $value->deposit;
$bingkisan 				= $value->bingkisan;
$ayatniaga 				= $value->ayatniaga;
$bungabankniaga 		= $value->bungabankniaga;
$adminniaga 			= $value->adminniaga;
$pajakniaga 			= $value->pajakniaga;
$materainiaga 			= $value->materainiaga;
$persediaan  			= $value->persediaan;
$ayat 					= $value->ayat;
$perolehankantor 		= $value->perolehankantor;
$invkantor 				= $value->invkantor;
$invkantor2 			= $value->invkantor2;
$akuminvkantor 			= $value->akuminvkantor;
$perolehankantin 		= $value->perolehankantin;
$invkantin 				= $value->invkantin;
$invkantin2 			= $value->invkantin2;
$akuminvkantin 			= $value->akuminvkantin;
$hutangpajak 			= $value->hutangpajak;
$byrlistrik 			= $value->byrlistrik;
$byrair 				= $value->byrair;
$byrauditor 			= $value->byrauditor;
$byrtlp 				= $value->byrtlp;
$dapen 					= $value->dapen;
$dapengem 				= $value->dapengem;
$dkp 					= $value->dkp;
$dapengurus 			= $value->dapengurus;
$dashu 					= $value->dashu;
$danasosial 			= $value->danasosial;
$danacadangan 			= $value->danacadangan;
$danaanggota 			= $value->danaanggota;
$costofsales 			= $value->costofsales;
$kantinluar 			= $value->kantinluar;
$kantinp3 				= $value->kantinp3;
$helm 					= $value->helm;
$pinjaman 				= $value->pinjaman;
$elektronik 			= $value->elektronik;
$motor     				= $value->motor;
$kpr 					= $value->kpr;
$expenses 				= $value->expenses;
$audit 					= $value->audit;
$outing 				= $value->outing;
$marketing 				= $value->marketing;
$bingkisan 				= $value->bingkisan;
$disk 					= $value->disk;
$biayadisk 				= $value->biayadisk;
$retur 					= $value->retur;
$iuran 					= $value->iuran;
$bpjs 					= $value->bpjs;
$dapur 					= $value->dapur;
$fotocopi 				= $value->fotocopi;
$ijin 					= $value->ijin;
$kebersihan 			= $value->kebersihan;
$kop 					= $value->kop;
$atk 					= $value->atk;
$empl 					= $value->empl;
$gaji 					= $value->gaji;
$pengurus 				= $value->pengurus;
$thr 					= $value->thr;
$staff 					= $value->staff;
$meal 					= $value->meal;
$overtime 				= $value->overtime;
$pos 					= $value->pos;
$sewa 					= $value->sewa;
$penyusutan 			= $value->penyusutan;
$tlp 					= $value->tlp;
$dinas 					= $value->dinas;
$service 				= $value->service;
$cbn 					= $value->cbn;
$listrik 				= $value->listrik;
$air 					= $value->air;
$income 				= $value->income;
$bungabankbcaniaga 		= $value->bungabankbcaniaga;
$lain 					= $value->lain;
$other 					= $value->other;
$admin 					= $value->admin;
$pajak 					= $value->pajak;
$pembulatansaldo 		= $value->pembulatansaldo;
$kantinluarshu			= $value->kantinluarshu;
$kantinp3shu 			= $value->kantinp3shu;
$cucihelmshu 			= $value->cucihelmshu;
$usipashu 				= $value->usipashu;
$sampahshu 				= $value->sampahshu;
$dendakantinshu 		= $value->dendakantinshu;
$elektronikshu 			= $value->elektronikshu;
$motorshu 				= $value->motorshu;
$listrikairshu 			= $value->listrikairshu;
$kantinluarpendapatan	= $value->kantinluarpendapatan;
$kantinp3pendapatan		= $value->kantinp3pendapatan;
$cucihelmpendapatan		= $value->cucihelmpendapatan;
$sampahpendapatan		= $value->sampahpendapatan;
$dendakantin 			= $value->dendakantin; 
$elektronikpendapatan 	= $value->elektronikpendapatan; 
$motorpendapatan 		= $value->motorpendapatan;
$dendapendapatan		= $value->dendapendapatan;

$totbankbca 			= ($sumusipa-$sumangsuran)+($taktagih+$air+$elektronik+$motor+$kpr+$piutangusipa+$elektronikpendapatan+
						  $motorpendapatan+$pendapatanairlistrik+$ayatbca+$perolehankantor+$perolehankantin+
						  $simpokok+$simwajib+$simrela+$byrlistrik+$byrair+$byrtlp+$danasosial+$kantinluar+
						  $kantinp3+$gaji+$pengurus+$thr+$staff+$meal+$cbn+$bungabankbca+$lain+$adminbca+
						  $pajakbungabca+$biayamateraibca+$kop+$kas);

$totbankniaga			= $kantinluarpendapatan+$kantinp3pendapatan+$cucihelmpendapatan+
						  $sampahpendapatan+$dendapendapatan+$deposit+$bingkisan+
						  $ayatniaga+$bungabankniaga+$adminniaga+$pajakniaga+$materainiaga;

$totpiutang	 			= ($sumusipa-$sumangsuran)+($taktagih+$air+$elektronik+$motor+$kpr);

$totasetlancar			= $kas+$bca+$niaga+($sumusipa-$sumangsuran)+$taktagih+$air+$elektronik+$motor+$kpr+$shu;

$totasettetap 			= (($perolehankantor+$invkantor)-($akuminvkantor-$invkantor2))+
						  (($perolehankantin+$invkantin)-($akuminvkantin-$invkantin2));

$totassets				= $kas+$bca+$niaga+$sumusipa+$sumangsuran+$taktagih+$air+$elektronik+
						  $motor+$kpr+$shu+$persediaan+$ayat+$totasettetap;

$totmodaldana			= $dapen+$dapengem+$dkp+$dapengurus+$dashu+$danasosial;

$totshuditahan			= (($kantinluarshu+$kantinp3shu+$cucihelmshu+$usipashu+$sampahshu+
						  $dendakantinshu+$elektronikshu+$motorshu+$listrikairshu)/100)*1.1;

$totshuberjalan			= (((($kantinluarshu+$kantinp3shu+$cucihelmshu+$usipashu+$sampahshu+
						  $dendakantinshu+$elektronikshu+$motorshu+$listrikairshu)-($kantinluar+$kantinp3+$helm+$pinjaman+$elektronik+$motor+$kpr+$listrik+$air)-($audit+$outing+$marketing+$bingkisan+$disk+$biayadisk+$retur+$bpjs+$dapur+$fotocopi+$ijin+$kebersihan+$kop+$atk)-($gaji+$pengurus+$thr+$staff+$meal+$overtime) -($pos+$sewa+$penyusutan+$tlp+$dinas+$service+$lain+$listrik+$air)+($bungabankbcaniaga+$lain)-$admin)-($kantinluarshu+$kantinp3shu+$cucihelmshu+$usipashu+$sampahshu+
						  $dendakantinshu+$elektronikshu+$motorshu+$listrikairshu))/100)*1.1;

$totjumlahmodal			= (((($totmodaldana+$danacadangan+$danaanggota)+$totshuditahan)+
						  ($kantinluarpendapatan+$kantinp3pendapatan+$cucihelmpendapatan+$piutangusipa+
						   $sampahpendapatan+$dendakantin+$elektronikpendapatan+$motorpendapatan+$pendapatanairlistrik)
						  -
						  (($kantinluar+$kantinp3+$helm+$pinjaman+$elektronik+$motor+$kpr+$listrik+$air)
						  	-($audit+$outing+$marketing+$bingkisan+$disk+$biayadisk+$retur+$bpjs+$dapur+$fotocopi+
						  		$ijin+$kebersihan+$kop+$atk)-($gaji+$pengurus+$thr+$staff+$meal+$overtime)-($pos+
						  			$sewa+$penyusutan+$tlp+$dinas+$service+$lain+$listrik+$air)+($bungabankbcaniaga+$lain)-($admin))
						  - ($kantinluarpendapatan+$kantinp3pendapatan+$cucihelmpendapatan+$piutangusipa+
						   $sampahpendapatan+$dendakantin+$elektronikpendapatan+$motorpendapatan+$pendapatanairlistrik))/100)*1.1;

}?> 
<table border="1">
	<tr>
		<td>10000</td>
		<td>Asset</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>11000</td>
		<td>Asset Lancar</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>11101</td>
		<td>Kas</td>
		<td><?php echo number_format($kas,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>11101</td>
		<td>Bank BCA</td>
		<td><?php echo number_format($totbankbca,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>11101</td>
		<td>Bank Niaga</td>
		<td><?php echo number_format($totbankniaga,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Kas dan Setara Kas</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>11200</td>
		<td>Piutang</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>11201</td>
		<td>Piutang Simpan Pinjam</td>
		<td><?php echo number_format($sumusipa-$sumangsuran,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>11202</td>
		<td>Piutang Tak Tertagih</td>
		<td><?php echo number_format($taktagih,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>11203</td>
		<td>Piutang Lain-lain(Listrik dan Air)</td>
		<td><?php echo number_format($air,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>11204</td>
		<td>Piutang Usaha Elektronik</td>
		<td><?php echo number_format($elektronik,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>11205</td>
		<td>Piutang Usaha Motor</td>
		<td><?php echo number_format($motor,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>11206</td>
		<td>Uang Muka Pembelian Rumah KPR</td>
		<td><?php echo number_format($kpr,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Piutang</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($totpiutang,2,',','.');?></td>
	</tr>
	<tr>
		<td>11300</td>
		<td>Aset Lain-lain</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>11301</td>
		<td>Over SHU</td>
		<td><?php echo number_format($shu,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Asset Lain-lain</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($shu,2,',','.');?></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Asset Lancar</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($totasetlancar,2,',','.');?></td>
	</tr>
	<tr>
		<td>11400</td>
		<td>Persediaan</td>
		<td></td>
		<td><?php echo number_format($persediaan,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Persediaan</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($persediaan,2,',','.');?></td>
	</tr>
	<tr>
		<td>12100</td>
		<td>Ayat Silang</td>
		<td></td>
		<td><?php echo number_format($ayat,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Ayat Silang</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($ayat,2,',','.');?></td>
	</tr>
	<tr>
		<td>13000</td>
		<td>Asset Tetap</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>13100</td>
		<td>Inventaris Kantor</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>13101</td>
		<td>Perolehan Inv. Kantor</td>
		<td><?php echo number_format($perolehankantor+$invkantor,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>13102</td>
		<td>Akum. Inventaris Kantor</td>
		<td><?php echo number_format($akuminvkantor-$invkantor2,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Inventaris Kantor</td>
		<td></td>
		<td></td>
		<td><?php echo number_format(($perolehankantor+$invkantor)-($akuminvkantor-$invkantor2),2,',','.');?></td>
	</tr>
	<tr>
		<td>13200</td>
		<td>Inventaris Kantin</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>13201</td>
		<td>Perolehan Inv. Kantin</td>
		<td><?php echo number_format($perolehankantin+$invkantin,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>13202</td>
		<td>Akum. Inventaris Kantin</td>
		<td><?php echo number_format($akuminvkantin-$invkantin2,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Inventaris Kantin</td>
		<td></td>
		<td></td>
		<td><?php echo number_format(($perolehankantin+$invkantin)-($akuminvkantin-$invkantin2),2,',','.');?></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Asset Tetap</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($totasettetap,2,',','.');?></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Assets</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($totassets,2,',','.');?></td>
	</tr>
	<tr>
		<td>20000</td>
		<td>Liabilities</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>21000</td>
		<td>Current Liabilities</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Hutang Simpan Pinjam</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>21101</td>
		<td>Simpanan Pokok</td>
		<td><?php echo number_format($simpokok,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>21102</td>
		<td>Simpanan Wajib</td>
		<td><?php echo number_format($simwajib,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>21103</td>
		<td>Simpanan Sukarela</td>
		<td><?php echo number_format($simrela,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Hutang Simpan Pinjam</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($simpokok+$simwajib+$simrela,2,',','.');?></td>
	</tr>
	<tr>
		<td>21201</td>
		<td>Hutang Usaha</td>
		<td></td>
		<td></td>
		<td></td>
	</tr><tr>
		<td></td>
		<td>Total Hutang Usaha</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>21300</td>
		<td>Hutang Lain-lain</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>21301</td>
		<td>Piutang Security Deposit</td>
		<td><?php echo number_format($deposit,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>21302</td>
		<td>Hutang Blokir Kesawan</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>21303</td>
		<td>Hutang Pajak</td>
		<td><?php echo number_format($hutangpajak,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Hutang Lain-lain</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($deposit+$hutangpajak,2,',','.');?></td>
	</tr>
	<tr>
		<td>21400</td>
		<td>Biaya Yang Masih Harus Dibayar</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>21401</td>
		<td>Biaya Listrik</td>
		<td><?php echo number_format($byrlistrik,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>21402</td>
		<td>Biaya Air</td>
		<td><?php echo number_format($byrair,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>21403</td>
		<td>Biaya Telp</td>
		<td><?php echo number_format($byrtlp,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>21404</td>
		<td>Biaya Auditor</td>
		<td><?php echo number_format($byrauditor,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Biaya YHMD</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($byrlistrik+$byrair+$byrtlp+$byrauditor,2,',','.');?></td>
	</tr>
	<tr>
		<td></td>
		<td>Total current Liabilities</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($byrlistrik+$byrair+$byrtlp+$byrauditor+$simpokok+$simwajib+$simrela+$deposit+$hutangpajak,2,',','.');?></td>
	</tr>
	<tr>
		<td>30000</td>
		<td>Modal Koperasi</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Modal Atau Dana</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>31101</td>
		<td>Dana Pendidikan</td>
		<td><?php echo number_format($dapen,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>31102</td>
		<td>Dana Pengembangan</td>
		<td><?php echo number_format($dapengem,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>31104</td>
		<td>Dana Kelebihan Pajak</td>
		<td><?php echo number_format($dkp,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>31105</td>
		<td>Dana Pengurus</td>
		<td><?php echo number_format($dapengurus,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>31108</td>
		<td>Dana SHU</td>
		<td><?php echo number_format($dashu,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>31109</td>
		<td>Dana Sosial</td>
		<td><?php echo number_format($danasosial,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Modal atau Dana</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($totmodaldana,2,',','.');?></td>
	</tr>
	<tr>
		<td></td>
		<td>31210</td>
		<td>Dana Cadangan</td>
		<td><?php echo number_format($danacadangan,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>31220</td>
		<td>Dana Anggota</td>
		<td><?php echo number_format($danaanggota,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>Total Dana</td>
		<td></td>
		<td><?php echo number_format($danacadangan+$danaanggota,2,',','.');?></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Modal</td>
		<td></td>
		<td></td>
		<td><?php echo number_format($totmodaldana+$danaanggota,2,',','.');?></td>
	</tr>
	<tr>
		<td></td>
		<td>38000</td>
		<td>SHU Ditahan</td>
		<td><?php echo number_format($totshuditahan,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>39000</td>
		<td>SHU Bulan Berjalan</td>
		<td><?php echo number_format($totshuberjalan,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>39999</td>
		<td>Pembulatan Saldo</td>
		<td><?php echo number_format($pembulatansaldo,2,',','.');?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>Jumlah Modal</td>
		<td></td>
		<td><?php echo number_format($totjumlahmodal,2,',','.');?></td>
	</tr>
	<tr>
		<td></td>
		<td>Total Modal Koperasi</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>