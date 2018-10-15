  <?php echo form_open("pengeluaran/post", array('enctype'=>'multipart/form-data')); ?>
  <?php $this->load->view('template/v_header');?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title">INPUT PENGELUARAN</h4>

          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-4 pr-md-1">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                </div>
              </div>
              <div class="col-md-4 px-md-1">
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
              <div class="col-md-4 pl-md-1">
                <div class="form-group">
                  <label>Jumlah Bayar</label>
                  <input type="number" name="jml_bayar" class="form-control" placeholder="Masukan Jumlah Bayar">
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