
<style type="text/css">
  .hide{
    display: none !important;
  }
  .center{
    text-align: center !important;
  }
  .warning{
    font-size: 12px;
  }
</style>
  <!-- Start Main Content -->
  <div class="main-content">
    <div class="container-fluid" >
      <div class="row-fluid">
        <div class="area-top clearfix">
          <div class="pull-left header">
            <h3 class="title"><i class="icon-edit"></i>Bank Pertanyaan</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Container Box-->
    <div class="container-fluid padded">
      <!-- Start Box-->
      <div class="box">

        <div class="padded" style="padding-top: 2em;padding-bottom: 20px;">
        </div>
      
        <div class="box-header">
          <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
              <a href="#banktanya" data-toggle="tab">
              <i class="icon-folder"></i>Bank Pertanyaan
              </a>
            </li>
            <li>
              <a href="#addtanya" data-toggle="tab">
              <i class="icon-folder"></i>Tambah Pertanyaan
              </a>
            </li>
          </ul>
        </div>
        <div class="box-content padded">
          <div class="tab-content">
          <!-- start bank tanya -->
            <div class="tab-pane box active" id="banktanya">
           <!-- end bank tanya -->
           			<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>No</th>
							<th><div>Pertanyaan</div></th>  
							<th><div>Status</div></th> 
                    		<th><div>Pilihan</div></th>
						</tr>
					</thead>
                    <tbody>
							<?php 							
								$query=mysqli_query($con,"SELECT * FROM question where status_aktif='1' and s_id='".$_GET['s_id']."' order by q_id DESC");
								$i=0;
								while($row=mysqli_fetch_array($query))
								{ 
									
									$i++;
										
							?>
								<tr>
								<td><?php echo $i;?></td>
								<td>
								<table border="0">
									<tr>
										<td>Nama Ujian</td>
										<td>Pertanyaan</td>
									</tr>
									<tr>
										<td>Jenis Pertanyaan</td>
										<td>	
											<div class="Table">									
												<div class="Heading">
													<div class="Cell">
														<p> No  </p>
													</div>
													<div class="Cell">
														<p> Benar </p>
													</div>
													<div class="Cell">
														<p> Pilih</p>
													</div>										
												</div>
												<?php if($row['typeofquestion']=="Single"){

												if($row['option_a']!='' || $row['option_a']!=NULL){
													?>
												<div class="Row">
													<div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_A');?>
													</div>
													<div class="Cell">
														<input type="radio" name="correct_ans_<?php echo $row['q_id'];?>" value="A" <?php if($row['correct_ans']=='A'){echo 'checked="checked"';}?>>
													</div>
													<div class="Cell">
														<p><?php echo $row['option_a'];?></p>
													</div>										
												</div>
												<?php
												}
												if($row['option_b']!='' || $row['option_b']!=NULL){ ?>
												<div class="Row">
													<div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_B');?>
													</div>
													<div class="Cell">
														<input type="radio" name="correct_ans_<?php echo $row['q_id'];?>" value="B" <?php if($row['correct_ans']=='B'){echo 'checked="checked"';}?>>
													</div>
													<div class="Cell">
														<p><?php echo $row['option_b'];?></p>
													</div>													
												</div>
												<?php
												}
												if($row['option_c']!='' || $row['option_c']!=NULL){ ?>
												<div class="Row">
													<div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_C');?>
													</div>
													<div class="Cell">
														<input type="radio" name="correct_ans_<?php echo $row['q_id'];?>" value="C" <?php if($row['correct_ans']=='C'){echo 'checked="checked"';}?>>
													</div>
													<div class="Cell">
														<p><?php echo $row['option_c'];?></p>
													</div>										
												</div>
												<?php
												}
												if($row['option_d']!='' || $row['option_d']!=NULL){ ?>
												<div class="Row">
													<div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_D');?>
													</div>
													<div class="Cell">
														<input type="radio" name="correct_ans_<?php echo $row['q_id'];?>" value="D" <?php if($row['correct_ans']=='D'){echo 'checked="checked"';}?>>
													</div>
													<div class="Cell">
														<p><?php echo $row['option_d'];?></p>
													</div>
												</div>
												<?php
												}
												if($row['option_e']!='' || $row['option_e']!=NULL){ ?>
												<div class="Row">
													<div class="Cell">
														<?php echo constant('TI_LABEL_QUESTION_CHOICES_E');?>
													</div>
													<div class="Cell">
														<input type="radio" name="correct_ans_<?php echo $row['q_id'];?>" value="E" <?php if($row['correct_ans']=='E'){echo 'checked="checked"';}?>>
													</div>
													<div class="Cell">
														<p><?php echo $row['option_e'];?></p>
													</div>
												</div>
												<?php } ?>



									<?php } if($row['typeofquestion']=="Multiple"){			
									

										if($row['correct_ans']!="")
										{
											$explode_correct_ans=explode("-",$row['correct_ans']);
										}
										
										if($row['option_a']!='' || $row['option_a']!=NULL){
										?>
										<div class="Row">
										<div class="Cell">
											<?php echo constant('TI_LABEL_QUESTION_CHOICES_A');?>
										</div>
										<div class="Cell">
										<input type="checkbox" name="correct_ans_A" value="A" <?php if($explode_correct_ans[0]=='A'){echo 'checked="checked"';}?>>
										</div>
										<div class="Cell">
											<p><?php echo $row['option_a'];?></p>
										</div>
										<?php
										}
										if($row['option_b']!='' || $row['option_b']!=NULL){ ?>
										</div>
										<div class="Row">
											<div class="Cell">
												<?php echo constant('TI_LABEL_QUESTION_CHOICES_B');?>
											</div>
											<div class="Cell">
											
											<input type="checkbox" name="correct_ans_B" value="B" <?php if($explode_correct_ans[1]=='B'){echo 'checked="checked"';}?>>
											</div>
											<div class="Cell">
												<p><?php echo $row['option_b'];?></p>
											</div>
										</div>
										<?php
										}
										if($row['option_c']!='' || $row['option_c']!=NULL){ ?>
										<div class="Row">
											<div class="Cell">
												<?php echo constant('TI_LABEL_QUESTION_CHOICES_C');?>
											</div>
											<div class="Cell">											
												<input type="checkbox" name="correct_ans_C" value="C" <?php if($explode_correct_ans[2]=='C'){echo 'checked="checked"';}?>>
											</div>
											<div class="Cell">
												<p><?php echo $row['option_c'];?></p>
											</div>
										</div>
										<?php
										}
										if($row['option_d']!='' || $row['option_d']!=NULL){ ?>
										<div class="Row">
											<div class="Cell">
												<?php echo constant('TI_LABEL_QUESTION_CHOICES_D');?>
											</div>
											<div class="Cell">
												<input type="checkbox" name="correct_ans_D" value="D" <?php if($explode_correct_ans[3]=='D'){echo 'checked="checked"';}?>>
											</div>
											<div class="Cell">
												<p><?php echo $row['option_d'];?></p>
											</div>
										</div>
										<?php
										}
										if($row['option_e']!='' || $row['option_e']!=NULL){ ?>
										<div class="Row">
											<div class="Cell">
												<?php echo constant('TI_LABEL_QUESTION_CHOICES_E');?>
											</div>
											<div class="Cell">
												<input type="checkbox" name="correct_ans_E" value="E" <?php if($explode_correct_ans[4]=='E'){echo 'checked="checked"';}?>>
											</div>
											<div class="Cell">
												<p><?php echo $row['option_e'];?></p>
											</div>
										</div>

									<?php } }?>




								</div>				
								</td>
								</tr>
								<tr><td>Tetapkan Point</td><td></td></tr>								
								</table>				
								</td>
								<td>
								<?php
									if($row['question_status']==1)
									{?>														

									<a data-toggle="modal" href="#modal-status-deactive" onclick="modal_status_deactive('question_status.php?q_id=<?php echo $row['q_id'];?>&s_id=<?php echo $_GET['s_id'];?>')" class="btn btn-red btn-small"><i class="icon-eye-close"></i> <button class="btn-small btn-green" disabled>Tambah Pertanyaan</button></a>
									<?php }
									else
									{?>														

									<a data-toggle="modal" href="#modal-status-active" onclick="modal_status_active('question_status.php?q_id=<?php echo $row['q_id'];?>&s_id=<?php echo $_GET['s_id'];?>')" class="btn btn-green btn-small"><i class="icon-eye-open"></i> <button class="btn-small btn-green">Tambah Pertanyaan</button></a>
									<?php }?>	
								</td>






								<td align="center">
								<a data-toggle="modal" href="question_edit.php?q_id=<?php echo $row['q_id'];?>&s_id=<?php echo $row['s_id'];?>"  class="btn btn-gray btn-small"><i class="icon-wrench"></i> <button class="btn-small btn-blue">Edit</button></a>

								<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('question_delete.php?q_id=<?php echo $row['q_id'];?>&s_id=<?php echo $_GET['s_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> <button class="btn-small btn-red">Tambah Pertanyaan</button></a>



								</td>
								</tr>
						<?php } ?>
                                
							</tbody>
                </table>
            <!-- start add tanya -->
            </div>

            <div class="tab-pane box active" id="addtanya">
            <!-- end add tanya -->   
            </div>
          </div>
        </div>
      </div>
      <!-- End Box-->
    </div>
    <!-- End Container Box-->
  </div>
  <!-- End Main Content -->
</div>
<!-- End Div Main Body -->



