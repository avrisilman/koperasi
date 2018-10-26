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
                  <?php
                  $no = 1;
                  foreach($member_sewa as $value){
                    ?> 
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
                        <!--  <input id="btn_submit" name="btn_submit" type="submit" class="btn btn-primary btn-block" value="Invoice" > -->

                        <a href="<?php echo site_url('membersewa/inputInvoice/')."?member_sewa=".$value->no_sewa;?>" style="font-size: 12px;"><i class="tim-icons icon-simple-add"></i>&nbsp;Invoice</a>
                        &nbsp;|&nbsp;
                        <a href="<?php echo site_url('membersewa/edit/')."?member_sewa=".$value->no_sewa; ?>"><i class="tim-icons icon-pencil" ></i></a>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="<?php echo site_url('membersewa/delete/')."?member_sewa=".$value->no_sewa; ?>"><i class="tim-icons icon-trash-simple"></i></a>
                      </td>
                    </tr>
                    <?php $no++;}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header">
              <h4 class="card-title">LIST INVOICE</h4>

            </div>
            <div class="card-body" style="background-color: #b2b2b2;">
              <div class="table-responsive">
                <table class="table tablesorter " id="">
                  <thead class=" text-primary">
                    <tr>
                      <th>No. Invoice</th>
                      <th>No. Kantin</th>
                      <th>No. GL</th>
                      <th>Nilai</th>
                      <th>Tanggal invoice</th>
                      <th class="td-actions text-right">Action</th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php if(empty($invoice)){ ?>
                      <tr>
                        <td colspan="6">Data Kosong</td>
                      </tr>
                    <?php }else{
                      $no=0;
                      foreach($invoice as $value){ $no++;?>
                        <tr>
                          <td><?php echo $value->no_invoice;?></td>
                          <td><?php echo $value->no_sewa;?></td>
                          <td><?php echo $value->nogl;?></td>
                          <td><?php echo number_format($value->nilai,2,',','.');?></td>
                          <td><?php echo $value->tglinvoice;?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo site_url('membersewa/inputPendapatan/')."?invoice=".$value->no_invoice;?>" style="font-size: 12px;"><i class="tim-icons icon-simple-add"></i>&nbsp;Pendapatan</a>
                            &nbsp;|&nbsp;
                            <a href="<?php echo site_url('membersewa/edit/')."?member_sewa=".$value->no_sewa; ?>"><i class="tim-icons icon-cloud-download-93" ></i></a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url('membersewa/Deleteinvoice/')."?invoice=".$value->no_invoice; ?>"><i class="tim-icons icon-trash-simple"></i></a></td>
                          </tr>
                          <?php
                        }
                      }
                      ?>

                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">LIST PENDAPATAN</h4>

              </div>
              <div class="card-body" style="background-color: #b2b2b2;">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>No. Invoice</th>
                        <th>No. Kantin</th>
                        <th>Tanggal</th>
                        <th>Jumlah Bayar</th>
                        <th>Pendapatan Listrik</th>
                        <th>Pendapatan Admin</th>
                        <th>Iuran Sampah</th>
                        <th>Denda</th>
                        <th class="td-actions text-right">Action</th>
                      </tr>
                    </thead>

                    <tbody>


                     <?php if(empty($pendapatan)){ ?>
                      <tr>
                        <td colspan="6">Data Kosong</td>
                      </tr>
                    <?php }else{
                      $no=0;
                      foreach($pendapatan as $value){ $no++;?>
                        <tr>
                          <td><?php echo $value->no_invoice;?></td>
                          <td><?php echo $value->no_sewa;?></td>
                          <td><?php echo $value->tanggal;?></td>
                          <td><?php echo number_format($value->jml_bayar,2,',','.');?></td>
                          <td><?php echo number_format($value->air,2,',','.');?></td>
                          <td><?php echo number_format($value->adm,2,',','.');?></td>
                          <td><?php echo number_format($value->sampah,2,',','.');?></td>
                          <td><?php echo number_format($value->denda,2,',','.');?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo site_url('membersewa/edit/')."?member_sewa=".$value->no_sewa; ?>"><i class="tim-icons icon-cloud-download-93" ></i></a>
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url('membersewa/DeletePendapatan/')."?pendapatan=".$value->no_tran; ?>"><i class="tim-icons icon-trash-simple"></i></a></td>
                          </tr>
                          <?php
                        }
                      }
                      ?>

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <?php $this->load->view('template/v_footer');?>

