  <?php $this->load->view('template/v_header');?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title">SHORT BY PINJAMAN MEMBER</h4>
            
            <?php echo form_open("member/post");?>    
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <table>
                    <tr>
                      <td>
                       <div class="col-md-12">
                      <div class="form-group">
                       
                        <input type="text" name="jumlah" class="form-control" placeholder="Masukan No Karyawan">
                      </div>
                    </div>
                  </td>
                  <td><input type="submit" class="btn btn-fill btn-primary" name="simpan" value="Cetak Pinjaman Member" /></td>
                  </tr>
                  </table>
                </div>
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

