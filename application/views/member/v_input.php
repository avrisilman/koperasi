  <?php echo form_open("member/post", array('enctype'=>'multipart/form-data')); ?>
  <?php $this->load->view('template/v_header');?>
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">INPUT MEMBER</h4>
                    
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No. Karyawan</label>
                        <input type="number" name="member_id" class="form-control" placeholder="Masukan No. Karyawan">
                      </div>
                       <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                      </div>
                        <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="lahir" class="form-control" placeholder="Masukan Tempat Lahir">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgllahir" class="form-control">
                      </div>
                       <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select  class="form-control" name="sex" id="sex">
                          <option style="color: black;" value="Pria">Pria</option>
                          <option style="color: black;" value="Wanita">Wanita</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label>Departement</label>
                        <select class="form-control" name="dept" id="dept">
                          <option style="color: black;" value="Pria">MO</option>
                          <option style="color: black;" value="Wanita">HRD</option>
                          <option style="color: black;" value="Wanita">IT</option>
                          <option style="color: black;" value="Wanita">ACC</option>
                          <option style="color: black;" value="Wanita">MKT</option>
                          <option style="color: black;" value="Wanita">CCD</option>
                          <option style="color: black;" value="Wanita">A & P</option>
                          <option style="color: black;" value="Wanita">RTL</option>
                          <option style="color: black;" value="Wanita">TR</option>
                          <option style="color: black;" value="Wanita">ENG</option>
                          <option style="color: black;" value="Wanita">HK</option>
                          <option style="color: black;" value="Wanita">SEC</option>
                          <option style="color: black;" value="Wanita">CP</option>
                          <option style="color: black;" value="Wanita">CS</option>
                          <option style="color: black;" value="Wanita">KANTIN</option>
                          <option style="color: black;" value="Wanita">KOP</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Masukan Jabatan">
                      </div>
                       <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat">
                      </div>
                       <div class="form-group">
                        <label>Handphone</label>
                        <input type="number" name="hp" class="form-control" placeholder="Masukan Handphone">
                      </div>
                       <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Masukan Email">
                      </div>
                       <div class="form-group">
                        <label>Status</label>
                        <select  class="form-control" name="aktif" id="aktif">
                          <option style="color: black;" value="Pria">Aktif</option>
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