  <?php $this->load->view('template/v_header');?>
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">LIST PEMBELIAN ASET</h4>
                
             
                <table>
                  <tr>
                    <?php echo form_open("pembelian/search");?>    
                    <td><a href="<?php echo base_url();?>pembelian/input"><i class="tim-icons icon-simple-add" style="font-size: 30px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                     <td><input type="text" class="form-control" placeholder="Masukan Nama Aset" name="nama" value="<?php echo $this->input->post('nama');?>" ></td>
                    <td><input id="btn_submit" name="btn_submit" type="submit" class="btn btn-primary btn-block" value="Search" ></td>
                     <?php echo form_close(); ?>
                    <?php echo form_open("pembelian/CetakPembelian");?>     
                    <td>&nbsp;&nbsp;</td>
                     <td><input type="date" class="form-control" name="from" value="<?php echo $this->input->post('from');?>" ></td>
                      <td><input type="date" class="form-control" name="to" value="<?php echo $this->input->post('to');?>" ></td>
                    <td><input id="btn_submit" name="btn_submit" type="submit" class="btn btn-primary btn-block" value="Download" ></td>
                    <?php echo form_close(); ?>
                  </tr>
                </table>
           
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>Tanggal Beli</th>
                        <th>Tanggal Pakai</th>
                        <th>Nama Aset</th>
                        <th>Jumlah</th>
                        <th>Nominal</th>
                        <th>Manfaat</th>
                        <th>Sisa Manfaat</th>
                        <th>Jenis Inventaris</th>
                        <th class="td-actions text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                        foreach($pembelian as $value){
                      ?> 
                      <tr>
                       
                        <td><?php echo $value->tgl_beli;?></td>
                        <td><?php echo $value->tgl_pakai;?></td>
                        <td><?php echo $value->inventaris;?></td>
                        <td><?php echo $value->jml;?></td>
                        <td><?php echo number_format($value->nominal,2,',','.');?></td>
                        <td><?php echo $value->manfaat;?></td>
                        <td><?php echo $value->sisa_manfaat;?></td>
                        <td><?php echo $value->jenis;?></td>
                        
                        <td class="td-actions text-right">
                          <a href="<?php echo site_url('pembelian/edit/')."?pembelian=".$value->id; ?>"><i class="tim-icons icon-pencil" ></i></a>
                          &nbsp;&nbsp;|&nbsp;&nbsp;
                          <a href="<?php echo site_url('pembelian/delete/')."?pembelian=".$value->id; ?>"><i class="tim-icons icon-trash-simple"></i></a>
                        </td>
                      </tr>
                      <?php $no++;}?>
                    </tbody>
                  </table>  

                  <?php if ($type=="index")  {
                      echo"<i align='right'>$Links</i>";
                  }else{}
                  ?>

                  
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
<?php $this->load->view('template/v_footer');?>

