<?php echo form_open("pinjaman/bayar", array('enctype'=>'multipart/form-data')); ?>
<?php if ($type=="Bayar"){
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
              <label>No. Karyawan</label>
              <input type="hidden" name="no_pinjam" value="<?php echo $no_pinjam;?>">
              <input type="number" name="member_id" class="form-control" placeholder="Masukan No. Karyawan" value="<?php echo $member_id;?>">
            </div>
            <div class="form-group">
              <label>Simpanan Wajib</label>
              <input type="number" name="simwajib" class="form-control" value="" placeholder="Simpanan Wajib">
            </div>
            <div class="form-group">
              <label>Simpanan Sukarela</label>
              <input type="number" name="simrela" class="form-control" value="" placeholder="Simpanan Sukarela">
            </div>

            <div class="form-group">
              <label>Dana Sosial</label>
              <input type="number" name="danasosial" class="form-control" value="" placeholder="Dana Sosial">
            </div>
            <div class="form-group">
              <label>Angsuran Pinjaman</label>
              <input type="number" disabled="disable" name="angpinjam" class="form-control" value="" placeholder="Angsuran Pinjaman">
            </div>

            <div class="form-group">
              <label>Jasa Pinjaman</label>
              <input type="number" disabled="disable" name="jasapinjam" class="form-control" 
              value="" placeholder="Jasa Pinjaman">
            </div>

            <input type="hidden"  name="angpinjam" class="form-control" value="" placeholder="Angsuran Pinjaman">

            <input type="hidden" name="jasapinjam" class="form-control" 
            value="" placeholder="Jasa Pinjaman"> 

            <div class="form-group">
              <label>Denda</label>
              <input type="number" name="denda" class="form-control" value="" placeholder="Denda">
            </div>

            <div class="form-group">
              <label>Lain-Lain</label>
              <input type="number" name="lain" class="form-control" value="" placeholder="Lain-Lain">
            </div>
            <div class="form-group">
              <label>Tagihan Bulan</label>
              <input type="text" name="ket" class="form-control" value="" placeholder="Keterangan">
            </div>

            <div class="form-group">
              <label>Hari Terlambat</label>
              <input type="text" name="hari_terlambat" class="form-control" placeholder="Hari Terlambat">
            </div>

            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control">
               <option style="color: black;" value="Tidak">Tidak</option>
               <option style="color: black;" value="Lunas">Lunas</option>
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