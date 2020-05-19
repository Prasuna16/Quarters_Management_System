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
   $flag = 1;
      include 'db_connect.php';
      $query = "SELECT ID,FloorNo, RoomNo, Name, MobileNo, Bills, BookedDate FROM users where BillStatus = 'Pending'";
      $res = mysqli_query($conn, $query);
      $pending = mysqli_fetch_all($res, MYSQLI_ASSOC);
      $query = "SELECT FloorNo, RoomNo, Name, MobileNo, Bills, BookedDate FROM users where BillStatus = 'Paid'";
      $res = mysqli_query($conn, $query);
      $paid = mysqli_fetch_all($res, MYSQLI_ASSOC);
	 
	 
      for ($j = 0; $j < count($pending); $j++) {
         $r = $pending[$j]['ID'];
      if (isset($_POST["$r"])) {
		  
         if ($flag == 1) {
          $query = "UPDATE users SET BillStatus = 'Paid' WHERE ID='$r'";;
          $flag = 0;
        }else {
          $query = "UPDATE users SET BillStatus = 'Pending' WHERE ID= '$r'";;
          $flag = 1;
        }
          $res1 = mysqli_query($conn, $query);
        }
      }
	  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Electricity Bills</title>
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
     <center><h5>--Bills Pending--</h5></center>
     <div style="float: right; margin-right: 22%;"><button onclick="unpaidPrint()">Print</button></div><br>
	<center>
    <?php if (count($pending) > 0) {?>
	<table id="unpaid" class="table table-bordered" style="width: 60%; margin-top: 3%;">
  <thead>
    <tr class="table-primary">
    
      <th scope="col" style="text-align: center;">RoomNo</th>
      <th scope="col" style="text-align: center;">Booked By</th>
      <th scope="col" style="text-align: center;">Booked Date</th>
      <th scope="col" style="text-align: center;">Contact No</th>
      <th scope="col" style="text-align: center;">Bill Amount</th>
	  <th scope="col" style="text-align: center;"></th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($pending); $i++) {?>
    <tr style="background-color: #eaf6fb">
	 <?php $n = $pending[$i]['ID'];?>
  
    <td style="text-align: center;"><?php echo $pending[$i]['RoomNo'] ?></td>
    <td style="text-align: center;"><?php echo $pending[$i]['Name'] ?></td>
    <td style="text-align: center;"><?php echo $pending[$i]['BookedDate'] ?></td>
    <td style="text-align: center;"><?php echo $pending[$i]['MobileNo'] ?></td>
    <td style="text-align: center;"><?php echo $pending[$i]['Bills'] ?></td>
	 <form method="post">
    <td style="text-align: center;"><input id="status" type="submit" name="<?php echo $n?>" value="SEE" style="color: white; padding-top: 5px; padding-bottom: 5px; background-color: #27ae60"></td>
	</form>
	

	  </tr>
	<?php }}else {
  ?><div style="width: 300px; margin-top: 30px;" class="alert alert-success start" role="alert">
    No pending Bills!
  </div>
<?php } ?>
  </tbody>
</table>
</center><br><br>
<center><h5>--Bills Paid--</h5></center>
<div style="float: right; margin-right: 22%;"><button onclick="paidPrint()">Print</button></div><br>
  <center>
  <table id="paid" class="table table-bordered" style="width: 85%; margin-top: 3%;">
  <thead>
    <tr class="table-primary">
     
      <th scope="col" style="text-align: center;">RoomNo</th>
      <th scope="col" style="text-align: center;">Booked By</th>
      <th scope="col" style="text-align: center;">BookedDate</th>
      <th scope="col" style="text-align: center;">Contact No</th>
      <th scope="col" style="text-align: center;">Bill Amount</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($paid); $i++) {?>
    <tr style="background-color: #eaf6fb">
    <td style="text-align: center;"><?php echo $paid[$i]['RoomNo'] ?></td>
    <td style="text-align: center;"><?php echo $paid[$i]['Name'] ?></td>
    <td style="text-align: center;"><?php echo $paid[$i]['BookedDate'] ?></td>
    <td style="text-align: center;"><?php echo $paid[$i]['MobileNo'] ?></td>
    <td style="text-align: center;"><?php echo $paid[$i]['Bills'] ?></td>
  </tr>
<?php } ?>
  </tbody>
</table>
</center>
<script type="text/javascript">
function paidPrint() {
  var prtContent = document.getElementById("paid");
  var win = window.open('', '', 'left=0,top=0,width=800,height=900');
  win.document.write(prtContent.outerHTML);
  win.document.close();
  win.print();
}
function unpaidPrint() {
  var prtContent = document.getElementById("unpaid");
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