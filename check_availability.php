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
      include 'db_connect.php';
      $query = "SELECT RoomNo FROM rooms WHERE id_person = -1";
      $res = mysqli_query($conn, $query);
      $vacant = mysqli_fetch_all($res, MYSQLI_ASSOC);
      //print_r($vacant);
      $query1 = "SELECT Name, RoomNo, MobileNo, BookedDate, Email FROM users where RoomNo!= '-1'";
      $res1 = mysqli_query($conn, $query1);
      $filled = mysqli_fetch_all($res1, MYSQLI_ASSOC);
      //print_r($filled);
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Rooms Availability</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <style type="text/css">
     .container-fluid {
  padding-top: 0px;
  padding-bottom: 0px;
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
      <a class="navbar-brand" href="manager_home.php">
    <img src="arrowleft.png" style="float: left; margin-left: 20px; padding-top: 4px; padding-bottom: 0px;"width="30" height="30" alt="back">
     </a></div><br>
     <center><h5>--Rooms Vacant--</h5></center>
     <div style="float: right; margin-right: 22%;"><button onclick="vacantPrint()">Print</button></div><br>
	<center>
	<table id="vacant" class="table table-bordered" style="width: 60%; margin-top: 3%;">
  <thead>
    <tr class="table-primary">
      <th scope="col" style="text-align: center;">RoomNo</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($vacant); $i++) {?>
    <tr style="background-color: #eaf6fb">
    <td style="text-align: center;"><?php echo $vacant[$i]['RoomNo'] ?></td>
  </tr>
<?php } ?>
  </tbody>
</table>
</center><br><br>
<center><h5>--Rooms Filled--</h5></center>
<div style="float: right; margin-right: 22%;"><button onclick="filledPrint()">Print</button></div><br>
  <center>
  <table id="filled" class="table table-bordered" style="width: 80%; margin-top: 3%;">
  <thead>
    <tr class="table-primary">
      <th style="text-align: center;" scope="col">RoomNo</th>
      <th style="text-align: center;" scope="col">Booked By</th>
      <th style="text-align: center;" scope="col">Booked Date</th>
      <th style="text-align: center;" scope="col">Email</th>
      <th style="text-align: center;" scope="col">Contact No</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($filled); $i++) {?>
    <tr style="background-color: #eaf6fb">
    <td style="text-align: center;"><?php echo $filled[$i]['RoomNo'] ?></td>
    <td style="text-align: center;"><?php echo $filled[$i]['Name'] ?></td>
    <td style="text-align: center;"><?php echo $filled[$i]['BookedDate'] ?></td>
    <td style="text-align: center;"><?php echo $filled[$i]['Email'] ?></td>
    <td style="text-align: center;"><?php echo $filled[$i]['MobileNo'] ?></td>
  </tr>
<?php } ?>
  </tbody>
</table>
</center>
<script type="text/javascript">
  function vacantPrint() {
  var prtContent = document.getElementById("vacant");
  var win = window.open('', '', 'left=0,top=0,width=800,height=900');
  win.document.write(prtContent.outerHTML);
  win.document.close();
  win.print();
}
function filledPrint() {
  var prtContent = document.getElementById("filled");
  var win = window.open('', '', 'left=0,top=0,width=800,height=900');
  win.document.write(prtContent.outerHTML);
  win.document.close();
  win.print();
}
</script>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>