<?php echo form_open("kas/post", array('enctype'=>'multipart/form-data')); ?>
<?php if ($type=="Update"){
    echo form_hidden ('id',$this->input->get('kas'));
}
?>
  <?php $this->load->view('template/v_header');?>
   <?php
  foreach($kas as $value){
    $kode      = $value->nogl;
    $jumlah    = $value->jumlah;
  }?> 
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">INPUT KAS</h4>
                    
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                         <label>No GL</label>
                        <select class="form-control" name="nogl"  onchange="myFunction(event)">
                           <?php foreach($nogl as $value){?> 
                            <option style="color: black;" value="<?php echo $value->kode;?> <?php echo $value->nama;?>" 
                              <?php echo ($kode == $value->kode." ".$value->nama)? "selected=selected" : "";?>
                              >
                              <?php echo $value->kode;?> <?php echo $value->nama;?></option>
                          <?php } ?> 
                       </select>
                   </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jumlah Kas</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Masukan Jumlah Kas" value="<?php echo $jumlah;?>">
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
<script>
function myFunction(e) {
    document.getElementById("myText").value = e.target.value
}
</script>