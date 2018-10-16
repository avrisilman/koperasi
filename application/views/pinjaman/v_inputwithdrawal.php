<?php echo form_open("pinjaman/post", array('enctype'=>'multipart/form-data')); ?>
<?php if ($type=="Input Pengeluaran"){
  echo form_hidden ('member_id',$this->input->get('pinjaman'));
}
?>
<?php $this->load->view('template/v_header');?>

<div class="content">
  <div class="row">
   <?php
   foreach($member as $value){ 
    $member_id = $value->member_id;
  }?> 
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">INPUT PENGELUARAN SIMPANAN</h4>
        
      </div>
      <div class="card-body">
         
                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>No. Karyawan (disabled)</label>
                        <input type="hidden" name="member_id" value="<?php echo $member_id;?>">
                        <input type="text" class="form-control" disabled="" value="<?php echo $member_id;?>">
                      </div>
                    </div>
                    <div class="col-md-3 px-md-1">
                      <div class="form-group">
                        <label>Simpanan Pokok</label>
                        <input type="text" name="simpokok" class="form-control" placeholder="Simpanan Pokok" >
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label >Simpanan Wajib</label>
                        <input type="number" name="simwajib" class="form-control" placeholder="Simpanan Wajib">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Simpanan Sukarela</label>
                        <input type="text" name="simrela" class="form-control" placeholder="Simpanan Sukarela">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="ket" class="form-control" placeholder="Keterangan">
                      </div>
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
</div>

<?php $this->load->view('template/v_footer');?>
<?php echo form_close(); ?>