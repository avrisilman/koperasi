<?php echo form_open("pinjaman/post", array('enctype'=>'multipart/form-data')); ?>
<?php if ($type=="Angsur"){
  echo form_hidden ('no_pinjam',$this->input->get('pinjaman'));
}
?>
<?php $this->load->view('template/v_header');?>

<div class="content">
  <div class="row">
   <?php
   foreach($pinjaman as $value){
    $no_pinjam      = $value->no_pinjam;
    $member_id      = $value->member_id;
    $jenis_pinjaman = $value->jenis_pinjaman;
    $jmlpinjaman    = $value->jmlpinjaman;
    $bunga          = $value->bunga;
    $tenor          = $value->tenor;
  }?> 
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">EDIT PINJAMAN</h4>

      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Simpanan Wajib</label>
              <input type="hidden" name="no_pinjam" value="<?php echo $no_pinjam;?>">
              <input type="hidden" name="member_id" class="form-control" value="<?php echo $member_id;?>">
              <input type="number" name="simwajib" class="form-control" placeholder="Masukan Simpanan Wajib" >
            </div>
            <div class="form-group">
              <label>Simpanan Sukarela</label>
              <input type="number" name="simrela" class="form-control" placeholder="Masukan Simpanan Sukarela">
            </div>
            <div class="form-group">
              <label>Dana Sosial</label>
              <input type="number" name="danasosial" class="form-control" placeholder="Masukan Dana Sosial">
            </div>
            <div class="form-group">
              <label>Angsuran Pinjaman</label>
              <input type="number" name="angpinjam" class="form-control" value="<?php echo ($jmlpinjaman/$tenor);?>" disabled="disable" placeholder="Masukan Angsuran Pinjaman">
              <input type="hidden" name="angpinjam" class="form-control" value="<?php echo ($jmlpinjaman/$tenor);?>" placeholder="Masukan Angsuran Pinjaman">
            </div>
            <div class="form-group">
              <label>Jasa Pnjaman</label>
              <input type="number" name="jasapinjam" class="form-control" value="<?php echo (($jmlpinjaman/100)*$bunga);?>" placeholder="Masukan Jasa Pinjaman">
            </div>
            <div class="form-group">
              <label>Denda</label>
              <input type="number" name="denda" class="form-control" placeholder="Masukan Denda">
            </div>
            <div class="form-group">
              <label>Lain-lain</label>
              <input type="number" name="lain" class="form-control" placeholder="Masukan Lain-lain">
            </div>
            <div class="form-group">
              <label>Tagihan Bulanan</label>
              <input type="number" name="ket" class="form-control" placeholder="Masukan Tagihan Bulan">
            </div>
            <div class="form-group">
              <label>Harga Terlambat</label>
              <input type="text" name="hari_terlambat" class="form-control" placeholder="Masukan Hari Terlambat">
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control">
              
               <option value="Lunas">Lunas</option>
               <option value="Tidak">Tidak</option>
             </select>
           </div>

         </div>
         <div class="card-footer">
          <input type="submit" class="btn btn-fill btn-primary" name="simpan" value="<?php echo $type; ?>" />
        </div>
      </div>
    </div>
  </div>

</div>
</div>

<?php $this->load->view('template/v_footer');?>
<?php echo form_close(); ?>