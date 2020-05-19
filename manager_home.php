
<?php 
  session_start();
  if(!isset($_SESSION['name_manager'])) { ?>
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
      $name = $_SESSION['name_manager'];
      if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('Location: manager_login.php');
      }
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Manager Home Page</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<style type="text/css">
	body {
		background-color: #f7f7f7;
	}
	.welcome {
		width: 100%;
		padding: 0.7rem!important;
    background-color: #2a5d84;
	}
	b {
		font-size: 20px;
	}

</style>

</head>
<body>
<div class=" mb-2 text-white welcome" style="text-align: center; font-size: 23px;">Hello <?php echo $name?>, Welcome!</div>
<div class="card mb-3" style="width: 80%; margin-left: 10%; margin-top: 2.5%;">
  <img src="bluebg.png" class="card-img-top" height="10" alt="">
  <div class="card-body">
    <h5 class="card-title"><a href="resolve_book.php">Resolve Bookings</a></h5>
    <p class="card-text">Click the above link to resolve all kind of problems regarding room bookings.</p>
  </div>
</div>
<div class="card mb-3" style="width: 80%; margin-left: 10%; margin-top: 1.5%;">
  <img src="bluebg.png" class="card-img-top" height="10" alt="">
  <div class="card-body">
    <h5 class="card-title"><a href="room_service.php">Room Services</a></h5>
    <p class="card-text">Click the above link to see the one's who need room services.</p>
  </div>
</div>
<div class="card mb-3" style="width: 80%; margin-left: 10%; margin-top: 1.5%;">
  <img src="bluebg.png" class="card-img-top" height="10" alt="">
  <div class="card-body">
    <h5 class="card-title"><a href="complaint.php">Complaints</a></h5>
    <p class="card-text">Click the above link to have a look at complaints regarding room management.</p>
  </div>
</div>
<div class="card mb-3" style="width: 80%; margin-left: 10%; margin-top: 1.5%;">
  <img src="bluebg.png" class="card-img-top" height="10" alt="">
  <div class="card-body">
    <h5 class="card-title"><a href="check_availability.php">Check Availabilty</a></h5>
    <p class="card-text">Click the above link to check the availability of rooms.</p>
  </div>
</div>
<div class="card mb-3" style="width: 80%; margin-left: 10%; margin-top: 1.5%;">
  <img src="bluebg.png" class="card-img-top" height="10" alt="">
  <div class="card-body">
    <h5 class="card-title"><a href="bills.php">Electricity bills</a></h5>
    <p class="card-text">Click the above link to check status of electricity bills.</p>
  </div>
</div>
<center>
  <form method="post">
    <button name='logout' type="submit" style="color: white; margin-top: 15px; padding-top: 5px; padding-bottom: 5px; background-color: #2a5d84;" >&#8678 Logout</button>
  </form>
  <br><br>
</center>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>