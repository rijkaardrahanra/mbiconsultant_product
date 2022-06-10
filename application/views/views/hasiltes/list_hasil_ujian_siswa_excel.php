<style>

            table.gridtable {
                font-family: Times New Roman;
                font-size:15px;
                color:#000000;
                border-width: 1px;
                border-collapse: collapse;
    
            }

            table.gridtable th {
                border-width: 1px;
                padding: 2px;
                border-style: solid;
                border-color: #666666;
                background-color: #dedede;
                font-weight:bold;
            }

            table.gridtable td {
                border-width: 1px;
                padding: 1px;
                border-style: solid;
                border-color: #666666;
                background-color: #ffffff;
            }

            table.gridtable2 {
                margin-top:20px;
                font-family: Times New Roman;
                font-size:10px;
                color:#333333;
                border-width: 1px;
                border-color: #666666;
                border-collapse: collapse;
    
            }

            table.gridtable2 th {
                border-width: 1px;s
                padding: 2px;
                border-style: solid;
                border-color: #666666;
                background-color: #dedede;
                font-weight:bold;
            }

            table.gridtable2 td {
                border-width: 0px;
                padding: 0px;
                font-size:8px;
                border-style: solid;
                border-color: #666666;
                background-color: #ffffff;
            }

        </style>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;border-color:black;}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>


        <!-- <table width="1100px" border="0" style="font-size:19px;">
            <tr>
              <td width="50" height="73" valign="top" align="left">           
                  <img src="<?php echo site_url('images/cbtl.png'); ?>" height="120px" >
              </td>    
              <td width="150" align="left"  valign="top" style="font-size:32px;">
              <strong>CBT - Solution</strong>
              <div style="font-size:20px;">The Best Solution For Your Test<br>
              </div></style>
              </td>
            </tr>
        </table> -->
       
      
        <br>

        <table width="1100px" border="0">
          <tr>
            <td   colspan="9" align="center"><div style="font-size:25px;"><strong><u>DAFTAR SISWA <br> UJIAN <?php echo $paketujian[0]->NAMA_UJIAN;?></u><br>  </strong></div> 
            </td>
            <br>
          </tr>
        </table>
            <br>
            <br>
             <table border="0" width="100%">
            <tbody>
             
              <tr>
                <td colspan="2">Mata Pelajaran</td>
                <td>:</td>
                <td align="left"><?php echo $paketujian[0]->NAMA_MAPEL;?></td>
              </tr>
              <tr>
                <td colspan="2">Kelas</td>
                <td>:</td>
                <td align="left"><?php echo $paketujian[0]->KELAS;?></td>
              </tr>

               <tr>
                <td colspan="2">Program</td>
                <td>:</td>
                <td align="left"><?php echo $paketujian[0]->NAMA_PROGRAM;?></td>
              </tr>
              
              <tr>
                <td colspan="2">Tanggal Ujian</td>
                <td>:</td>
                <td align="left"><?php echo complete_tanggal_indo($paketujian[0]->TGL_MULAI_UJIAN); ?></td>
              </tr>
              <tr>
                <td colspan="2">Durasi Ujian</td>
                <td>:</td>
                <td align="left"><?php echo $paketujian[0]->DURASI_UJIAN_MENIT; ?> Menit</td>
              </tr>
              
            </tbody>
          </table>
            <br>

<style type="text/css">
  .center{
    text-align: center !important;
  }
</style>
                <center>
                <table class="gridtable" width='100%' border="1">
                  <tr>                   
                      <th align="center"><div>No</div></th>
                      <th align="center"><div>Nama Siswa</div></th>
                      <th align="center"><div>Jenjang</div></th>
                      <th align="center"><div>Kelas</div></th>
                      <th align="center"><div>Program</div></th>               
                      <th align="center"><div>Total Benar</div></th>
                      <th align="center"><div>Total Salah</div></th>
                      <th align="center"><div>Tidak Dijawab</div></th>
                      <th align="center"><div>Total Score</div></th>
                     
                  </tr>
                <?php  $no=1;
               foreach ($list_siswa as $row) {
                ?>
                  <tr>
                    <td align="center" ><?php echo $no;?></td>
                    <td align="left" ><?php echo $row->NAMA;?></td>
                    <td align="center" ><?php echo $row->NAMA_JENJANG;?></td>
                    <td align="center" ><?php echo $row->KELAS;?></td>
                    <td align="center" ><?php echo $row->NAMA_PROGRAM;?></td>                  
                    <td align="center" ><?php echo $row->TOTAL_BENAR;?></td>
                    <td align="center" ><?php echo $row->TOTAL_SALAH;?></td>
                    <td align="center" ><?php echo $row->TOTAL_TIDAKJAWAB;?></td>
                    <td align="center" ><?php echo $row->TOTAL_SCORE;?></td>

                  </tr>
                <?php $no++; } ?>

                  
                   <!-- <tr>
                    <td class="tg-0pky">Negative marks:</td>
                    <td >
                      <div style="float:left"><i class="icon-ok-sign icon-2x"></i>&nbsp;&nbsp;1</div>
                    </td>
                  </tr> -->
                </table>
                </center>
              