<?php echo form_open("nogl/post", array('enctype'=>'multipart/form-data')); ?>
<?php if ($type=="Update"){
    echo form_hidden ('id',$this->input->get('nogl'));
}
?>
  <?php $this->load->view('template/v_header');?>
 
<div class="content">
        <div class="row">
           <?php
  foreach($nogl as $value){
    $kode      = $value->kode;
    $nama      = $value->nama;
  }?> 
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">INPUT NO GL</h4>
                    
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kode</label>
                        <input type="number" name="kode" class="form-control" placeholder="Masukan Kode" value="<?php echo $kode;?>">
                      </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama GL</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama GL" value="<?php echo $nama;?>">
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

<?php $this->load->view('template/v_footer');?>
<?php echo form_close(); ?>