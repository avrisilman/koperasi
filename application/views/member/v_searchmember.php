  <?php $this->load->view('template/v_header');?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="card-title">LIST MEMBER</h4>

            <?php echo form_open("member/search");?>    
            <table>
              <tr>
               <td><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Shoty By</button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="<?php echo base_url();?>member/shortbybulan">Member Bulan</a>
                          <a class="dropdown-item" href="<?php echo base_url();?>member/shortjk">Jenis Kelamin</a>
                          <a class="dropdown-item" href="<?php echo base_url();?>member/shortdept">Departement</a>
                          <a class="dropdown-item" href="<?php echo base_url();?>member/shortanggota">Status Anggota</a>
                          <a class="dropdown-item" href="<?php echo base_url();?>member/shortpinjamanbulan">Pinjaman Bulan</a>
                          <a class="dropdown-item" href="<?php echo base_url();?>member/shortpeminjambaru">Peminjam Baru</a>
                        </div>
                    </td>
              <td><a href="<?php echo base_url();?>member/input"><i class="tim-icons icon-simple-add" style="font-size: 30px;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
                  <th>Jenis Kelamin</th>
                  <th>Departemen</th>
                  <th>Status</th>
                  <th class="td-actions text-right">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach($member as $value){
                  ?> 
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $value->member_id;?></td>
                    <td><?php echo $value->nama;?></td>
                    <td><?php echo $value->sex;?></td>
                    <td><?php echo $value->dept;?></td>
                    <td><?php echo $value->aktif;?></td>
                    <td class="td-actions text-right">
                      <?php if ($value->statuspinjaman == 1) {
                        echo "<a href='Inputpinjaman/".$value->member_id."' style='font-size:11px;'><i class='tim-icons icon-simple-add'></i>&nbsp;Pinjaman</a> | <a href='Inputsimpanan/".$value->member_id."' style='font-size:11px;'><i class='tim-icons icon-simple-add'></i>&nbsp;Simpanan</a>";
                      }else{
                        echo "<a href='Inputsimpanan/".$value->member_id."' style='font-size:11px;'><i class='tim-icons icon-simple-add'></i>&nbsp;Simpanan</a></a>";
                      } ;?>

                     &nbsp;|&nbsp; 
                     <a href="<?php echo site_url('member/edit/')."?member=".$value->member_id; ?>"><i class="tim-icons icon-pencil" ></i></a>
                     &nbsp;&nbsp;|&nbsp;&nbsp;
                     <a href="<?php echo site_url('member/delete/')."?member=".$value->member_id; ?>"><i class="tim-icons icon-trash-simple"></i></a>
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
     <!--  <div class="card ">
        <div class="card-header">
          <h4 class="card-title">LIST SIMPANAN</h4>
        </div>
        <div class="card-body" style="background: #b2b2b2;">
          <div class="table-responsive">
            <table class="table tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th style="font-size: 11px;">No</th>
                  <th style="font-size: 11px;">No. Karyawan</th>
                  <th style="font-size: 11px;">Nama</th>
                  <th style="font-size: 11px;">Tanggal</th>
                  <th style="font-size: 11px;">Simpanan Pokok</th>
                  <th style="font-size: 11px;">Simpanan Wajib</th>
                  <th style="font-size: 11px;">Simpanan Sukarela</th>
                  <th style="font-size: 11px;">Status</th>
                  <th class="td-actions text-right">Action</th>
                </tr>
              </thead>
              <tbody>

               
                  <?php if(empty($angsuran)){ ?>
                    <tr>
                      <td colspan="6">Data Kosong</td>
                    </tr>
                  <?php }else{
                    $no=0;
                    foreach($angsuran as $value){ $no++;?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $value->member_id;?></td>
                        <td><?php echo $value->nama;?></td>
                        <td><?php echo $value->tanggalangs;?></td>
                        <td><?php echo $value->simpokok;?></td>
                        <td><?php echo $value->simwajib;?></td>
                        <td><?php echo $value->simrela;?></td>
                        <td><?php echo $value->status;?></td>
                        <td class="td-actions text-right">
                          <a href="<?php echo site_url('simpanan/delete/')."?angsuran=".$value->member_id; ?>"><i class="tim-icons icon-trash-simple"></i></a>
                          |
                          <a href="<?php echo site_url('simpanan/cetak/')."?angsuran=".$value->member_id; ?>"><i class="tim-icons icon-cloud-download-93"></i></a>
                        </td>

                      </tr>
                      <?php
                    }
                  }
                  ?>


                </tbody>
              </table>

            </div>
          </div>

        </div> -->
      </div>

    </div>

  </div>
  <?php $this->load->view('template/v_footer');?>

