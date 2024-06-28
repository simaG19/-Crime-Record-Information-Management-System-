<?php 
include('header.php');
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);

  if(isset($_GET['jarchive'])){
    $jarchive=get_safe_value($con,$_GET['jarchive']);
    mysqli_query($con,"update cases set jachive_id='$jarchive' where id='$id'");
    redirect(SITE_PATH.'subadmin/case_detail.php?id='.$id);
  }

  $sql="select cases.*,category from cases,category where cases.category_id=category.id and cases.id='$id' order by cases.id asc";
  $res=mysqli_query($con,$sql);
  if(mysqli_num_rows($res)>0){
    $courtRow=mysqli_fetch_assoc($res);
  }else{
    redirect('index.php');
  }
}else{
  redirect('index.php');
}

?>
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
              <h3 class="page-title"> Case Details </h3>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card px-2">
                <div class="main-carousel">
                  <div class="cell">
                    <div class="card-body">
                      <div class="container-fluid">
                        <h4 class="text-middle">POLICE CRIME REPORT</h4>
                        <h3 class="text-right my-3">Case&nbsp;&nbsp;#<?php echo $courtRow['id']?></h3>
                        <hr>
                      </div>
                      <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 pl-0">
                          <p class="mt-5 mb-2"><b>Plaintiff: <i><?php echo $courtRow['accuser']?></i></b></p>
                          <p >Gender : <i><?php echo $courtRow['agender']?></i></p>
                          <p >Age : <i>
                            <?php
                              $dateOfBirth = $courtRow['adob'];
                              $today = date("Y-m-d");
                              $diff = date_diff(date_create($dateOfBirth), date_create($today));
                              echo $diff->format('%y');
                            ?>
                          </i></p>
                          <p >Phone : <i><?php echo $courtRow['aphone']?></i></p>
                          <p >Address : <i><?php echo $courtRow['aaddress']?></i></p>
                          <p >Work : <i><?php echo $courtRow['awork']?></i></p>
                        </div>
                        <div class="col-lg-3 pr-0">
                          <img src="<?php echo CASE_IMAGE_SITE_PATH.$courtRow['image']?>" alt="" width="200" height="200">
                          <p class="mt-5 mb-2 text-right"><b>Defendent : <i><?php echo $courtRow['defendent']?></i></b></p>
                          <p class=" text-right">Gender : <i><?php echo $courtRow['dgender']?></i></p>
                          <p class=" text-right">Age : <i>
                            <?php
                              $dateOfBirth = $courtRow['ddob'];
                              $today = date("Y-m-d");
                              $diff = date_diff(date_create($dateOfBirth), date_create($today));
                              echo $diff->format('%y');
                            ?></i></p>
                          <p class=" text-right">Phone : <i><?php echo $courtRow['dphone']?></i></p>
                          <p class=" text-right">Address : <i><?php echo $courtRow['daddress']?></i></p>
                          <p class=" text-right">Work : <i><?php echo $courtRow['dwork']?></i></p>
                          <p class=" text-right">Family Status : <i><?php echo $courtRow['dfamily']?></i></p>
                        </div>
                      </div>
                      <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 pl-0">
                          <p>Crime Category : <b><?php echo $courtRow['category']?></b></p>
                          <p >Crime Cine : <b><?php echo $courtRow['cine']?></b></p><br>
                          <p>Accusation date : <?php echo $courtRow['accusation']?></p>
                          <p>Imprisioned date : <?php echo $courtRow['imprisioned']?></p>
                          <p>Imprisioned File Number : <?php echo $courtRow['arn']?></p>
                        </div>
                      </div>
                      <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                          <h5>Plaintiff's statement</h5>
                          <p><?php echo $courtRow['pstatement']?></p><br>
                          <h5>Defendant's statement</h5>
                          <p><?php echo $courtRow['dstatement']?></p><br>
                          
                          <?php 
                            $cases_attr_res=mysqli_query($con,"select * from cases_details where status='1' and cases_id='".$courtRow['id']."' order by id asc");
                          ?>
                          <p>
                            <?php
                            while($cases_attr_row=mysqli_fetch_assoc($cases_attr_res)) {
                            ?>
                              <h5>Witness's statement</h5>
                              <p><b><i><?php echo $cases_attr_row['witness'];?> : </i></b></p><br>
                              <p><?php echo $cases_attr_row['statement'];?></p>
                              
                            <?php } ?>
                          </p><br>
                          <?php 
                            $cases_des_res=mysqli_query($con,"select * from cases_result where status='1' and cases_id='".$courtRow['id']."' order by id asc");
                          ?>
                          <p>
                            <?php
                            while($cases_des_row=mysqli_fetch_assoc($cases_des_res)) {
                            ?>
                              <h4><strong> Court Decision</strong>&nbsp;<small>Statement</small></h4>
                              <p><?php echo $cases_des_row['statement'];?></p>
                              <div class="container-fluid mt-5 w-100">
                                <h4 class="text-right mb-5">Court Decision : <b><i><?php echo getCourtResultByID($cases_des_row['cases_status_id']);?></i></b></h4>
                                <hr>
                              </div>
                            <?php } ?>
                          </p>
                        </div>
                      </div>
                      
                      
                    </div>
                  </div>
                  <div class="cell">
                    <div class="card-body">
                      <div class="container-fluid">
                      <h4 class="text-middle">INVERSTIGATION REPORT</h4>
                        <h3 class="text-right my-3">Case&nbsp;&nbsp;#<?php echo $courtRow['id']?></h3>
                        <hr>
                      </div>
                      <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                          <?php 
                            $cases_invest_res=mysqli_query($con,"select * from cases_invest where status='1' and cases_id='".$courtRow['id']."' order by id asc");
                          ?>
                          <p>
                            <?php
                            while($cases_invest_row=mysqli_fetch_assoc($cases_invest_res)) {
                            ?>
                              <h4><strong>Investigation Conclusion</strong>&nbsp;<small>Statement</small></h4>
                              <p><?php echo $cases_invest_row['invest_statement'];?></p>
                            <?php } ?>
                          </p><br>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div><br><br>

                <div>
                  <div class="container-fluid w-100">
                    <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi  mdi-folder-download mr-1"></i>Download</a>
                  </div>
                  <?php
                      $caseStatusRes=mysqli_query($con,"select * from cases_status order by id asc");
                      $caseAssignRes=mysqli_query($con,"select * from user where role='detective' and status=1 order by name asc");
                    ?>
                    <div>
                      
                      <?php
                      echo "<h4>Assign Detective :- ".getDetectiveNameById($courtRow['detective_id'])."</h4>"
                      ?>
                      <select name="detective" id="detective" class="form-control w200" onclick="updateAssign()">
                        <option value="">Assigned Detective</option>
                        <?php
                          while($caseAssignRow=mysqli_fetch_assoc($caseAssignRes)){
                            echo "<option value=".$caseAssignRow['id'].">".$caseAssignRow['name']."</option>";
                          }
                        ?>
                      </select>
                    </div>
                </div>
              </div> 
              <style>
                .w200{
                  width:250px;
                }
                .cell{
                  width: 100%;
                  height: fit-content;
                  margin: 0 15 px;
                  overflow: hidden;
                  border-radius: 8px;
                }
                .cell img{
                  width: 100%;
                  height: 350px;
                  object-fit: cover;
                }
              </style> 
              <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
              <script>
                function updatejarchiveAssign(){
                  var jarchive=jQuery('#jarchive').val();
                  if(jarchive!=''){
                    var oid="<?php echo $id?>";
                    window.location.href='<?php echo SITE_PATH?>subadmin/case_detail.php?id='+oid+'&jarchive='+jarchive;
                  }
                }
                $('.main-carousel').flickity({
                  // options
                  wrapAround: true,
                  freeScroll: true
                });
              </script>
              
<?php include('footer.php');?>