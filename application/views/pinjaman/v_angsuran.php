<?php $this->load->view('template/v_header');?>
  <!-- for pinjaman -->
  <div class="content">
<div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title">LIST PINJAMAN</h4>

            <?php echo form_open("pinjaman/search");?>    
            <table>
              <tr>
             
             <!--  <td>&nbsp;&nbsp;<a href="<?php echo base_url();?>pinjaman/input"><i class="tim-icons icon-simple-add" style="font-size: 30px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
              <td><input type="text" class="form-control" placeholder="Masukan Nama" name="nama" value="<?php echo $this->input->post('nama');?>" ></td>
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
                  <th>No</th>
                  <th>No. Karyawan</th>
                  <th>Nama</th>
                  <th>Jenis Pinjaman</th>
                  <th>Jumlah</th>
                  <th>Tenor</th>
                  <th>Jumlah Angsuran</th>
                  <th>Jasa Pinjaman</th>
                  <th class="td-actions text-right">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach($pinjaman as $value){
                  ?> 
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $value->member_id;?></td>
                    <td><?php echo $value->nama;?></td>
                    <td><?php echo $value->jenis_pinjaman;?></td>
                    <td><?php echo number_format($value->jmlpinjaman,2,',','.');?></td>
                    <td><?php echo $value->tenor;?></td>
                    <td><?php echo number_format(($value->jmlpinjaman/$value->tenor),2,',','.');?></td>
                    <td><?php echo number_format((($value->jmlpinjaman)/100)*$value->bunga,2,',','.');?></td>
                    <td class="td-actions text-right">

                      <i class="tim-icons icon-simple-add" data-toggle="dropdown"></i>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo site_url('pinjaman/angsuran/')."?pinjaman=".$value->no_pinjam; ?>">Bayar Angsuran</a>
                        <a class="dropdown-item" href="<?php echo site_url('pinjaman/inputwitdrawal/')."?pinjaman=".$value->member_id; ?>">Penarikan Simpanan</a>
                      </div>&nbsp;&nbsp;|&nbsp;&nbsp;
                      <a href="<?php echo site_url('pinjaman/edit/')."?pinjaman=".$value->no_pinjam; ?>"><i class="tim-icons icon-pencil" ></i></a>
                      &nbsp;&nbsp;|&nbsp;&nbsp;
                      <a href="<?php echo site_url('pinjaman/delete/')."?pinjaman=".$value->member_id; ?>"><i class="tim-icons icon-trash-simple"></i></a>
                      &nbsp;|&nbsp;
                       <a href="<?php echo site_url('pinjaman/CetakPinjaman/')."?pinjaman=".$value->member_id; ?>"><i class="tim-icons icon-cloud-download-93"></i></a>
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

<!-- for angsuran -->
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
            <h4 class="card-title">LIST ANGSURAN & SIMPANAN</h4>
        </div>
      <div class="card-body" style="background: #b2b2b2;">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th style="font-size: 11px;">No</th>
                <th style="font-size: 11px;">No. Karyawan</th>
                <th style="font-size: 11px;">Nama</th>
                <th style="font-size: 11px;">Jenis Pinjaman</th>
                <th style="font-size: 11px;">Tgl Angsuran</th>
                <th style="font-size: 11px;">Dept</th>
                <th style="font-size: 11px;">Jml Angsuran</th>
                <th style="font-size: 11px;">Jasa</th>
                <th style="font-size: 11px;">Pokok</th>
                <th style="font-size: 11px;">Wajib</th>
                <th style="font-size: 11px;">Sukarela</th>
                <th class="td-actions text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach($angsuran as $value){
                ?> 
                <tr>
                  <td style="font-size: 11px;"><?php echo $no;?></td>
                  <td style="font-size: 11px;"><?php echo $value->member_id;?></td>
                  <td style="font-size: 11px;"><?php echo $value->nama;?></td>
                  <td style="font-size: 11px;"><?php echo $value->jenis_pinjaman;?></td>
                  <td style="font-size: 11px;"><?php echo $value->tanggalangs?></td>
                  <td style="font-size: 11px;"><?php echo $value->dept;?></td>
                  <td style="font-size: 11px;"><?php echo number_format(($value->jmlpinjaman/$value->tenor),2,',','.');?></td>
                  <td style="font-size: 11px;"><?php echo number_format((($value->jmlpinjaman)/100)*$value->bunga,2,',','.');?></td>
                  <td style="font-size: 11px;"><?php echo number_format($value->simpokok,2,',','.');?></td>
                  <td style="font-size: 11px;"><?php echo number_format($value->simwajib,2,',','.');?></td>
                  <td style="font-size: 11px;"><?php echo number_format($value->simrela,2,',','.');?></td>
                  <td class="td-actions text-right">

                   <a href="<?php echo site_url('pinjaman/CetakSimpanan/')."?pinjaman=".$value->no_tran; ?>"><i class="tim-icons icon-cloud-download-93"></i></a> &nbsp; | &nbsp;
                    
                    <a href="<?php echo site_url('pinjaman/delete/')."?pinjaman=".$value->no_pinjam; ?>"><i class="tim-icons icon-trash-simple"></i></a>
                  </td>
                </tr>
                <?php $no++;}?>

                 <?php
                  $no = 1;
                  foreach($member as $value){
                 ?> 
                <tr>
                  <td style="font-size: 11px;"></td>
                  <td style="font-size: 11px;"></td>
                  <td style="font-size: 11px;"></td>
                  <td style="font-size: 11px;background-color: #828282;">Simpanan Perdana</td>
                  <td style="font-size: 11px;background-color: #828282;"><?php echo $value->tanggalangs?></td>
                  <td style="font-size: 11px;background-color: #828282;"></td>
                  <td style="font-size: 11px;background-color: #828282;"></td>
                  <td style="font-size: 11px;background-color: #828282;"></td>
                  <td style="font-size: 11px;background-color: #828282;"><?php echo number_format($value->simpokok,2,',','.');?></td>
                  <td style="font-size: 11px;background-color: #828282;"><?php echo number_format($value->simwajib,2,',','.');?></td>
                  <td style="font-size: 11px;background-color: #828282;"><?php echo number_format($value->simrela,2,',','.');?></td>
                  <td class="td-actions text-right">

                    <a href="<?php echo site_url('pinjaman/CetakSimpanan/')."?pinjaman=".$value->no_tran; ?>"><i class="tim-icons icon-cloud-download-93"></i></a> &nbsp; | &nbsp;
                    <a href="<?php echo site_url('pinjaman/delete/')."?pinjaman=".$value->no_pinjam; ?>"><i class="tim-icons icon-trash-simple"></i></a>
                  </td>
                </tr>
                <?php $no++;}?>

              </tbody>

              <thead class=" text-primary">
              <tr>
                <th style="font-size: 11px;color: #000000;">No</th>
                <th style="font-size: 11px;color: #000000;">No. Karyawan</th>
                <th style="font-size: 11px;color: #000000;">Nama</th>
                <th style="font-size: 11px;"></th>
                <th style="font-size: 11px;color: #000000;">Tgl Penarikan</th>
                <th style="font-size: 11px;"></th>
                <th style="font-size: 11px;"></th>
                <th style="font-size: 11px;"></th>
                <th style="font-size: 11px;"></th>
                <th style="font-size: 11px;"></th>
                <th style="font-size: 11px;"></th>
                <th class="td-actions text-right"></th>
              </tr>
            </thead>
            <tbody>
              
              <?php
              $no = 1;
              foreach($withdrawal as $value){
                ?> 
                <tr>
                  <td style="font-size: 11px;"><?php echo $no;?></td>
                  <td style="font-size: 11px;"><?php echo $value->member_id;?></td>
                  <td style="font-size: 11px;"><?php echo $value->nama;?></td>
                  <td style="font-size: 11px;"></td>
                  <td style="font-size: 11px;"><?php echo $value->tanggal;?></td>
                  <td style="font-size: 11px;"></td>
                  <td style="font-size: 11px;"></td>
                  <td style="font-size: 11px;"></td>
                  <td style="font-size: 11px;"><?php echo number_format($value->simpokok,2,',','.');?></td>
                  <td style="font-size: 11px;"><?php echo number_format($value->simwajib,2,',','.');?></td>
                  <td style="font-size: 11px;"><?php echo number_format($value->simrela,2,',','.');?></td>
                  <td style="font-size: 11px;">
                    <a href="<?php echo site_url('pinjaman/CetakPenarikan/')."?pinjaman=".$value->id_keluar; ?>"><i class="tim-icons icon-cloud-download-93"></i></a>
                      &nbsp;&nbsp;|&nbsp;&nbsp;
                     <a href="<?php echo site_url('pinjaman/deletewithdrawal/')."?pinjaman=".$value->id_keluar; ?>"><i class="tim-icons icon-trash-simple"></i></a>
                  </td>
                  <td style="font-size: 11px;"></td>
                </tr>
                <?php $no++;}?>

              </tbody>

              <tbody>

                 <?php
                   foreach($sum as $value){
                    $angpinjam      = $value->angpinjam;
                    $jasapinjam     = $value->jasapinjam;
                    $simpokok       = $value->simpokok;
                    $simwajib       = $value->simwajib;
                    $simrela        = $value->simrela;
                  }?> 

                 <?php
                   foreach($sum_withdrawal as $value){
                    $wpokok       = $value->wpokok;
                    $wwajib       = $value->wwajib;
                    $wrela        = $value->wrela;
                  }?> 
            
              <?php
              $no = 1;
              foreach($sum as $value){
                ?> 
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><?php echo number_format($angpinjam,2,',','.');?></td>
                  <td><?php echo number_format($jasapinjam,2,',','.');?></td>
                  <td><?php echo number_format(($simpokok-$wpokok),2,',','.');?></td>
                  <td><?php echo number_format(($simwajib-$wwajib),2,',','.');?></td>
                  <td><?php echo number_format(($simrela-$wrela),2,',','.');?></td>
                </tr>
                <?php $no++;}?>
              </tbody> 

            </table>

          </div>
        </div>

      </div>
    </div>

  </div>
</div>
  <?php $this->load->view('template/v_footer');?>

