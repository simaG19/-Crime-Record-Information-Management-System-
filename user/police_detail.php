<?php
include('header.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update police set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from police where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from police order by id asc";
$res=mysqli_query($con,$sql);
?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
                <h2 class="grid_title">Police</h2>
                <h4><a href="manage_police.php" class="grid_sub_title">Add Police</a></h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th></th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                        while($row=mysqli_fetch_assoc($res)){?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><img src="<?php echo POLICE_IMAGE_SITE_PATH.$row['image']?>"/></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td>
                                <?php
                                    $dateOfBirth = $row['dob'];
                                    $today = date("Y-m-d");
                                    $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                    echo $diff->format('%y');
                                ?>
                            </td>
                            <td><?php echo $row['phone']?></td>
                            <td><?php echo $row['address']?></td>
                            <td>
                            <td>
                              <?php
                              if($row['status']==1){
                                              echo"<span class='badge badge-success'><a style='color: #fff;' href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;&nbsp;";
                                              }else{
                                              echo"<span class='badge badge-danger'><a style='color: #fff;' href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;&nbsp;";
                                              }
                                              echo"<span class='badge badge-primary'><a style='color: #fff;' href='manage_police.php?id=".$row['id']."'>Edit</a></span>&nbsp;&nbsp;";
                                              echo"<span class='badge badge-danger'><a style='color: #fff;' href='?type=delete&id=".$row['id']."'>Delete</a></span>";
                              ?>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div>
				        </div>
              </div>
            </div>
          </div>
<?php
include('footer.php');
?>