<?php 
include('header.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($con,$_GET['type']);
	$id=get_safe_value($con,$_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from archive where id='$id'");
		redirect('court.php');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update archive set status='$status' where id='$id'");
		redirect('court.php');
	}

}

$sql="select * from archive order by id asc";
$res=mysqli_query($con,$sql);

?>
<div class="main-panel">
  <div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h1 class="grid_title">Court</h1>
			<a href="manage_court.php" class="add_link">Add Court</a><br><br>
        <div class="row grid_box">
				  <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr>
                    <th width="10%">S.No #</th>
                    <th width="50%">Court</th>
                    <th width="15%">Address</th>
                    <th width="25%">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(mysqli_num_rows($res)>0){
                  $i=1;
                  while($row=mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $row['archive']?></td>
							      <td><?php echo $row['address']?></td>
							      <td>
								      <?php if($row['status']==1){ ?>
								        <a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-danger">Active</label></a>
								        <?php }else{ ?>
								        <a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info">Deactive</label></a>
								        <?php } ?> &nbsp;
                        <a href="manage_court.php?id=<?php echo $row['id']?>"><label class="badge badge-success">Edit</label></a>&nbsp;
								        <a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red" style="background:red;">Delete</label></a>
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
        
<?php include('footer.php');?>