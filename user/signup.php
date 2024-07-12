<?php
include('header1.php');
$msg = "";
$name = "";
$username = "";
$password = "";
$email = "";
$gender = "";
$dob = "";
$image = "";
$station = "";
$address = "";
$phone = "";
$id = "";


if (isset($_POST['submit'])) {
  $name = get_safe_value($con, $_POST['name']);
  $username = get_safe_value($con, $_POST['username']);
  $password = get_safe_value($con, $_POST['password']);
  $email = get_safe_value($con, $_POST['email']);
  $gender = get_safe_value($con, $_POST['gender']);
  $dob = get_safe_value($con, $_POST['dob']);

  $address = get_safe_value($con, $_POST['address']);
  $phone = get_safe_value($con, $_POST['phone']);

  $select = "SELECT * FROM user WHERE username = '$username'";

  if (mysqli_num_rows(mysqli_query($con, $select)) > 0) {
    $msg = "user Username already added";
  } else {


    $sql = "INSERT INTO user(name, username, password, email, gender, dob, address,phone,role) VALUES('$name', '$username', '$password', '$email', '$gender','$dob','$address','$phone','user')";

    mysqli_query($con, $sql);
    redirect('index.php');
  }
}
?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h3 class="card-title ml10"><strong>Signup</strong>&nbsp;<small>Form</small></h3>
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form class="forms-sample" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" required value="<?php echo $name ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputName1" placeholder="Username" required value="<?php echo $username ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Password</label>
                <input type="text" name="password" class="form-control" id="exampleInputName1" placeholder="Password" required value="<?php echo $password ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail3">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value="<?php echo $email ?>">
              </div>

              <div class="form-group">
                <label for="exampleSelectGender">Gender</label>
                <select name="gender" class="form-control" id="exampleSelectGender">
                  <option value="">Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputDate1">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="exampleInputCity1" required value="<?php echo $dob ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputAddress1">Phone Number</label>
                <input type="tel" name="phone" class="form-control" id="exampleInputCity1" placeholder="Phone Number" required value="<?php echo $phone ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputAddress1">Address</label>
                <input type="text" name="address" class="form-control" id="exampleInputCity1" placeholder="Location" required value="<?php echo $address ?>">
              </div>

              <div class="form-group">

                <button type="submit" class="btn btn-primary mr-2" name="submit">Register</button>
                <div style="color:red;margin-top: 15px;"><?php echo $msg ?></div>
            </form>
          </div>
        </div>
      </div>

    </div>

  </div>
  <?php
  include('footer.php');
  ?>