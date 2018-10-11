  <?php $this->load->view('template/v_header');?>
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">LIST KAS</h4>
                
             <?php echo form_open("kas/search");?>    
                <table>
                  <tr>
                    <td><a href="<?php echo base_url();?>kas/input"><i class="tim-icons icon-simple-add" style="font-size: 30px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <!-- <td><input type="text" class="form-control" placeholder="Masukan Nama GL" name="nama" value="<?php echo $this->input->post('nama');?>" ></td>
                    <td><input id="btn_submit" name="btn_submit" type="submit" class="btn btn-primary btn-block" value="Search" ></td> -->
                  </tr>
                </table>
            <?php echo form_close(); ?>  
             
                    
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                       
                        <th>
                          No GL
                        </th>
                        <th>
                          Tanggal
                        </th>

                        <th>
                          Jumlah
                        </th>
                        <th class="td-actions text-right">Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                        foreach($kas as $value){
                      ?> 
                      <tr>
                       
                        <td>
                          <?php echo $value->nogl;?>
                        </td>
                        <td>
                          <?php echo $value->tanggal;?>
                        </td>
                         <td>
                          <?php echo $value->jumlah;?>
                        </td>
                        <td class="td-actions text-right">
                          <a href="<?php echo site_url('kas/edit/')."?kas=".$value->id; ?>"><i class="tim-icons icon-pencil" ></i></a>
                          &nbsp;&nbsp;|&nbsp;&nbsp;
                          <a href="<?php echo site_url('kas/delete/')."?kas=".$value->id; ?>"><i class="tim-icons icon-trash-simple"></i></a>
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

