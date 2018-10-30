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
                    <td style="color: #d45151;">From</td>
                    <td><input type="date" class="form-control" name="from" value="<?php echo $this->input->post('from');?>" ></td>

                    <td style="color: #d45151;">&nbsp;&nbsp;To</td>
                    <td><input type="date" class="form-control" name="to" value="<?php echo $this->input->post('to');?>" ></td>
                  </tr>
                  <tr>
                    <td style="color: #d45151;">From SHU&nbsp;&nbsp;</td>
                    <td><input type="date" class="form-control" name="fromshu" value="<?php echo $this->input->post('fromshu');?>" ></td>

                    <td style="color: #d45151;">&nbsp;&nbsp;To SHU &nbsp;&nbsp;</td>
                    <td><input type="date" class="form-control" name="toshu" value="<?php echo $this->input->post('toshu');?>" ></td>
                  </tr>
                   <tr>
                     <td><a href="<?php echo base_url();?>kas/input"><i class="tim-icons icon-simple-add" style="font-size: 30px;"></i></a></td> 
                      <td><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">CETAK</button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item"><input id="btn_submit" name="search" type="submit" value="Laba Rugi"></a>
                          <a class="dropdown-item"><input id="btn_submit" name="search" type="submit" value="Neraca"></a>
                          <a class="dropdown-item"><input id="btn_submit" name="search" type="submit" value="SHU"></a>
                          <a class="dropdown-item"><input id="btn_submit" name="search" type="submit" value="SHU By Member"></a>
                        </div>
                    </td> 
                   

                    

                    <!-- <td><input id="btn_submit" name="search" type="submit" class="btn btn-primary btn-block" value="Laba Rugi" ></td>
                    <td><input id="btn_submit" name="search" type="submit" class="btn btn-primary btn-block" value="Neraca" ></td> 
                    <td><input id="btn_submit" name="search" type="submit" class="btn btn-primary btn-block" value="SHU" ></td>  -->
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
                      
                    <?php if(empty($kas)){ ?>
                      <tr>
                        <td colspan="6">Data Kosong</td>
                      </tr>
                    <?php }else{
                      $no=0;
                      foreach($kas as $value){ $no++;?>
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
                          <?php
                        }
                      }
                      ?>

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

