


<?php

include('header.php');

if (isset($_POST['submit'])){

   

//   $pname=rand(1000,1000)."-".$_FILES["file"]["name"];

//   $tname=$_FILES["files"]["tmp_name"];

//   $uploads_dir='/images';

//   move_uploaded_file($tname,$uploads_dir.'/'.$pname);

 

$name=get_safe_value($con,$_POST['name']);
$username=get_safe_value($con,$_POST['username']);
 $password=get_safe_value($con,$_POST['password']);
 $email=get_safe_value($con,$_POST['email']);
$gender=get_safe_value($con,$_POST['gender']);
$dob=get_safe_value($con,$_POST['dob']);
$station=get_safe_value($con,$_POST['station']);
$address=get_safe_value($con,$_POST['address']);
$phone=get_safe_value($con,$_POST['phone']);
$role=get_safe_value($con,$_POST['role']);
 $added_on=date('Y-m-d h:i:s');
    
    
 
         $insert = " user(name, username, password, email, gender, dob, station, address,phone,role, added_on) VALUES('$name', '$username', '$password', '$email', '$gender','$dob', '$station','$address','$phone','$role', '$added_on')";
        
			mysqli_query($con,$sql);
		

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
<!-- swiper css link  -->
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<!-- header -->
<div class="nav">
        <h1 class="logo">Maid<span>SITE</span></h1>
        <ul>
        <li><a href="logout.php">logout</a></li>
       
        <li><a href="home.php">Home</a></li>
        <li><a href="get_applications.php">applications</a></li>
      </ul>
    </div>

<!-- header section ends -->

<div class="heading" style="background:url(images/home-hero-background.svg) no-repeat">
   <h1>Register Maid</h1>
</div>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>insert Maid</h3>
      <?php
      session_start();
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter Name">
      <input type="text" name="username" required placeholder="enter Father name">
      <input type="date" name="password" required placeholder="age">
      <input type="text" name="email" required placeholder="enter address">
      <input type="number" name="gender" required placeholder="enter experience of years">
      <input type="number" name="dob" required placeholder="enter salary">
      <input type="text" name="station" required placeholder="Language">
      <input  type="text" name="address" required placeholder="self-description" style="height:120px; width:750px;">
      <input type="number" name="role" required placeholder="enter salary">
      <input type="text" name="added_on" required placeholder="Language">
    
      <input type="submit" name="phone" value="register now" class="form-btn">
      <p>already registerd a maid? <a href="get_applications.php?"> see applications</a></p>
     
   </form>

</div>




</body>
</html>