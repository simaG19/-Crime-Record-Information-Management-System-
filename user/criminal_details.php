<?php 
include('header.php');
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);

  if(isset($_GET['carchive'])){
    $carchive=get_safe_value($con,$_GET['carchive']);
    mysqli_query($con,"update cases set cachive='$carchive' where id='$id'");
    redirect(SITE_PATH.'judge/closed_details.php?id='.$id);
  }
  $sql="SELECT * FROM decided where id='$id' ORDER BY id desc";
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
                        <h3 class="text-right my-3">Case&nbsp;&nbsp;#<?php echo $courtRow['caseid']?></h3>
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
                          <p>Crime Category : <b><?php echo $courtRow['casetype']?></b></p>
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

                          <?php if($courtRow['dstatement']=='') {?>

                          <?php }else{?>
                          <h5>Defendant's statement</h5>
                          <p><?php echo $courtRow['dstatement']?></p><br>
                          <?php } ?>
                          

                          <?php if($courtRow['witness']=='') {?>

                          <?php }else{?>
                          <h5>Witness's statement</h5>
                          <p><b><i><?php echo $courtRow['witness'];?> : </i></b></p><br>
                          <p><?php echo $courtRow['statement'];?></p>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Second cell investigation-->
                  <div class="cell">
                    <div class="card-body">
                      <div class="container-fluid">
                      <h4 class="text-middle">INVERSTIGATION REPORT</h4>
                        <h3 class="text-right my-3">Case&nbsp;&nbsp;#<?php echo $courtRow['caseid']?></h3>
                        <hr>
                      </div>
                      <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                          <p><?php echo $courtRow['invest_statement'];?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Second cell investigation-->

                  <!--Thrid cell Prosecutor-->
                  <?php if($courtRow['pro_statement']=='') {?>

                  <?php }else{?>
                  <div class="cell">
                    <div class="card-body">
                      <div class="container-fluid">
                      <h4 class="text-middle">Prosecutor Statement</h4>
                        <h3 class="text-right my-3">Case&nbsp;&nbsp;#<?php echo $courtRow['caseid']?></h3>
                        <hr>
                      </div>
                      <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                          <p><?php echo $courtRow['pro_statement'];?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <!--Thrid cell Prosecutor-->

                <!--Five cell Prosecutor-->
                <div class="cell">
                  <div class="card-body">
                    <div class="container-fluid">
                    <h4 class="text-middle">COURT DECISION</h4>
                      <h3 class="text-right my-3">Case&nbsp;&nbsp;#<?php echo $courtRow['caseid']?></h3>
                      <hr>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                      <div class="table-responsive w-100">
                        <p>
                            <?php
                            echo "<h6>Judge :- '".$courtRow['judge']."'</h6>";
                            ?>
                            <p><?php echo $courtRow['court_statement'];?></p>
                        </p><br>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Five cell Prosecutor-->
                </div>
                </div><br><br>

                <div>
                  <div class="container-fluid w-100">
                    <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi  mdi-folder-download mr-1"></i>Download</a>
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
                function updatecarchiveAssign(){
                  var carchive=jQuery('#carchive').val();
                  if(carchive!=''){
                    var oid="<?php echo $id?>";
                    window.location.href='<?php echo SITE_PATH?>judge/closed_details.php?id='+oid+'&carchive='+carchive;
                  }
                }
                $('.main-carousel').flickity({
                  // options
                  wrapAround: true,
                  freeScroll: true
                });
              </script>
              
<?php include('footer.php');?>