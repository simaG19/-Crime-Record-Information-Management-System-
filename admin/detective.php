<?php
include('header.php');
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($con,$_GET['type']);
	$id=get_safe_value($con,$_GET['id']);
    if($type=='delete'){
		mysqli_query($con,"delete from detective where id='$id'");
		redirect('detective.php');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update detective set status='$status' where id='$id'");
		redirect('detective.php');
	}

}
$sql="select * from detective order by id asc";
$res=mysqli_query($con,$sql);
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    font-family: 'Poppins', sans-serif;
}
img{
    width: 100%;
    display: block;
}
.main-wrapper{
    background-color: #fff;
    min-height: 100vh;
    overflow-x: 0;
}
.container{
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 16px;
}
.main-title{
    text-align: center;
}
.main-title h1{
    padding: 16px 0;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 2px;
}
.display-style-btns{
    margin: 10px 0;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    background-color: #fff;
    padding: 16px 0;
    border-radius: 5px;
}
.display-style-btns button{
    border: none;
    font-size: 22px;
    display: inline-block;
    vertical-align: top;
    margin: 0 8px;
    background-color: transparent;
    cursor: pointer;
    transition: all 0.3s ease-out;
}
.display-style-btns button:hover{
    color: #f79410;
}
.active-btn{
    color: #f79410;
}


.item-list{
    margin: 36px 0;
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    row-gap: 32px;
}
.item{
    background-color: #fff;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 4px 0 rgba(15, 4, 4, 0.05);
    transition: all 0.2s ease-out;
}
.item:hover{
    box-shadow: 0 0 10px 1px rgba(0, 4, 4, 0.15);
}
.item-img{
    position: relative;
    overflow: hidden;
}
.item-img img{
    width: 70%;
    margin: 16px auto;
}
.icon-list{
    position: absolute;
    bottom: -100px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease-out;
}
.icon-list button{
    border: none;
    background-color: #202020;
    color: #fff;
    margin: 0 6px;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease-out;
}
.icon-list button:hover{
    background-color: #f4f4f4;
    color: #202020;
}
.item-img:hover .icon-list{
    bottom: 26px;
}
.item-detail{
    padding: 16px;
    color: #202020;
    text-align: center;
}
.item-name{
    font-weight: 500;
    font-size: 18px;
    color: #202020;
    display: block;
}
.item-price{
    margin: 10px 0;
    font-weight: 300;
    display: flex;
    align-items: center;
    justify-content: center;
}
.old-price{
    text-decoration: line-through;
    opacity: 0.6;
}
.new-price{
    color: #f79410;
    font-size: 18px;
    font-weight: 600;
    margin-right: 10px;
}
.item-detail p{
    font-weight: 300;
    opacity: 0.9;
    font-size: 15px;
    line-height: 1.7;
    display: none;
}
.add-btn{
    margin: 16px 0;
    text-transform: uppercase;
    border: none;
    background-color: #202020;
    color: #fff;
    font-family: inherit;
    padding: 10px 28px;
    border: 1px solid #202020;
    cursor: pointer;
    transition: all 0.3s ease-out;
    display: none;
}
.add-btn:hover{
    background-color: #fff;
    color: #202020;
}


/* stylings for details active */
.details-active.item-list{
    grid-template-columns: 100%;
}
.details-active .item{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
}
.details-active .item-detail{
    text-align: left;
}
.details-active .item-price{
    justify-content: flex-start;
}
.details-active .item-detail p{
    display: block;
}
.details-active .item-detail .add-btn{
    display: block;
}



@media screen and (min-width: 678px){
    .item-list{
        grid-template-columns: repeat(2, 1fr);
        gap: 32px;
    }
}

@media screen and (min-width: 768px){
    .item-list{
        grid-template-columns: repeat(3, 1fr);
    }
}

@media screen and (max-width: 576px){
    .details-active .item{
        grid-template-columns: 100%;
    }
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class = "main-title">
            <h3><strong>Detective Staff</strong></h3>
            <h6><a href="manage_detective.php" class="grid_sub_title">Add Detective</a></h6>
        </div>
        <div class = "display-style-btns">
            <button type = "button" id = "grid-active-btn">
                <i class = "fas fa-th"></i>
            </button>
            <button type = "button" id = "details-active-btn">
                <i class = "fas fa-list-ul"></i>
            </button>
        </div>
        <div class = "item-list">
                <?php 
				while($row=mysqli_fetch_assoc($res)){?>
                <div class = "item">
                    <div class = "item-img">
                        <a target="_blank" href="img_5terre.jpg">
                            <img src="<?php echo DETECTIVE_IMAGE_SITE_PATH.$row['image']?>" width="600" height="200"/>
                        </a>
                    </div>
                    <div class = "item-detail">
                        <a href = "#" class = "new-price" style="text-transform: capitalize;">Name :  <?php echo $row['name']?></a>
                        <span class = "item-name" style="text-transform: capitalize;">Station :  <?php echo $row['station']?></span>
                        <div class = "item-price">
                            <span class = "item-price">
                                <span class = "new-price"></span>
                                <a href="manage_detective.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
                                <?php
                                if($row['status']==1){
                                ?>
                                <a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-danger hand_cursor">Active</label></a>
                                <?php } else { ?>
                                    <a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
                                <?php } ?>
                                &nbsp;
                                <a href="?id=<?php echo $row['id']?>&type=delete"><label style="background:red;" class="badge badge-danger delete_red hand_cursor">Delete</label></a>
                            </span>
                        </div>
                        <p>Address:  <?php echo $row['address']?></p>
                        <p>Phone Number:  <?php echo $row['phone']?></p>
                        <button type = "button" class = "add-btn">View Detail</button>
                    </div>
                </div>
                <?php } ?>
</div>
<script>
const itemList = document.querySelector('.item-list');
const gridViewBtn = document.getElementById('grid-active-btn');
const detailsViewBtn = document.getElementById('details-active-btn');

gridViewBtn.classList.add('active-btn');

gridViewBtn.addEventListener('click', () => {
    gridViewBtn.classList.add('active-btn');
    detailsViewBtn.classList.remove('active-btn');
    itemList.classList.remove('details-active');
});

detailsViewBtn.addEventListener('click', () => {
    detailsViewBtn.classList.add('active-btn');
    gridViewBtn.classList.remove("active-btn");
    itemList.classList.add("details-active");
});
</script>
    
<?php
include('footer.php');
?>