  <?php $this->load->view('template/v_header');?>
  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">SHORT BY PINJAMAN BULANAN</h4>
                
            <?php echo form_open("member/post");?>    
                <table>
                   <tr>
                    <td style="color: #d45151;">From</td>
                    <td><input type="date" class="form-control" name="from" value="<?php echo $this->input->post('from');?>" ></td>

                    <td style="color: #d45151;">&nbsp;&nbsp;To</td>
                    <td><input type="date" class="form-control" name="to" value="<?php echo $this->input->post('to');?>" ></td>
                     <td><input id="btn_submit" name="btn_submit" type="submit" class="btn btn-primary btn-block" value="Cetak Pijaman Bulan" ></td>
                  </tr>
                </table>
            <?php echo form_close(); ?> 
             
                    <BR/>
              </div>
            
            </div>
          </div>
         
        </div>
      </div>
<?php $this->load->view('template/v_footer');?>

