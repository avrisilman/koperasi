<?php echo form_open("membersewa/post", array('enctype'=>'multipart/form-data')); ?>
<?php $this->load->view('template/v_header');?>

<div class="content">
  <div class="row">
   <?php
   foreach($member_sewa as $value){
    $no_sewa      = $value->no_sewa;
    $nama         = $value->nama;
    $deposit      = $value->deposit;
  }?> 
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">INPUT INVOICE</h4>

      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>No Sewa</label>
              <input type="text" name="no_sewa" class="form-control" placeholder="Masukan No Sewa" value="<?php echo $no_sewa;?>" disabled="disable">
              <input type="hidden" name="no_sewa" class="form-control" placeholder="Masukan No Sewa" value="<?php echo $no_sewa;?>">
            </div>
            <div class="form-group">
                        <label>No GL</label>
                <?php 
                  echo "<select  class='form-control' name='nogl' id='nogl'>";
                    if (count($nogl)) {
                        foreach ($nogl as $value) {
                            echo "<option style='color: black;' value='". $value['kode']." ".$value['nama'] . "'>" . $value['kode']." ".$value['nama'] . "</option>";
                        }
                    }
                  echo "</select><br/>";?>
            </div>
            <div class="form-group">
              <label>Nilai</label>
              <input type="number" name="nilai" class="form-control" placeholder="Masukan Nilai">
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