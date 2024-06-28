<?php 
include('header.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($con,$_GET['type']);
	$id=get_safe_value($con,$_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from cases where id='$id'");
		redirect('prision.php');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update cases set status='$status' where id='$id'");
		redirect('prision.php');
	}

}

$sql="select cases.*,category from cases,category where cases.category_id=category.id and casetype='0' order by cases.id desc";
$res=mysqli_query($con,$sql);
?>
<div class="main-panel">
  <div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h1 class="grid_title">Case Records</h1><br>
        <div class="row grid_box">
				  <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr>
                    <th width="5%">S.No</th>
                    <th width="10%">Image</th>
                    <th width="10%">Case</th>
                    <th width="10%">Plaintff</th>
                    <th width="10%">Defendent</th>
                    <th width="10%">Case Cine</th>
                    <th width="10%">Accusated at</th>
                    <th width="10%"></th>
                    <th width="10%"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(mysqli_num_rows($res)>0){
                  $i=1;
                  while($row=mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                    <td><?php echo $i?></td>
                    <td>
                      <a target="_blank" href="<?php echo CASE_IMAGE_SITE_PATH.$row['image']?>">
                        <img src="<?php echo CASE_IMAGE_SITE_PATH.$row['image']?>"/>
                      </a>
                    </td>
                    <td><?php echo $row['category']?></td>
                    <td><?php echo $row['accuser']?></td>
                    <td><?php echo $row['defendent']?></td>
                    <td><?php echo $row['cine']?></td>
                    <td><?php echo $row['accusation']?></td>
							      <td>
                        <!--<a href="manage_prision.php?id=<?php echo $row['id']?>"><label class="badge badge-success">Edit</label></a>&nbsp;-->
							      </td>
                    <td>
                      <?php
                      if($row['user_id']==$_SESSION['POLICE_ID']){
                      ?>
                      <a href="case_detail.php?id=<?php echo $row['id']?>"><button type="button" class="add-btn">View Detail</button></a>
                      <?php } else { ?>
                        
                      <?php } ?>
                    </td>
                  </tr>
                  <?php $i++; } } else { ?>
                  <tr>
                    <td colspan="5">No data found</td>
                  </tr>
						      <?php } ?>
                      </tbody>
              </table>
            </div>
				  </div>
        </div>
    </div>
	</div>
  <style>
    .add-btn{
    text-transform: uppercase;
    border: none;
    font-family: inherit;
    padding: 10px 28px;
    cursor: pointer;
    transition: all 0.3s ease-out;
    }
  </style>
        
<?php include('footer.php');?>