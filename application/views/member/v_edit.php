<?php echo form_open("member/post", array('enctype'=>'multipart/form-data')); ?>
<?php if ($type=="Update"){
    echo form_hidden ('id',$this->input->get('kas'));
}
?>
  <?php $this->load->view('template/v_header');?>
   <?php
  foreach($member as $value){
    $member_id      = $value->member_id;
    $nama    = $value->nama;
    $lahir    = $value->lahir;
    $tgllahir   = $value->tgllahir;
    $sex    = $value->sex;
    $dept    = $value->dept;
    $pekerjaan    = $value->pekerjaan;
    $alamat    = $value->alamat;
    $hp    = $value->hp;
    $email    = $value->email;
    $aktif    = $value->aktif;
  }?> 
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">EDIT KAS</h4>
                    
              </div>
                 <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No. Karyawan</label>
                        <input type="number" name="member_id" class="form-control" value="<?php echo $member_id;?>" placeholder="Masukan No. Karyawan">
                      </div>
                       <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $nama;?>" placeholder="Masukan Nama">
                      </div>
                        <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="lahir" class="form-control" value="<?php echo $lahir;?>" placeholder="Masukan Tempat Lahir">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgllahir" class="form-control" value="<?php echo $tgllahir;?>">
                      </div>
                       <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select  class="form-control" name="sex" id="sex">
                          <option style="color: black;" value="<?php echo $sex;?>"><?php echo $sex;?></option>
                           <option style="color: black;" value="Pria">Pria</option>
                          <option style="color: black;" value="Wanita">Wanita</option>
                        </select>
                      </div>
                       <div class="form-group">
                        <label>Departement</label>
                        <select class="form-control" name="dept" id="dept">
                          <option style="color: black;" value="<?php echo $dept;?>"><?php echo $dept;?></option>
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
                        <input type="text" name="pekerjaan" class="form-control" value="<?php echo $pekerjaan;?>" placeholder="Masukan Jabatan">
                      </div>
                       <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $alamat;?>" placeholder="Masukan Alamat">
                      </div>
                       <div class="form-group">
                        <label>Handphone</label>
                        <input type="number" name="hp" class="form-control" value="<?php echo $hp;?>" placeholder="Masukan Handphone">
                      </div>
                       <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="Masukan Email">
                      </div>
                       <div class="form-group">
                        <label>Status</label>
                        <select  class="form-control" name="aktif" id="aktif">
                          <option style="color: black;" value="<?php echo $aktif;?>"><?php echo $aktif;?></option>
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
<script>
function myFunction(e) {
    document.getElementById("myText").value = e.target.value
}
</script>