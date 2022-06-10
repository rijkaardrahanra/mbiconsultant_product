<?php
header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=data-siswa.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");

?>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aaa;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:#aaa;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:#aaa;color:#fff;background-color:#f38630;}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>

<style type="text/css">
  .hide{
    display: none !important;
  }
  .center{
    text-align: center !important;
  }
</style>

           <table class="tg"  border='1' width="100%">
            <thead>
              <tr>
                <th class="tg-c3ow"><div>No</div></th>
                <th class="tg-c3ow"><div>Nama</div></th>
                <th class="tg-c3ow"><div>Username</div></th>
                <th class="tg-c3ow"><div>Password</div></th>
                <th class="tg-c3ow"><div>Kelas</div></th>
                <th class="tg-c3ow"><div>Alamat</div></th>
                <th class="tg-c3ow"><div>Telepon</div></th>
                <th class="tg-c3ow"><div>Email</div></th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
                foreach ($siswa as $siswa) {
              ?>
                <tr>
                
                  <td class="tg-0pky"><?php echo $no;  ?></td>
                  <td class="tg-0pky"><?php echo $siswa->NAMA;  ?></td>
                  <td class="tg-0pky"><?php echo $siswa->USERNAME;  ?></td>
                  <td class="tg-0pky"><center>12345678</center></td>
                  <td class="tg-0pky"><?php echo $siswa->KELAS;  ?> <?php echo $siswa->NAMA_PROGRAM;  ?></td>
                  <td class="tg-0pky"><?php echo $siswa->ADDRESS;  ?></td>
                  <td class="tg-0pky"><?php echo $siswa->PHONE;  ?></td>
                  <td class="tg-0pky"><?php echo $siswa->EMAIL;  ?></td>
                  
                </tr>
              <?php
                $no++;}
              ?>
            </tbody>
            </table>
           