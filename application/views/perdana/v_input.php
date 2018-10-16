  <?php echo form_open("simpanan/post", array('enctype'=>'multipart/form-data')); ?>
  <?php $this->load->view('template/v_header');?>
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">INPUT SIMPANAN PERDANA</h4>
                    
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No. Karyawan</label>
                        <input type="number" name="member_id" disabled="disable" class="form-control" placeholder="Masukan No. Karyawan" value="<?php echo $this->session->userdata('member_id');?>">
                         <input type="hidden" name="member_id" value="<?php echo $this->session->userdata('member_id');?>">
                      </div>
                      <div class="form-group">
                        <label>Simpanan Pokok</label>
                        <input type="number" name="simpokok" class="form-control" placeholder="Masukan Simpanan Pokok">
                      </div>
                      <div class="form-group">
                        <label>Simpanan Wajib</label>
                        <input type="number" name="simwajib" class="form-control" placeholder="Masukan Simpanan Wajib">
                      </div>
                      <div class="form-group">
                        <label>Simpanan Sukarela</label>
                        <input type="number" name="simrela" class="form-control" placeholder="Masukan Simpanan Sukarela">
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                        <select  class="form-control" name="status" id="status">
                          <option style="color: black;" value="Lunas">Lunas</option>
                          <option style="color: black;" value="Tidak">Tidak</option>
                        </select>
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