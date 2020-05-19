<?php
  session_start();
  $name = '';
  $error = '';
  $mail1 = '';
  function isValid() {
    include 'db_connect.php';
    global $name, $error, $mail1;
    $mail = $_POST['mail'];
    $pword = $_POST['pword'];
    $query = "SELECT Name from managers where Email = '$mail' and Password = '$pword'";
    $res = mysqli_query($conn, $query);
    $fetched = mysqli_fetch_all ($res, MYSQLI_ASSOC);
    if (empty($fetched)) {
      $mail1 = $mail;
      $error = 'Invalid Credentials!';
      echo $error;
      return 'False';
    }else {
      $name = $fetched[0]['Name'];
    }
    return 'True';
  }
  if (isset($_POST['login'])) {
    if (isValid() == 'True') {
      $_SESSION['name_manager'] = $name;
      echo $_SESSION['name_manager'];
      header('Location:manager_home.php');
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Manager Login Portal</title>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   
<style type="text/css">
form
{
padding-top: 30px;
}
body
{
background-color: #ffffff;
  font-family: Helvetica;
  color:white;
}
form label,button
{
  font-family: Helvetica;
}
  form label b
  {
    /*color: #4690C6;*/
    color: white;
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
  width: 345px;
}
.register {
  margin-bottom: 
}
.container-fluid {
  padding-top: 2px;
  background-color: #2a5d84;
}
.welcome {
  float: right;
  position: relative;
  margin-top: 6px;
  padding-right: 560px;
  font-family: Helvetica;
  font-size: 25px;
}
.form-group {

}
.bg-image {
  /* The image used */
  background-image: url("bg.jpg");

  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 90%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
body, html {
  height: 100%;
}

* {
  box-sizing: border-box;
}
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 50%;
  padding: 20px;
  text-align: center;
}
</style>
</head>




<body>
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">
    <img src="arrowleft.png" style="float: left; margin-left: 20px; " width="40" height="30" alt="Back">
     </a>
      <div class="welcome">Manager Login Portal</div>
    </div>
    <div class="bg-image"></div>
    <div class="bg-text">
<center class="register" >
<form method="post">
   <div style="color: #ff5555";>
    <?php //echo $errors['email']; ?>
    <?php //echo $errors['password']; ?>
  </div> 
  <br>
  <div class="form-group">
    <label for="mail" align="left"><b>Email</b>
    <input type="mail" class="form-control" id="mail" name="mail" placeholder="Enter your Email" size="35" required value="<?php echo $mail1 ?>">
    </label>
  </div>
  <div class="form-group">
    <label for="pass" align="left"><b>Password</b>
    <input type="password" class="form-control" name="pword" id="pass" Placeholder="Enter your Password"size="35" required>
    </label>
  <center>
<button name="login" type="submit" style="color: white; margin-top: 25px; padding-top: 5px; padding-bottom: 5px; background-color: #2a5d84" >Login</button>
</center>

</form>
</center>
</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>