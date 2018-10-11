  <?php echo form_open("pinjaman/post", array('enctype'=>'multipart/form-data')); ?>
  <?php $this->load->view('template/v_header');?>
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">INPUT PINJAMAN</h4>
                    
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No. Karyawan</label>
                        <input type="number" name="member_id" class="form-control" placeholder="Masukan No. Karyawan">
                      </div>
                       <div class="form-group">
                          <label>Jenis Pinjaman</label>
                            <select name="jenis_pinjaman" class="form-control">
                               <option style="color: black;" value="">-Pilih Jenis Pinjaman-</option>
                               <option style="color: black;" value="11201 USIPA">USIPA</option>
                               <option style="color: black;" value="11204 Elektronik">Elektronik</option>
                               <option style="color: black;" value="11205 Motor">Motor</option>
                               <option style="color: black;" value="11203 Listrik & Air">Listrik & Air</option>
                               <option style="color: black;" value="11202 Piutang Tak Tertagih">Piutang Tak Tertagih</option>
                               <option style="color: black;" value="11206 Uang Muka Pembelian KPR">Uang Muka Pembelian KPR</option>
                               <option style="color: black;" value="11301 Over SHU">Over SHU</option>
                            </select>
                      </div>
                       <div class="form-group">
                        <label>Jumlah Pinjaman</label>
                        <input type="number" name="jmlpinjaman" class="form-control" placeholder="Masukan Jumlah Pinjaman">
                      </div>
                       <div class="form-group">
                        <label>Bunga</label>
                        <input type="text" name="bunga" class="form-control" placeholder="Masukan Bunga">
                      </div>
                       <div class="form-group">
                       <label>Tenor</label>
                          <select name="tenor" class="form-control">
                             <option style="color: black;" value="">-Pilih Tenor-</option>
                             <option style="color: black;" value="1 Bulan">1 Bulan</option>
                             <option style="color: black;" value="2 Bulan">2 Bulan</option>
                             <option style="color: black;" value="3 Bulan">3 Bulan</option>
                             <option style="color: black;" value="4 Bulan">4 Bulan</option>
                             <option style="color: black;" value="5 Bulan">5 Bulan</option>
                             <option style="color: black;" value="6 Bulan">6 Bulan</option>
                             <option style="color: black;" value="7 Bulan">7 Bulan</option>
                             <option style="color: black;" value="8 Bulan">8 Bulan</option>
                             <option style="color: black;" value="9 Bulan">9 Bulan</option>
                             <option style="color: black;" value="10 Bulan">10 Bulan</option>
                             <option style="color: black;" value="11 Bulan">11 Bulan</option>
                             <option style="color: black;" value="12 Bulan">12 Bulan</option>
                             <option style="color: black;" value="13 Bulan">13 Bulan</option>
                             <option style="color: black;" value="14 Bulan">14 Bulan</option>
                             <option style="color: black;" value="15 Bulan">15 Bulan</option>
                             <option style="color: black;" value="16 Bulan">16 Bulan</option>
                             <option style="color: black;" value="17 Bulan">17 Bulan</option>
                             <option style="color: black;" value="18 Bulan">18 Bulan</option>
                             <option style="color: black;" value="19 Bulan">19 Bulan</option>
                             <option style="color: black;" value="20 Bulan">20 Bulan</option>
                             <option style="color: black;" value="21 Bulan">21 Bulan</option>
                             <option style="color: black;" value="22 Bulan">22 Bulan</option>
                             <option style="color: black;" value="23 Bulan">23 Bulan</option>
                             <option style="color: black;" value="24 Bulan">24 Bulan</option>
                             <option style="color: black;" value="25 Bulan">25 Bulan</option>
                             <option style="color: black;" value="26 Bulan">26 Bulan</option>
                             <option style="color: black;" value="27 Bulan">27 Bulan</option>
                             <option style="color: black;" value="28 Bulan">28 Bulan</option>
                             <option style="color: black;" value="29 Bulan">29 Bulan</option>
                             <option style="color: black;" value="30 Bulan">30 Bulan</option>
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