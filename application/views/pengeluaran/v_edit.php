<?php echo form_open("pengeluaran/post", array('enctype'=>'multipart/form-data')); ?>
<?php if ($type=="Update"){
  echo form_hidden ('no_tran',$this->input->get('pengeluaran'));
}
?>
<?php $this->load->view('template/v_header');?>
<?php
foreach($uangkeluar as $value){
  $no_tran = $value->no_tran;
  $kode      = $value->nogl;
  $nama    = $value->nama;
  $kode    = $value->nogl;
  $jml_bayar    = $value->jml_bayar;
  $ket    = $value->ket;
}?> 
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title">EDIT PENGELUARAN</h4>

        </div>
        <div class="card-body">

             <div class="row">
              <div class="col-md-4 pr-md-1">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="hidden" name="no_tran" value="<?php echo $no_tran;?>">
                   <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo $nama;?>">
                </div>
              </div>
              <div class="col-md-4 px-md-1">
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
              <div class="col-md-4 pl-md-1">
                <div class="form-group">
                  <label>Jumlah Bayar</label>
                  <input type="number" name="jml_bayar" class="form-control" value="<?php echo $jml_bayar;?>" placeholder="Masukan Jumlah Bayar">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="ket" class="form-control" value="<?php echo $ket;?>" placeholder="Masukan Keterangan">
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