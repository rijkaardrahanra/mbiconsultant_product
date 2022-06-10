  <!-- Start Main Content -->
  <div class="main-content">
    <div class="container-fluid" >
      <div class="row-fluid">
        <div class="area-top clearfix">
          <div class="pull-left header">
            <h3 class="title"><i class="icon-desktop"></i>Dashboard Klien</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid padded">
      <div class="container-fluid padded">
        <div class="row-fluid">
          <div class="span30">
            <div class="action-nav-normal">
              <!-- <div class="row-fluid">
                <div class="span2 action-nav-button">
                  <a href="home.php">
                  <i class="icon-desktop"></i>
                  <span>Dashboard</span>
                  </a>
                </div>
                <div class="span2 action-nav-button">
                  <a href="<?php echo base_url()?>">
                  <i class="icon-male"></i>
                  <span>Peserta</span>
                  <span class="label badge-inverse">T:0</span>
                  <span class="label-active label-total">A:0</span>
                  </a>
                </div>
                <div class="span2 action-nav-button">
                  <a href="exam.php">
                  <i class="icon-book"></i>
                  <span>Ujian</span>
                  <span class="label label-total">T:0</span>
                  <span class="label-active label-total">A:0</span>
                  </a>
                </div>
                <div class="span2 action-nav-button">
                  <a href="question_add_sort.php">
                  <i class="icon-question-sign"></i>
                  <span>Pertanyaan</span>
                  <span class="label label-total">T:0</span>
                  <span class="label-active label-total">A:0</span>
                  </a>
                </div>
                <div class="span2 action-nav-button">
                  <a href="notice.php">
                  <i class="icon-list-ol"></i>
                  <span>Pesan</span>
                  <span class="label label-total">T:0</span>
                  <span class="label-active label-total">A:0</span>
                  </a>
                </div>
                <div class="span2 action-nav-button">
                  <a href="notice_admin.php">
                  <i class="icon-inbox"></i>
                  <span>Pesan Masuk</span>
                  <span class="label label-total">T:0</span>
                  </a>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span2 action-nav-button">
                  <a href="contact.php">
                  <i class="icon-envelope"></i>
                  <span>Contact</span>
                  </a>
                </div>
              </div> -->
              <div class="row-fluid">
               <!--  <div class="span6">
                  <div class="box">
                    <div class="box-header">
                      <span class="title"><i class="icon-reorder"></i>&nbsp;Jenjang</span>
                    </div>
                    <div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">
                      <div class="box-section news with-icons">
                        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                        <script type="text/javascript">
                          // Load the Visualization API and the piechart package.
                          google.load('visualization', '1.0', {'packages':['corechart']});

                          // Set a callback to run when the Google Visualization API is loaded.
                          google.setOnLoadCallback(drawChart);

                          // Callback that creates and populates a data table,
                          // instantiates the pie chart, passes in the data and
                          // draws it.
                          function drawChart() {

                          // Create the data table.
                          var data = new google.visualization.DataTable();
                          data.addColumn('string', 'Topping');
                          data.addColumn('number', 'Slices');

                          data.addRows([

                          ['M.com',0],['MA',0],['B.sc',0],['M.sc',0],['BA',0],['5th Standard',0],['10th standard',0],['10th standard',0],['SD',0],['TK(Taman Kanak-kanak)',0],['SD (Sekolah Dasar)',0],['SMP (Sekolah Menengah Pertama)',0],['SMA (Sekolah Menengah Atas/Kejuruan)',0],['Akademi',0],['Institut',0],['Politeknik',0],['Sekolah Tinggi',0],['Universitas',0],['Jenjang Baru',0],['SD Kelas 4',0],['tes',0],
                          ]);

                          // Set chart options
                          var options = {'title':'Bagan yang menggambarkan jumlah siswa di setiap jenjang', 'width':450,'height':300};

                          // Instantiate and draw our chart, passing in some options.
                          var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                          chart.draw(data, options);
                          }
                        </script>
                        <!--Div that will hold the pie chart-->
                        <div id="chart_div"></div>
                      </div>
                    </div>
                  </div>
               <!--  </div> 
                <div class="span6">
                  <div class="box">
                    <div class="box-header">
                      <span class="title"><i class="icon-reorder"></i>&nbsp;Ujian</span>
                    </div>
                    <div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">
                      <div class="box-section news with-icons">
                        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                        <script type="text/javascript">
                          // Load the Visualization API and the piechart package.
                          google.load('visualization', '1.0', {'packages':['corechart']});
                          // Set a callback to run when the Google Visualization API is loaded.
                          google.setOnLoadCallback(drawChart);
                          // Callback that creates and populates a data table,
                          // instantiates the pie chart, passes in the data and
                          // draws it.
                          function drawChart() {
                          // Create the data table.
                          var data = new google.visualization.DataTable();
                          data.addColumn('string', 'Topping');
                          data.addColumn('number', 'Slices');
                          data.addRows([      
                          ['Ujian SMA Now',0],['satya Ipa hokya',0],
                          ]);
                          // Set chart options
                          var options = {'title':'Bagan yang menggambarkan ujian yang dilakukan oleh peserta dalam 7 hari terakhir', 'width':450,'height':300};
                          // Instantiate and draw our chart, passing in some options.
                          var chart = new google.visualization.PieChart(document.getElementById('chart_div_exam'));
                          chart.draw(data, options);
                          }
                        </script>
                        <!--Div that will hold the pie chart-->
                        <div id="chart_div_exam"></div>
                      </div>
                    </div>
                  </div>
               <!--  </div>  -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>