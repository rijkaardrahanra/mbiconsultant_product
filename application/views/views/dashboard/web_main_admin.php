  <!-- Start Main Content -->
  <div class="main-content">
    <div class="container-fluid" >
      <div class="row-fluid">
        <div class="area-top clearfix">
          <div class="pull-left header">
            <h3 class="title"><i class="icon-desktop"></i>Dashboard Admin</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid padded">
      <div class="container-fluid padded">
        <div class="row-fluid">
          <div class="span30">
            <div class="action-nav-normal">
              <div class="row-fluid">              
                <div class="tab-content">
                  <div class="tab-pane box active" id="add" style="padding: 5px">
                    <div class="box-content">
                      <table id="tblJadwalUjian" cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                        <thead>
                          <tr>
                              <th><div>No.  </div></th>
                              <th><div>Nama Klien</div></th>
                              <th><div>Nama Paket Ujian</div></th>
                              <!-- <th><div>Tanggal Ujian</div></th> -->
                              <th><div>Tanggal Ujian</div></th>
                              <th><div>Tanggal Selesai</div></th>
                              <th><div>Durasi Ujian</div></th>
                              <th><div>Total Kuota</div></th>
                              <th><div>Sisa Kuota</div></th>
                              <!--<th><div>Mata Pelajaran</div></th> -->
                              <th><div>Status</div></th>
                              <!-- <th><div>Bab</div></th> -->
                              <!-- <th><div>Aksi</div></th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1;
                           foreach ($ujian->result() as $key) {?>
                            <tr>
                              <td><?php echo$no; ?></td>
                              <td><div class="nmKlien"><?php echo$key->NAMA; ?></div></td>
                              <td><div class="nmujian"><?php echo$key->NAMA_UJIAN; ?></div></td>
                              <!-- <td><div class="tglpelaksana"><?php echo complete_tanggal_indo($key->TGL_MULAI_UJIAN); ?></div></td> -->
                              <td><div class="tglpelaksana"><?php echo complete_tanggal_indo($key->TGL_PELAKSANAAN); ?></div></td>
                              <td><div class="tglpelaksana"><?php echo complete_tanggal_indo($key->TGL_SELESAI); ?></div></td>
                              <td><div class="durasi"><?php echo$key->DURASI_UJIAN_MENIT; ?> Menit</div></td>
                              <td><div class="durasi"><?php echo$key->TOTAL_KUOTA; ?> Peserta</div></td>
                              <td><div class="durasi"><?php echo$key->SISA_KUOTA; ?> Peserta</div></td>
                             <!--  <td><div class="mapel"><?php echo$key->NAMA_MAPEL; ?></div></td> -->
                              <td><div class="mapel"><?php
                          if($key->IS_ACTIVATED == 1)
                          {?>                           

                          <a data-toggle="modal" href="#modal-status-deactive"  class="btn btn-red btn-small"><i class="icon-eye-close"></i> Activated</a>
                          <?php }
                          else
                          {?>                           

                          <a data-toggle="modal" href="#modal-status-active"  class="btn btn-green btn-small"><i class="icon-eye-open"></i> Deactivated</a>
                          <?php }?> </div></td>
                              <!-- <td>
                                <div class="bab">
                                  <?php
                                    $namabab = '';
                                    if($key->MP_MAPEL_ID){
                                      foreach ($babs as $bab) {
                                        if ($bab->MP_MAPEL_ID==$key->MP_MAPEL_ID) {
                                          if(substr_count($key->BAB, ',')>=1){
                                            $explode_bab=explode(',',$key->BAB);
                                            if(in_array($bab->BB_BAB_ID, $explode_bab)){
                                              $namabab .= $bab->NAMA_BAB.', ';
                                            }
                                          }else{
                                            if ($key->BAB==$bab->BB_BAB_ID) {
                                              $namabab = $bab->NAMA_BAB.', ';
                                            }
                                          }
                                        }
                                      }
                                      echo CapitalizeEachWord(substr($namabab,0,-2));
                                    }else{
                                      echo '-';
                                    }
                                  ?>
                                </div>
                              </td> -->
                             <!--  <td>
                                <a href="" class="btn btn-gray">Mulai Tes</a>
                               
                              </td> -->
                          </tr>
                         <?php $no++; } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>            
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>