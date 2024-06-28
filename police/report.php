<?php
include('header.php');
?>
<div class="main-panel">
    <div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            
        </div>
       
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
       
    </div>
    <div class="row">
       
       
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card">
               
                </div>
            </div>
        </div>
    </div>
    <?php
    $sql="SELECT  * FROM report  WHERE case_state=  '0' ";
    $res=mysqli_query($con,$sql);
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Latest Report</h4>
                    <div class="table-responsive">
                        
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">S.No</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Gender</th>
                                    <th width="10%">Date</th>
                                    <th width="10%">Address</th>
                                    <th width="10%">Date</th>
                                    <th width="10%">Phone</th>
                                    <th width="10%">Crime</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(mysqli_num_rows($res)>0){
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)){
                                ?>
                                <tr>
                                    <td><?php echo $i?></td>
                                   
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['gender']?></td>
                                    <td><?php echo $row['dob']?></td>
                                    <td><?php echo $row['address']?></td>
                                    <td><?php echo $row['phone']?></td>
                                    <td><?php echo $row['work']?></td>
                                    <td><?php echo $row['category']?></td>
                     
                                    <td>
                                        <a href="report_detail.php?id=<?php echo $row['id']?>"><button type="button" class="add-btn">View Detail</button></a>
                                    </td>
                                </tr>
                                <?php 
                                    $i++; } } else { ?>
                                    <h6 colspan="5">No data found</h6>
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
<?php
include('footer.php');
?>