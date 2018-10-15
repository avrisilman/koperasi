<?php echo form_open("pembelian/post", array('enctype'=>'multipart/form-data')); ?>
<?php if ($type=="Update"){
  echo form_hidden ('id',$this->input->get('pembelian'));
}
?>
<?php $this->load->view('template/v_header');?>
<?php
foreach($pembelian as $value){
  $id    = $value->id;
  $tgl_beli = $value->tgl_beli;
  $tgl_pakai      = $value->tgl_pakai;
  $inventaris    = $value->inventaris;
  $jml    = $value->jml;
  $nominal    = $value->nominal;
  $manfaat    = $value->manfaat;
  $sisa_manfaat    = $value->sisa_manfaat;
  $jenis    = $value->jenis;
}?> 
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title">EDIT PEMBELIAN</h4>

        </div>

        <div class="card-body">

          <div class="row">
            <div class="col-md-4 pr-md-1">
              <div class="form-group">
                <label>Tanggal Beli</label>
                <input type="date" name="tgl_beli" class="form-control" value="<?php echo $tgl_beli;?>">
              </div>

            </div>
            <div class="col-md-4 px-md-1">
              <div class="form-group">
                <label>Tanggal Pakai</label>
                <input type="date" name="tgl_pakai" class="form-control" value="<?php echo $tgl_pakai;?>">
              </div>
            </div>
            <div class="col-md-4 pl-md-1">
              <div class="form-group">
                <label>Nama Aset</label>
                <input type="text" name="inventaris" class="form-control" placeholder="Masukan Aset" value="<?php echo $inventaris;?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 pr-md-1">
              <div class="form-group">
                <label>Jumlah</label>
                <input type="text" name="jml" class="form-control" placeholder="Masukan Jumlah" value="<?php echo $jml;?>">
              </div>

            </div>
            <div class="col-md-4 px-md-1">
              <div class="form-group">
                <label>Nominal</label>
                <input type="text" name="nominal" class="form-control" placeholder="Masukan Nominal" value="<?php echo $nominal;?>">
              </div>
            </div>
            <div class="col-md-4 pl-md-1">
              <div class="form-group">
                <label>Manfaat</label>
                <input type="number" name="manfaat" class="form-control" placeholder="Manfaat" value="<?php echo $manfaat;?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 pr-md-1">
              <div class="form-group">
                <label>Sisa Manfaat</label>
                <input type="text" name="sisa_manfaat" class="form-control" placeholder="Sisa Manfaat" value="<?php echo $sisa_manfaat;?>">
              </div>
            </div>
            <div class="col-md-6 pl-md-1">
              <div class="form-group">
                <label>Jenis Inventaris</label>
                <select class="form-control" name="jenis">
                  <option style="color: black;" value="<?php echo $jenis;?>"><?php echo $jenis;?></option>
                  <option style="color: black;" value="Inventaris Kantor">Inventaris Kantor</option>
                  <option style="color: black;" value="Inventaris Kantin">Inventaris Kantin</option>
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