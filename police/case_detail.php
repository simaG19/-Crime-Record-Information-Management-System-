<?php 
include('header.php');
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($con,$_GET['id']);
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
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
              <h3 class="page-title"> Case Details </h3>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card px-2">
                  <div class="card-body">
                    <div class="container-fluid">
                      <img src="assets/images/police.jpg" alt="logo" style="width: 100px;hight: 100px;"/>
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
                        <!-- <img src="<?php echo CASE_IMAGE_SITE_PATH.$courtRow['image']?>" alt="" width="200" height="200"> -->
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
                        <p class="mb-0 mt-5">Crime Cine : <b><?php echo $courtRow['cine']?></b></p><br>
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
                        </p>
                      </div>
                    </div>
                    <div class="container-fluid w-100">
                      <!-- <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi mdi-download mr-2"></i>Download</a> -->
                    </div>
                  </div>
                </div>
              </div>  
<?php include('footer.php');?>