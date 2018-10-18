<?php
class Kasmodel extends CI_Model{
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function change_category() {
		$data = array();
		$query = $this->db->get('nogl');
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row){
				$data[] = $row;
			}
		}
		$query->free_result();
		return $data;
	}

	function change_categoryedit() {
		$qry  = " SELECT * from nogl";
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		return $result;
	}

	function input() {
		$data=array(
			'tanggal' 			=> date('Y-m-d H:i:s'),
			'nogl' 				=> $this->input->post('nogl'),
			'jumlah' 			=> $this->input->post('jumlah')
		);

		$this->db->insert('kas',$data);
	}

	public function record_count() {
		return $this->db->count_all("kas");
	}
	public function fetch_data($Starting,$TotalRecord) {
		$query = $this->db->query("SELECT * from kas limit $Starting,$TotalRecord");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	function getEdit($id){
		$qry  = "SELECT * from kas where id='$id'";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}

	function edit($id) {
		$data=array(
			'tanggal' 			=> date('Y-m-d H:i:s'),
			'nogl' 				=> $this->input->post('nogl'),
			'jumlah' 			=> $this->input->post('jumlah')
		);
		$this->db->where('id',$id);
		$this->db->update('kas',$data);
	}

	function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('kas');
	}

	function labarugi($from, $to){
		$qry  = "SELECT
		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A 
		INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='41000 Pendapatan Kantin Luar') as pendapatankantinluar,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A 
		INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='42000 Pendapatan Kantin P3') as pendapatankantinp3,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A 
		INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='43000 Pendapatan Penitipan & Pencucian Helm') as pendapatanhelm,

		(SELECT ((sum(b.angpinjam)/10)*1.1) from pinjaman a inner join angsuran b ON a.no_pinjam=b.no_pinjam 
		where b.tanggalangs between '$from' and '$to' and a.jenis_pinjaman='11201 USIPA') as usipa,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A 
		INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='45000 Pendapatan Sampah') as sampah,

		(SELECT sum(denda) from pendapatan 
		where tanggal between '$from' and '$to') as denda,

		(SELECT ((sum(b.angpinjam)/10)*1.1) from pinjaman a inner join angsuran b ON a.no_pinjam=b.no_pinjam 
		where b.tanggalangs between '$from' and '$to' and a.jenis_pinjaman='47000 Pendapatan Jasa Pinjaman Elektronik') as pinjamanelektronik,

		(SELECT ((sum(b.angpinjam)/10)*1.1) from pinjaman a inner join angsuran b ON a.no_pinjam=b.no_pinjam 
		where b.tanggalangs between '$from' and '$to' and a.jenis_pinjaman='48000 Pendapatan Jasa Pinjaman Motor') as pinjamanmotor,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A 
		INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='49000 Pendapatan Listrik dan Air') as airlistrik,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='50000 Cost Of Sales') as costofsales,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='51000 Kantin Luar') as kantinluar,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='52000 Kantin P3') as kantinp3,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='53000 Helm') as helm,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='54000 Pinjaman') as pinjaman,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='55000 Elektronik') as elektronik,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='56000 Motor') as motor,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='57000 Biaya Listrik Rumah KPR') as kpr,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='60000 EXPENSES') as expenses,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='60001 Biaya Akunting dan Audit') as audit,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61001 Biaya Outing Anggota') as outing,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61002 Biaya Marketing') as marketing,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61200 Biaya Bingkisan Hari Raya') as bingkisan,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61300 Discounts') as disk,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61310 Biaya Discounts') as biayadisk,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61320 Biaya Retur') as retur,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61400 Biaya Retribusi dan Iuran') as iuran,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61500 Biaya BPJS') as bpjs,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61600 Biaya Konsumsi dan Dapur') as dapur,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61700 Biaya Fotocopy dan Percetakan') as fotocopi,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61800 Biaya Perizinan') as ijin,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61900 Keamanan dan Kebersihan') as kebersihan,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62000 Perbaikan dan Perawatan KOP') as kop,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62100 Biaya ATK dan Suplies') as atk,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62200 Employment Expenses') as empl,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62210 Gaji Staff') as gaji,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62220 Honor Pengurus') as pengurus,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62230 THR dan Bonus') as thr,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62240 Tunjangan Staff') as staff,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62250 Biaya Meal Allowance') as meal,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62260 Biaya Overtime') as overtime,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62300 Biaya Pos dan Kurir') as pos,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62400 Biaya Sewa') as sewa,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62450 Biaya Penyusutan') as penyusutan,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62500 Telepon') as tlp,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62600 Transport dan Perjalanan Dinas') as dinas,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62700 Services') as service,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62710 Internet CBN') as cbn,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62720 Listrik') as listrik,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62730 Air') as air,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='80000 Other Income') as income,

		(SELECT sum(jumlah) from kas 
		where tanggal between '$from' and '$to' and nogl in('Bunga Bank BCA','Bunga Bank CIMB')) as bank,

		(SELECT sum(air) from pendapatan 
		where tanggal between '$from' and '$to') as lain,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='90000 Other Expenses') as other,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000 Biaya Admin') as admin,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62550 Biaya Pajak PP No.46/2013') as pajak,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000 Biaya Admin BCA') as adminbca,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000B Pajak Bunga BCA') as pajakbungabca,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000D Biaya Materai BCA') as biayamateraibca,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000A Biaya Admin Niaga') as adminniaga,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000C Pajak Bunga Niaga') as pajakniaga,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000E Biaya Materai Niaga') as materainiaga,

		(SELECT sum(jumlah) from kas 
		where tanggal between '$from' and '$to' and nogl in('81000 Bunga Bank BCA')) as bungabankbca,

		(SELECT sum(jumlah) from kas 
		where tanggal between '$from' and '$to' and nogl='81000A Bunga Bank CIMB Niaga') as bungabankniaga ";
		//echo nl2br($qry);die();
		$query = $this->db->query($qry);
		$result['data']=$query->result();
		return $result;
	}

	function neraca($from, $to, $fromshu, $toshu){
		$qry  = "SELECT

		(SELECT jumlah from kas where  tanggal between '$from' and '$to' and  id='13') as kas,

		(SELECT jumlah from kas where  tanggal between '$from' and '$to' and  id='14') as bca, 

		/*(SELECT sum(jmlpinjaman) as jml from pinjaman where tanggal between '$from' and '$to' and id_bank='10') as bca,*/

		(SELECT jumlah from kas where  tanggal between '$from' and '$to' and  id='15') as niaga,

		(SELECT sum(jmlpinjaman) from pinjaman where tanggal between '$from' and '$to' and jenis_pinjaman='11201 USIPA') as sumusipa,

		(SELECT sum(a.angpinjam) from angsuran a inner join pinjaman b on a.no_pinjam=b.no_pinjam where a.tanggalangs between '$from' and '$to') as sumangsuran,

		(SELECT sum(jmlpinjaman) from pinjaman where tanggal between '$from' and '$to' and jenis_pinjaman='11202 Piutang Tak Tertagih') as taktagih,

		(SELECT sum(jml_bayar) from uangkeluar where tanggal between '$from' and '$to' and nogl IN('62720 Listrik','62730 Air')) - ((((SELECT sum(air) from pendapatan where tanggal between '$from' and '$to') / 100)*95)) as air,

		(SELECT sum(jmlpinjaman) from pinjaman where tanggal between '$from' and '$to' and jenis_pinjaman='11204 Elektronik') as elektronik,

		(SELECT sum(jmlpinjaman) from pinjaman where tanggal between '$from' and '$to' and jenis_pinjaman='11205 Motor') as motor,

		(SELECT sum(jmlpinjaman) from pinjaman where tanggal between '$from' and '$to' and jenis_pinjaman='11206 Uang Muka Pembelian KPR') as kpr,

		(SELECT sum(jmlpinjaman) from pinjaman where tanggal between '$from' and '$to' and jenis_pinjaman='11301 Over SHU') as shu,

		(SELECT ((sum(b.angpinjam)/10)*1.1) from pinjaman a inner join angsuran b ON a.no_pinjam=b.no_pinjam 
		where b.tanggalangs between '$from' and '$to' and a.jenis_pinjaman='11201 USIPA') as piutangusipa,

		(SELECT ((sum(b.angpinjam)/10)*1.1) from pinjaman a inner join angsuran b ON a.no_pinjam=b.no_pinjam 
		where b.tanggalangs between '$from' and '$to' and a.jenis_pinjaman='47000 Pendapatan Jasa Pinjaman Elektronik') as elektronikpendapatan,

		(SELECT ((sum(b.angpinjam)/10)*1.1) from pinjaman a inner join angsuran b ON a.no_pinjam=b.no_pinjam 
		where b.tanggalangs between '$from' and '$to' and a.jenis_pinjaman='48000 Pendapatan Jasa Pinjaman Motor') as motorpendapatan,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A 
		INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='49000 Pendapatan Listrik dan Air') as pendapatanairlistrik,

		(SELECT jml_bayar from uangkeluar where  tanggal between '$from' and '$to' and  nogl='12100 Ayat Silang BCA') as ayatbca,

		(SELECT jml_bayar from uangkeluar where  nogl='13201 Perolehan Inv. Kantin') as kantin,

		(SELECT sum(simpokok) from angsuran where tanggalangs between '$from' and '$to') as simpokok,

		(SELECT sum(simwajib) from angsuran where tanggalangs between '$from' and '$to') as simwajib,

		(SELECT sum(simrela) from angsuran where tanggalangs between '$from' and '$to') as simrela,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='62720 Listrik' and tanggal between '$from' and '$to') as byrlistrik,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='62730 Air' and tanggal between '$from' and '$to') as byrair,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='62500 Telepon' and tanggal between '$from' and '$to') as byrtlp,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='31109 Dana Sosial' and tanggal between '$from' and '$to') as danasosial,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='51000 Kantin Luar') as kantinluar,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='52000 Kantin P3') as kantinp3,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62210 Gaji Staff') as gaji,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62220 Honor Pengurus') as pengurus,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62230 THR dan Bonus') as thr,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62240 Tunjangan Staff') as staff,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62250 Biaya Meal Allowance') as meal,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62710 Internet CBN') as cbn,

		(SELECT sum(jumlah) from kas 
		where tanggal between '$from' and '$to' and nogl in('81000 Bunga Bank BCA')) as bungabankbca,

		(SELECT sum(air) from pendapatan 
		where tanggal between '$from' and '$to') as lain,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000 Biaya Admin BCA') as adminbca,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000B Pajak Bunga BCA') as pajakbungabca,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000D Biaya Materai BCA') as biayamateraibca,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62000 Perbaikan dan Perawatan KOP') as kop,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='41000 Pendapatan Kantin Luar') as kantinluarpendapatan,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='42000 Pendapatan Kantin P3') as kantinp3pendapatan,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A 
		INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='43000 Pendapatan Penitipan & Pencucian Helm') as cucihelmpendapatan,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A 
		INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='45000 Pendapatan Sampah') as sampahpendapatan,

		(SELECT sum(denda) as denda from pendapatan 
		where tanggal between '$from' and '$to') as dendapendapatan,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$from' and '$to' and B.nogl='46000 Pendapatan Denda Kantin') as dendakantin,

		(SELECT sum(Deposit) from member_sewa)
		as deposit,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61200 Biaya Bingkisan Hari Raya') as bingkisan,

		(SELECT jml_bayar from uangkeluar where  tanggal between '$from' and '$to' and  nogl='12100A Ayat Silang Niaga') as ayatniaga,

		(SELECT sum(jumlah) from kas 
		where tanggal between '$from' and '$to' and nogl='81000A Bunga Bank CIMB Niaga') as bungabankniaga,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000A Biaya Admin Niaga') as adminniaga,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000C Pajak Bunga Niaga') as pajakniaga,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='91000E Biaya Materai Niaga') as materainiaga,

		(SELECT jml_bayar from uangkeluar where  tanggal between '$from' and '$to' and  nogl='11400 Persediaan') as persediaan, 

		(SELECT jml_bayar from uangkeluar where  tanggal between '$from' and '$to' and  nogl='12100 Ayat Silang') as ayat,

		(SELECT jml_bayar from uangkeluar where  nogl='13101 Perolehan Inv. Kantor') as perolehankantor,

		(SELECT sum(nominal) from beli_aset where jenis='Inventaris Kantor') as invkantor,

		(SELECT (sum(nominal)/48) from beli_aset where  tgl_beli between '$from' and '$to' and  jenis='Inventaris Kantor') as invkantor2,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='13102 Akum. Inventaris Kantor') as akuminvkantor,

		(SELECT jml_bayar from uangkeluar where  nogl='13201 Perolehan Inv. Kantin') as perolehankantin,

		(SELECT sum(nominal) from beli_aset where jenis='Inventaris Kantin') as invkantin,

		(SELECT (sum(nominal)/48) from beli_aset where  tgl_beli between '$from' and '$to' and  jenis='Inventaris Kantin') as invkantin2,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='13202 Akum. Inventaris Kantin') as akuminvkantin,

		(SELECT sum(jumlah) from kas where id='10') as jmlkas,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='62550 Biaya Pajak PP No.46/2013') as hutangpajak,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='62720 Listrik' and tanggal between '$from' and '$to') as byrlistrik,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='62730 Air' and tanggal between '$from' and '$to') as byrair,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='21404 Biaya Auditor' and tanggal between '$from' and '$to') as byrauditor,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='62500 Telepon' and tanggal between '$from' and '$to') as byrtlp,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='31101 Dana Pendidikan' and tanggal between '$from' and '$to') as dapen,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='31102 Dana Pengembangan' and tanggal between '$from' and '$to') as dapengem,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='31104 Dana Kelebihan Pajak' and tanggal between '$from' and '$to') as dkp,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='31105 Dana Pengurus' and tanggal between '$from' and '$to') as dapengurus,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='31108 Dana SHU' and tanggal between '$from' and '$to') as dashu,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='31109 Dana Sosial' and tanggal between '$from' and '$to') as danasosial,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='31210 Dana Cadangan' and tanggal between '$from' and '$to') as danacadangan,

		(SELECT sum(jml_bayar) from uangkeluar where nogl='31220 Dana Anggota' and tanggal between '$from' and '$to') as danaanggota,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='50000 Cost Of Sales') as costofsales,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='51000 Kantin Luar') as kantinluar,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='52000 Kantin P3') as kantinp3,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='53000 Helm') as helm,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='54000 Pinjaman') as pinjaman,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='55000 Elektronik') as elektronik,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='56000 Motor') as motor,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='57000 Biaya Listrik Rumah KPR') as kpr,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='60000 EXPENSES') as expenses,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='60001 Biaya Akunting dan Audit') as audit,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61001 Biaya Outing Anggota') as outing,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61002 Biaya Marketing') as marketing,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61200 Biaya Bingkisan Hari Raya') as bingkisan,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61300 Discounts') as disk,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61310 Biaya Discounts') as biayadisk,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61320 Biaya Retur') as retur,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61400 Biaya Retribusi dan Iuran') as iuran,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61500 Biaya BPJS') as bpjs,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61600 Biaya Konsumsi dan Dapur') as dapur,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61700 Biaya Fotocopy dan Percetakan') as fotocopi,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61800 Biaya Perizinan') as ijin,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='61900 Keamanan dan Kebersihan') as kebersihan,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62000 Perbaikan dan Perawatan KOP') as kop,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62100 Biaya ATK dan Suplies') as atk,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62200 Employment Expenses') as empl,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62210 Gaji Staff') as gaji,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62220 Honor Pengurus') as pengurus,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62230 THR dan Bonus') as thr,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62240 Tunjangan Staff') as staff,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62250 Biaya Meal Allowance') as meal,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62260 Biaya Overtime') as overtime,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62300 Biaya Pos dan Kurir') as pos,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62400 Biaya Sewa') as sewa,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62450 Biaya Penyusutan') as penyusutan,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62500 Telepon') as tlp,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62600 Transport dan Perjalanan Dinas') as dinas,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62700 Services') as service,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62710 Internet CBN') as cbn,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62720 Listrik') as listrik,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='62730 Air') as air,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='80000 Other Income') as income,

		(SELECT sum(jumlah) from kas 
		where tanggal between '$from' and '$to' and nogl in('Bunga Bank BCA','Bunga Bank CIMB')) as bungabankbcaniaga,

		(SELECT sum(air) from pendapatan where tanggal between '$from' and '$to') as lain,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar 
		where tanggal between '$from' and '$to' and nogl='90000 Other Expenses') as other,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar where tanggal between '$from' and '$to' and nogl='91000 Biaya Admin') as admin,

		(SELECT sum(jml_bayar) as jmlbayar from uangkeluar where tanggal between '$from' 
		and '$to' and nogl='62550 Biaya Pajak PP No.46/2013') as pajak,

		(SELECT jml_bayar from uangkeluar where  tanggal between '$from' and '$to' and  nogl='39999  Pembulatan Saldo') as pembulatansaldo,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$fromshu' and '$toshu' and B.nogl='41000 Pendapatan Kantin Luar') as kantinluarshu,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$fromshu' and '$toshu' and B.nogl='42000 Pendapatan Kantin P3') as kantinp3shu,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$fromshu' and '$toshu' and B.nogl='43000 Pendapatan Penitipan & Pencucian Helm') as cucihelmshu,

		(SELECT ((sum(b.angpinjam)/10)*1.1) from pinjaman a inner join angsuran b ON a.no_pinjam=b.no_pinjam 
		where b.tanggalangs between '$fromshu' and '$toshu' and a.jenis_pinjaman='11201 USIPA') as usipashu,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$fromshu' and '$toshu' and B.nogl='45000 Pendapatan Sampah') as sampahshu,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$fromshu' and '$toshu' and B.nogl='46000 Pendapatan Denda Kantin') as dendakantinshu,

		(SELECT ((sum(b.angpinjam)/10)*1.1) from pinjaman a inner join angsuran b ON a.no_pinjam=b.no_pinjam 
		where b.tanggalangs between '$fromshu' and '$toshu' 
		and a.jenis_pinjaman='47000 Pendapatan Jasa Pinjaman Elektronik') as elektronikshu,

		(SELECT ((sum(b.angpinjam)/10)*1.1) from pinjaman a inner join angsuran b ON a.no_pinjam=b.no_pinjam 
		where b.tanggalangs between '$fromshu' and '$toshu' and a.jenis_pinjaman='48000 Pendapatan Jasa Pinjaman Motor') as motorshu,

		(SELECT sum(A.jml_bayar) as jmlbayar from pendapatan A INNER JOIN invoice B ON A.no_invoice=B.no_invoice
		where A.tanggal between '$fromshu' and '$toshu' and B.nogl='49000 Pendapatan Listrik dan Air') as listrikairshu ";

		$query = $this->db->query($qry);
		$result['data']=$query->result();
		//echo nl2br($qry);die();
		return $result;
	}


}
?>