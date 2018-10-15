  <?php echo form_open("pembelian/post", array('enctype'=>'multipart/form-data')); ?>
  <?php $this->load->view('template/v_header');?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title">INPUT PEMBELIAN</h4>

          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-4 pr-md-1">
                <div class="form-group">
                  <label>Tanggal Beli</label>
                  <input type="date" name="tgl_beli" class="form-control" >
                </div>
                
              </div>
              <div class="col-md-4 px-md-1">
                <div class="form-group">
                  <label>Tanggal Pakai</label>
                  <input type="date" name="tgl_pakai" class="form-control" >
                </div>
              </div>
              <div class="col-md-4 pl-md-1">
                <div class="form-group">
                  <label>Nama Aset</label>
                  <input type="text" name="inventaris" class="form-control" placeholder="Masukan Aset">
                </div>
              </div>
            </div>

              <div class="row">
              <div class="col-md-4 pr-md-1">
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" name="jml" class="form-control" placeholder="Masukan Jumlah">
                </div>
                
              </div>
              <div class="col-md-4 px-md-1">
                <div class="form-group">
                  <label>Nominal</label>
                  <input type="text" name="nominal" class="form-control" placeholder="Masukan Nominal">
                </div>
              </div>
              <div class="col-md-4 pl-md-1">
                <div class="form-group">
                  <label>Manfaat</label>
                  <input type="number" name="manfaat" class="form-control" placeholder="Manfaat">
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-md-6 pr-md-1">
                  <div class="form-group">
                    <label>Sisa Manfaat</label>
                    <input type="text" name="sisa_manfaat" class="form-control" placeholder="Sisa Manfaat" >
                  </div>
                </div>
                <div class="col-md-6 pl-md-1">
                  <div class="form-group">
                    <label>Jenis Inventaris</label>
                    <select class="form-control" name="jenis">
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