<?php
($hasilujian->NAMA_PROGRAM ? $prog = $hasilujian->NAMA_PROGRAM : $prog = '');
($hasilujian->EMAIL ? $mail = $hasilujian->EMAIL : $mail = '-');

?>
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


        <table width="1100px" border="0" style="font-size:19px;">
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
        </table>
        <hr>
        <br>
        <br>
        <br>
        <br>
        <br>

        <table width="1100px" border="0">
            <tr>
            <td  valign="top" align="Center"><div style="font-size:25px;"><strong><u>REPORT HASIL UJIAN</u><br>  </strong></div> 
            </td>
            <br/>
            </tr>
            </table>
            <br>

<style type="text/css">
  .center{
    text-align: center !important;
  }
</style>
                <center>
                <table class="tg" width='100%'>
                  <tr>
                    <td class="tg-0pky">Nama Siswa</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo $hasilujian->NAMA;?></td>
                  </tr>
                  <tr>
                    <td class="tg-0pky">Email</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo $mail;?></td>
                  </tr>
                  <tr>
                    <td class="tg-0pky">Nama Ujian</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo $hasilujian->NAMA_UJIAN;?></td>
                  </tr>
                  <tr>
                    <td class="tg-0pky">Kelas</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo $hasilujian->KELAS.' '.$hasilujian->NAMA_JENJANG.' '.$prog;?></td>
                  </tr>
                  <tr>
                    <td class="tg-0pky">Mata Pelajaran</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo $hasilujian->NAMA_MAPEL;?></td>
                  </tr>
                  <tr>
                    <td class="tg-0pky">Tanggal Ujian</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo complete_tanggal_indo($hasilujian->TGL_MULAI_UJIAN);?></td>
                  </tr>
                  <tr>
                    <td class="tg-0pky">Durasi Ujian</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo $hasilujian->DURASI_UJIAN_MENIT.' Menit';?></td>
                  </tr>
                  <tr>
                    <td class="tg-0pky">Total Soal</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo ($hasilujian->TOTAL_BENAR+$hasilujian->TOTAL_SALAH+$hasilujian->TOTAL_TIDAKJAWAB);?></td>
                  </tr>
                  <tr>
                    <td class="tg-0pky">Jawaban Benar</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo $hasilujian->TOTAL_BENAR;?></td>
                  </tr>
                  <tr>
                    <td class="tg-0pky">Jawaban Salah</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo $hasilujian->TOTAL_SALAH;?></td>
                  </tr>
                  <tr>
                    <td class="tg-0pky">Jawaban Kosong</td>
                    <td class="tg-0pky">:</td><td class="tg-0pky"><?php echo $hasilujian->TOTAL_TIDAKJAWAB;?></td>
                  </tr>
                  <tr>
                    <td  style="font-size: 25px!important;">Nilai</td>
                    <td class="tg-0pky" style="font-size: 25px!important;">:</td><td  style="font-size: 25px!important;"><?php echo $hasilujian->TOTAL_SCORE;?></td>
                  </tr>
                   <!-- <tr>
                    <td class="tg-0pky">Negative marks:</td>
                    <td >
                      <div style="float:left"><i class="icon-ok-sign icon-2x"></i>&nbsp;&nbsp;1</div>
                    </td>
                  </tr> -->
                </table>
                </center>
              