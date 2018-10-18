<?php
foreach($labarugi as $value){
  $pendapatankantinluar     = $value->pendapatankantinluar;
  $pendapatankantinp3       = $value->pendapatankantinp3;
  $pendapatanhelm           = $value->pendapatanhelm;
  $usipa                    = $value->usipa;
  $sampah                   = $value->sampah;
  $denda                    = $value->denda;
  $pinjamanelektronik       = $value->pinjamanelektronik;
  $pinjamanmotor            = $value->pinjamanmotor;
  $airlistrik               = $value->airlistrik;
  $costofsales              = $value->costofsales;
  $kantinluar               = $value->kantinluar;
  $kantinp3                 = $value->kantinp3;
  $helm                     = $value->helm;
  $pinjaman                 = $value->pinjaman;
  $elektronik               = $value->elektronik;
  $motor                    = $value->motor;
  $kpr                      = $value->kpr;
  $expenses                 = $value->expenses;
  $audit                    = $value->audit;
  $outing                   = $value->outing;
  $marketing                = $value->marketing;
  $bingkisan                = $value->bingkisan;
  $disk                     = $value->disk;
  $biayadisk                = $value->biayadisk;
  $retur                    = $value->retur;
  $iuran                    = $value->iuran;
  $bpjs                     = $value->bpjs;
  $dapur                    = $value->dapur;
  $fotocopi                 = $value->fotocopi;
  $ijin                     = $value->ijin;
  $kebersihan               = $value->kebersihan;
  $kop                      = $value->kop;
  $atk                      = $value->atk;
  $empl                     = $value->empl;
  $gaji                     = $value->gaji;
  $pengurus                 = $value->pengurus;
  $thr                      = $value->thr;
  $staff                    = $value->staff;
  $meal                     = $value->meal;
  $overtime                 = $value->overtime;
  $pos                      = $value->pos;
  $sewa                     = $value->sewa;
  $penyusutan               = $value->penyusutan;
  $tlp                      = $value->tlp;
  $dinas                    = $value->dinas;
  $service                  = $value->service;
  $cbn                      = $value->cbn;
  $listrik                  = $value->listrik;
  $air                      = $value->air;
  $income                   = $value->income;
  $bank                     = $value->bank;
  $lain                     = $value->lain;
  $other                    = $value->other;
  $admin                    = $value->admin;
  $pajak                    = $value->pajak;
  $adminbca                 = $value->adminbca;
  $pajakbungabca            = $value->pajakbungabca;
  $biayamateraibca          = $value->biayamateraibca;
  $adminniaga               = $value->adminniaga;
  $pajakniaga               = $value->pajakniaga;
  $materainiaga             = $value->materainiaga;
  $bungabankbca             = $value->bungabankbca;
  $bungabankniaga           = $value->bungabankniaga;
  $totalsewa                = $pendapatankantinluar+$pendapatankantinp3+$pendapatanhelm+$usipa+
                              $sampah+$denda+$pinjamanelektronik+$pinjamanmotor+$airlistrik;
  $totalcos                 = $kantinluar+$kantinp3+$helm+$pinjaman+$elektronik+$motor+$kpr+$listrik+$air;
  $totalretribusi           = $audit+$outing+$marketing+$bingkisan+$disk+$biayadisk+$retur+$bpjs+
                              $dapur+$fotocopi+$ijin+$kebersihan+$kop+$atk;
  $totalemployment          = $gaji+$pengurus+$thr+$staff+$meal+$overtime;
  $totalexpenses            = $pos+$sewa+$penyusutan+$tlp+$dinas+$service+$lain+$listrik+$air;
  $banklain                 = $bank+$lain; 
  $profit                   = $totalsewa - $totalcos - $totalretribusi - $totalemployment - $totalexpenses + $banklain - $admin;

  $biayapajak               = ($totalsewa/100)*1;
  $nett                     = ($totalsewa - $totalcos - $totalretribusi - $totalemployment - $totalexpenses + $banklain - $admin) - $totalsewa;

}?> 

<table border="1">
  <tr>
    <td>40000</td><td colspan="2">Pendapatan</td>
  </tr>
  <tr>
    <td>41000</td><td>Pendapatan Kantin Luar</td><td><?php echo number_format($pendapatankantinluar,2,',','.');?></td>
  </tr>
  <tr>
    <td>42000</td><td>Pendapatan Kantin P3</td><td><?php echo number_format($pendapatankantinp3,2,',','.');?></td>
  </tr>
  <tr>
    <td>43000</td><td>Pendapatan Penitipan & Pencucian Helm</td><td><?php echo number_format($pendapatanhelm,2,',','.');?></td>
  </tr>
  <tr>
    <td>44000</td><td>Pendapatan Jasa Pinjaman</td><td><?php echo number_format($usipa,2,',','.');?></td>
  </tr>
  <tr>
    <td>45000</td><td>Pendapatan Sampah</td><td><?php echo number_format($sampah,2,',','.');?></td>
  </tr>
  <tr>
    <td>46000</td><td>Pendapatan Denda Kantin</td><td><?php echo number_format($denda,2,',','.');?></td>
  </tr>
  <tr>
    <td>47000</td><td>Pendapatan Jasa Pinjaman Elektronik</td><td><?php echo number_format($pinjamanelektronik,2,',','.');?></td>
  </tr>
  <tr>
    <td>48000</td><td>Pendapatan Jasa Pinjaman Motor</td><td><?php echo number_format($pinjamanmotor,2,',','.');?></td>
  </tr>
  <tr>
    <td>49000</td><td>Pendapatan Listrik dan Air</td><td><?php echo number_format($airlistrik,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2" align="right">TOTAL PENDAPATAN SEWA DAN JASA</td>
    <td><?php echo number_format($totalsewa,2,',','.');?>
    </td>
  </tr>

  <tr>
    <td>50000</td><td colspan="2">Cost Of Sales</td>
  </tr>
  <tr>
    <td>51000</td><td>Kantin Luar</td><td><?php echo number_format($kantinluar,2,',','.');?></td>
  </tr>
  <tr>
    <td>52000</td><td>Kantin P3</td><td><?php echo number_format($kantinp3,2,',','.');?></td>
  </tr>
  <tr>
    <td>53000</td><td>Helm</td><td><?php echo number_format($helm,2,',','.');?></td>
  </tr>
  <tr>
    <td>54000</td><td>Pinjaman</td><td><?php echo number_format($pinjaman,2,',','.');?></td>
  </tr>
  <tr>
    <td>55000</td><td>Elektronik</td><td><?php echo number_format($elektronik,2,',','.');?></td>
  </tr>
  <tr>
    <td>56000</td><td>Motor</td><td><?php echo number_format($motor,2,',','.');?></td>
  </tr>
  <tr>
    <td>57000</td><td>Biaya Listrik Rumah KPR</td><td><?php echo number_format($kpr,2,',','.');?></td>
  </tr>
  <tr>
    <td>58000</td><td>Listrik dan Air</td><td><?php echo number_format($listrik+$air,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2" align="right">TOTAL COST OF SALES</td>
    <td><?php echo number_format($totalcos,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2" align="right">GROSS PROFIT</td>
    <td><?php echo number_format($pendapatankantinluar+$pendapatankantinp3+$pendapatanhelm+$usipa+$sampah+$denda+$pinjamanelektronik+$pinjamanmotor+$airlistrik+$kantinluar+$kantinp3+$helm+$pinjaman+$elektronik+$motor+$kpr+$listrik+$air,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2">60000</td><td>EXPENSES</td>
  </tr>
  <tr>
    <td>60001</td><td>Biaya Akunting dan Audit</td><td><?php echo number_format($audit,2,',','.');?></td>
  </tr>
  <tr>
    <td>61001</td><td>Biaya Outing Anggota</td><td><?php echo number_format($outing,2,',','.');?></td>
  </tr>
  <tr>
    <td>61002</td><td>Biaya Marketing</td><td><?php echo number_format($marketing,2,',','.');?></td>
  </tr>
  <tr>
    <td>61200</td><td>Biaya Bingkisan Hari Raya</td><td><?php echo number_format($bingkisan,2,',','.');?></td>
  </tr>
  <tr>
    <td>61300</td><td>Discounts</td><td><?php echo number_format($disk,2,',','.');?></td>
  </tr>
  <tr>
    <td>61310</td><td>Biaya Discounts</td><td><?php echo number_format($biayadisk,2,',','.');?></td>
  </tr>
  <tr>
    <td>61320</td><td>Biaya Retur</td><td><?php echo number_format($retur,2,',','.');?></td>
  </tr>
  <tr>
    <td>61400</td><td>Biaya Penghargaan Karyawan</td><td></td>
  </tr>
  <tr>
    <td>61500</td><td>Biaya BPJS</td><td><?php echo number_format($bpjs,2,',','.');?></td>
  </tr>
  <tr>
    <td>61600</td><td>Biaya Konsumsi dan Dapur</td><td><?php echo number_format($dapur,2,',','.');?></td>
  </tr>
  <tr>
    <td>61700</td><td>Biaya Fotocopy dan Percetakan</td><td><?php echo number_format($fotocopi,2,',','.');?></td>
  </tr>
  <tr>
    <td>61800</td><td>Biaya Perizinan</td><td><?php echo number_format($ijin,2,',','.');?></td>
  </tr>
  <tr>
    <td>61900</td><td>Keamanan dan Kebersihan</td><td><?php echo number_format($kebersihan,2,',','.');?></td>
  </tr>
  <tr>
    <td>62000</td><td>Perbaikan dan Perawatan KOP</td><td><?php echo number_format($kop,2,',','.');?></td>
  </tr>
  <tr>
    <td>62100</td><td>Biaya ATK dan Suplies</td><td><?php echo number_format($atk,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2" align="right">TOTAL BIAYA RETRIBUSI DAN IURAN</td>
    <td><?php echo number_format($totalretribusi,2,',','.');?></td>
  </tr>
  <tr>
    <td>62200</td><td>Employment Expenses</td><td><?php echo number_format($empl,2,',','.');?></td>
  </tr>
  <tr>
    <td>62210</td><td>Gaji Staff</td><td><?php echo number_format($gaji,2,',','.');?></td>
  </tr>
  <tr>
    <td>62220</td><td>Honor Pengurus</td><td><?php echo number_format($pengurus,2,',','.');?></td>
  </tr>
  <tr>
    <td>62230</td><td>THR dan Bonus</td><td><?php echo number_format($thr,2,',','.');?></td>
  </tr>
  <tr>
    <td>62240</td><td>Tunjangan Staff</td><td><?php echo number_format($staff,2,',','.');?></td>
  </tr>
  <tr>
    <td>62250</td><td>Biaya Meal Allowance</td><td><?php echo number_format($meal,2,',','.');?></td>
  </tr>
  <tr>
    <td>62260</td><td>Biaya Overtime</td><td><?php echo number_format($overtime,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2" align="right">TOTAL EMPLOYMENT EXPENSES</td>
    <td><?php echo number_format($totalemployment,2,',','.');?></td>
  </tr>
  <tr>
    <td>62300</td><td>Biaya Pos dan Kurir</td><td><?php echo number_format($pos,2,',','.');?></td>
  </tr>
  <tr>
    <td>62400</td><td>Biaya Sewa</td><td><?php echo number_format($sewa,2,',','.');?></td>
  </tr>
  <tr>
    <td>62450</td><td>Biaya Penyusutan</td><td><?php echo number_format($penyusutan,2,',','.');?></td>
  </tr>
  <tr>
    <td>62500</td><td>Telepon</td><td><?php echo number_format($tlp,2,',','.');?></td>
  </tr>
  <tr>
    <td>62600</td><td>Transport / Ongkos dan Perjalanan Dinas</td><td><?php echo number_format($dinas,2,',','.');?></td>
  </tr>
  <tr>
    <td>62700</td><td>Service</td><td><?php echo number_format($service,2,',','.');?></td>
  </tr>
  <tr>
    <td>62710</td><td>Biaya Lain - lain</td><td><?php echo number_format($lain,2,',','.');?></td>
  </tr>
  <tr>
    <td>62720</td><td>Listrik</td><td><?php echo number_format($listrik,2,',','.');?></td>
  </tr>
  <tr>
    <td>62730</td><td>Air</td><td><?php echo number_format($air,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2" align="right">TOTAL EXPENSES</td>
    <td><?php echo number_format($totalexpenses,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2" align="right">Operating Profit</td><td></td>
  </tr>
  <tr>
    <td>80000</td><td>Other Income</td><td><?php echo number_format($income,2,',','.');?></td>
  </tr>
    <tr>
    <td>81000</td><td>Bunga Bank</td><td><?php echo number_format($bungabankbca+$bungabankniaga,2,',','.');?></td>
  </tr>
  <tr>
    <td>82000</td><td>Pendapatan Lain – lain</td><td><?php echo number_format(($lain/100)*5,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2" align="right">TOTAL OTHER INCOME</td><td><?php echo number_format(((($bungabankbca+$bungabankniaga+$lain)/100)*5),2,',','.');?></td>
  </tr>
    <tr>
    <td>90000</td><td>Other Expenses</td><td><?php echo number_format($other,2,',','.');?></td>
  </tr>
  <tr>
    <td>91000</td><td>Biaya Admin</td>
    <td><?php echo number_format($adminbca+$pajakbungabca+$biayamateraibca+$adminniaga+$pajakniaga+$materainiaga,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2" align="right">TOTAL OTHER EXPENSES</td><td><?php echo number_format($admin,2,',','.');?></td>
  </tr>
  <tr>
    <td colspan="2" align="right">Profit / (Loss)</td>
    <td><?php echo number_format($profit,2,',','.');?></td>
  </tr>
    <tr>
    <td>62550</td><td>Biaya Pajak PP No.46/2013</td><td><?php echo number_format($biayapajak,2,',','.');?></td>
  </tr>
    <tr>
    <td colspan="2" align="right">Nett Profit / (Loss)</td><td><?php echo number_format($nett,2,',','.');?></td>
  </tr>
</table>