  <?php echo form_open("membersewa/post", array('enctype'=>'multipart/form-data')); ?>
  <?php $this->load->view('template/v_header');?>
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">INPUT MEMBER SEWA</h4>
                    
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No Sewa</label>
                        <input type="text" name="no_sewa" class="form-control" placeholder="Masukan No Sewa">
                      </div>
                       <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                      </div>
                       <div class="form-group">
                        <label>Deposit</label>
                        <input type="number" name="deposit" class="form-control" placeholder="Masukan Deposit">
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