  <?php echo form_open("kas/post", array('enctype'=>'multipart/form-data')); ?>
  <?php $this->load->view('template/v_header');?>
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
                <?php 
                  echo "<select  class='form-control' name='nogl' id='nogl'>";
                    if (count($nogl)) {
                        foreach ($nogl as $value) {
                            echo "<option style='color: black;' value='". $value['kode']." ".$value['nama'] . "'>" . $value['kode']." ".$value['nama'] . "</option>";
                        }
                    }
                  echo "</select><br/>";?>
                   </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jumlah Kas</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Masukan Jumlah Kas">
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