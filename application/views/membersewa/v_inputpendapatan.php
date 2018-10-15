<?php echo form_open("membersewa/post", array('enctype'=>'multipart/form-data')); ?>
<?php $this->load->view('template/v_header');?>

<div class="content">
  <div class="row">
   <?php
   foreach($invoice as $value){
    $no_invoice      = $value->no_invoice;
   
  }?> 
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">INPUT PENDAPATAN</h4>

      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-4 pr-md-1">
              <div class="form-group">
                <label>No. Invoice</label>
                <input type="text" class="form-control" value="<?php echo $no_invoice;?>" disabled="disable">
                <input type="hidden" name="no_invoice" class="form-control" value="<?php echo $no_invoice;?>">
              </div>
            </div>
            <div class="col-md-4 px-md-1">
              <div class="form-group">
                <label>Jumlah Bayar</label>
                <input type="text" name="jml_bayar" class="form-control" placeholder="Masukan Jumlah Bayar">
              </div>
            </div>
            <div class="col-md-4 pl-md-1">
              <div class="form-group">
                <label>Pendapatan Listrik</label>
                <input type="number" name="air" class="form-control" placeholder="Masukan Pendapatan Listrik">
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 pr-md-1">
              <div class="form-group">
                <label>Pendapatan Admin</label>
                <input type="text" name="adm" class="form-control" placeholder="Masukan Pendapatan Admin">
              </div>
            </div>
            <div class="col-md-4 px-md-1">
              <div class="form-group">
                <label>Iuran Sampah</label>
                <input type="text" name="sampah" class="form-control" placeholder="Masukan Iuran Sampah">
              </div>
            </div>
            <div class="col-md-4 pl-md-1">
              <div class="form-group">
                <label>Denda</label>
                <input type="number" name="denda" class="form-control" placeholder="Masukan Denda">
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" class="form-control" placeholder="Masukan Keterangan">
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