<?php 
  session_start();
  if(!isset($_SESSION['name_admin'])) { ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>ACCESS DENIED!</title>
    </head>
    <body>
      <div style="text-align: center; margin-top: 50px;">
        <img src="warning_copy.jpg" alt="Warning!" height="100" width="100">
        <center>
          <div style="color: red; font-size: 20px;">ACCESS DENIED!</div>
        </center>
      </div>
    </body>
    </html>
  <?php }else {
    $error = '';
    $name = '';
    $mail = '';
    $mob = '';
    include 'db_connect.php';
    if (isset($_POST['enroll'])) {
      $name = $_POST['name'];
      $mail = $_POST['email'];
      $mob = $_POST['mobileNo'];
      $pass = $_POST['pword'];
      if ($_POST['pword'] != $_POST['pword1']) {
        $error = 'Enter same password again!';
      }else {
      $query = "INSERT INTO managers(Name, Email, MobileNo, Password) VALUES ('$name', '$mail', '$mob', '$pass')";
      $res = mysqli_query($conn, $query);
      header('Location: managers_list.php');
    }
  }
    ?>
<!DOCTYPE html>
<html>
<head>
<title>Manager Enrollment Portal</title>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
<style type="text/css">
form
{
padding-top: 50px;
}
body
{
background-color: #ffffff;
  font-family: Helvetica;
}
form label,button
{
  font-family: Helvetica;
}
  form label b
  {
    color: #4690C6;
  }
  .form-control
{
  height: 30px;
  background-color: #f7f7f7 ;
}
.reg
{
  padding-top: 10px;
}
button
{
  width: 150px;
}
.btn
{
  font-size: 22px;
}
.dropdown {
  height: 30px;
  width: 340px;
}
.register {
  margin-bottom: 
}
.container-fluid {
  padding-top: 2px;
  padding-bottom: 6px;
  background-color: #2a5d84;
}

.welcome {
  float: right;
  position: relative;
  margin-top: 6px;
  padding-right: 520px;
  font-family: Helvetica;
  font-size: 24px;
  color: white;
}

</style>
</head>
<body>
    <div class="container-fluid">
      <a class="navbar-brand" href="admin_home.php">
    <img src="arrowleft.png" style="float: left; margin-left: 20px; padding-top: 4px; padding-bottom: 0px;"width="30" height="30" alt="back">
     </a>
    <div class="welcome">Manager Enrollment Portal</div></div>
<center class="register" >
<form method="post" action="">
  <div class="form-group">
    <label for="name" align="left"><b>User Name</b>
    <input type="text" class="form-control" id="name" name="name" size="35" placeholder="Enter Username" required value="<?php echo $name?>">
  </label>
  </div>
  <div class="form-group">
    <label for="umail" align="left"><b>Email</b> <!-- <strong style="color: #ff5555; margin-left: 20px;"><?php echo $errors['email'] ?></strong> -->
    <input type="email" class="form-control" id="umail" name="email" placeholder="Enter Email" aria-describedby="emailHelp" size="35" required value="<?php echo $mail?>">
    </label>
</div>
  <div class="form-group">
    <label for="no" align="left"><b>Mobile Number</b><!--  <strong style="color: #ff5555; margin-left: 20px;"><?php echo $errors['mobile'] ?> --></strong>
    <input type="text" class="form-control" name="mobileNo" id="no" Placeholder="Enter Mobile No"size="35" required value="<?php echo $mob?>">
    </label>
  </div>
  <div class="form-group">
    <label for="pass" align="left"><b>Password</b><strong style="color: #ff5555; margin-left: 20px;"><?php echo $error?></strong>
    <input type="password" class="form-control" name="pword" id="pass" Placeholder="Enter Password"size="35" required>
    </label>
  </div>
    <div class="form-group">
    <label for="pass1" align="left"><b>Confirm Password</b>
    <input type="password" class="form-control" id="pass1" name="pword1"placeholder="Enter Password again" size="35" required>
    </label>
  </div>
  <center>
<button name="enroll" type="submit" style="color: white; margin-top: 5px; padding-top: 5px; padding-bottom: 5px; background-color: #2a5d84" >Enroll</button>
</center>

</form>
</center>
</body>
</html>
<?php } ?>