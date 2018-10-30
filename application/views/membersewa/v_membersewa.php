  <?php $this->load->view('template/v_header');?>
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">LIST MEMBER SEWA</h4>
                
            <?php echo form_open("membersewa/search");?>    
                <table>
                  <tr>
                    <td><a href="membersewa/input"><i class="tim-icons icon-simple-add" style="font-size: 30px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="text" class="form-control" placeholder="Masukan Nama GL" name="nama" value="<?php echo $this->input->post('nama');?>" ></td>
                    <td><input id="btn_submit" name="btn_submit" type="submit" class="btn btn-primary btn-block" value="Search" ></td>
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
                          No Sewa
                        </th>
                        <th>
                          Nama
                        </th>
                        <th>Deposit</th>
                        <th class="td-actions text-right">Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>

                       <?php if(empty($member_sewa)){ ?>
                      <tr>
                        <td colspan="6">Data Kosong</td>
                      </tr>
                    <?php }else{
                      $no=0;
                      foreach($member_sewa as $value){ $no++;?>
                        <tr>
                       
                        <td>
                          <?php echo $value->no_sewa;?>
                        </td>
                        <td>
                          <?php echo $value->nama;?>
                        </td>
                         <td>
                          <?php echo $value->deposit;?>
                        </td>
                        <td class="td-actions text-right">
                        
                        <!--   <i class="tim-icons icon-simple-add" data-toggle="dropdown"></i>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('membersewa/inputInvoice/')."?member_sewa=".$value->no_sewa;?>">Input Invoice</a>
                            <a class="dropdown-item" href="<?php echo site_url('membersewa/inputPendapatan/')."?member_sewa=".$value->no_sewa;?>">Input Pendapatan</a>  
                          </div> -->
                         
                          <a href="<?php echo site_url('membersewa/edit/')."?member_sewa=".$value->no_sewa; ?>"><i class="tim-icons icon-pencil" ></i></a>
                          &nbsp;&nbsp;|&nbsp;&nbsp;
                          <a href="<?php echo site_url('membersewa/delete/')."?member_sewa=".$value->no_sewa; ?>"><i class="tim-icons icon-trash-simple"></i></a>
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

