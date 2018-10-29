  <?php $this->load->view('template/v_header');?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title">SHORT BY JENIS KELAMIN</h4>
            
            <?php echo form_open("member/post");?>    
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <table>
                    <tr>
                      <td>
                        <select class="form-control" name="sex">
                          <option style="background-color: #000000;" value="Pria">Pria</option>
                          <option style="background-color: #000000;" value="Wanita">Wanita</option>
                        </select>
                      </td>
                      <td>
                        <input type="submit" class="btn btn-fill btn-primary" name="simpan" value="Cetak Short By Jenis Kelamin" />
                      </td>
                    </tr>
                  </table>
                  
                </div>
              </div>
            </div>
            
            <?php echo form_close(); ?> 
            
            <BR/>
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
  <?php $this->load->view('template/v_footer');?>

