  <?php $this->load->view('template/v_header');?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title">SHORT BY DEPARTEMENT</h4>
            
            <?php echo form_open("member/post");?>    
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <table>
                    <tr>
                      <td>
                        <select name="dept" class="form-control">
                              <option value="">-Pilih Departement-</option>
                              <option style="color: #000000;" value="MO">MO</option>
                              <option style="color: #000000;" value="HRD">HRD</option>
                              <option style="color: #000000;" value="IT">IT</option>
                              <option style="color: #000000;" value="ACC">ACC</option>
                              <option style="color: #000000;" value="MKT">MKT</option>
                              <option style="color: #000000;" value="CCD">CCD</option>
                              <option style="color: #000000;" value="A&P">A & P</option>
                              <option style="color: #000000;" value="RTL">RTL</option>
                              <option style="color: #000000;" value="TR">TR</option>
                              <option style="color: #000000;" value="ENG">ENG</option>
                              <option style="color: #000000;" value="HK">HK</option>
                              <option style="color: #000000;" value="SEC">SEC</option>
                              <option style="color: #000000;" value="CP">CP</option>
                              <option style="color: #000000;" value="CS">CS</option>
                              <option style="color: #000000;" value="KANTIN">KANTIN</option>
                              <option style="color: #000000;" value="KOP">KOP</option>
                        </select>
                      </td>
                      <td>
                        <input type="submit" class="btn btn-fill btn-primary" name="simpan" value="Cetak Short By Dept" />
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

