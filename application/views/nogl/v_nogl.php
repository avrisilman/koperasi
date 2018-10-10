  <?php $this->load->view('template/v_header');?>
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">LIST  NO GL</h4>
                
            <?php echo form_open("nogl/search");?>    
                <table>
                  <tr>
                    <td><a href="nogl/input"><i class="tim-icons icon-simple-add" style="font-size: 30px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
                          Kode
                        </th>
                        <th>
                          Nama GL
                        </th>
                        <th class="td-actions text-right">Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                        foreach($nogl as $value){
                      ?> 
                      <tr>
                       
                        <td>
                          <?php echo $value->kode;?>
                        </td>
                        <td>
                          <?php echo $value->nama;?>
                        </td>
                        <td class="td-actions text-right">
                          <a href="<?php echo site_url('nogl/edit/')."?nogl=".$value->id; ?>"><i class="tim-icons icon-pencil" ></i></a>
                          &nbsp;&nbsp;|&nbsp;&nbsp;
                          <a href="<?php echo site_url('nogl/delete/')."?nogl=".$value->id; ?>"><i class="tim-icons icon-trash-simple"></i></a>
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

