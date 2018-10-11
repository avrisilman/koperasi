<?php echo form_open("simpananperdana/post", array('enctype'=>'multipart/form-data')); ?>
<?php if ($type=="Update"){
    echo form_hidden ('member_id',$this->input->get('angsuran'));
}
?>
  <?php $this->load->view('template/v_header');?>
 
<div class="content">
        <div class="row">
           <?php
  foreach($angsuran as $value){
    $member_id      = $value->member_id;
    $simpokok      = $value->simpokok;
    $simwajib      = $value->simwajib;
    $simrela      = $value->simrela;
    $status      = $value->status;
  }?> 
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">EDIT NO GL</h4>
                    
              </div>
              <div class="card-body">
                <div class="row">
                   <div class="col-md-12">
                      <div class="form-group">
                        <label>No. Karyawan</label>
                        <input type="number" name="member_id" class="form-control" placeholder="Masukan No. Karyawan" value="<?php echo $member_id;?>" disabled="disable">
                        <input type="hidden" name="member_id" class="form-control" placeholder="Masukan No. Karyawan" value="<?php echo $member_id;?>">
                      </div>
                      <div class="form-group">
                        <label>Simpanan Pokok</label>
                        <input type="number" name="simpokok" class="form-control" placeholder="Masukan Simpanan Pokok"  value="<?php echo $simpokok;?>">
                      </div>
                      <div class="form-group">
                        <label>Simpanan Wajib</label>
                        <input type="number" name="simwajib" class="form-control" placeholder="Masukan Simpanan Wajib"  value="<?php echo $simwajib;?>">
                      </div>
                      <div class="form-group">
                        <label>Simpanan Sukarela</label>
                        <input type="number" name="simrela" class="form-control" placeholder="Masukan Simpanan Sukarela"  value="<?php echo $simrela;?>">
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <select  class="form-control" name="status" id="status">
                          <option style="color: black;" value="<?php echo $status;?>"><?php echo $status;?></option>
                          <option style="color: black;" value="Lunas">Lunas</option>
                          <option style="color: black;" value="Tidak">Tidak</option>
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