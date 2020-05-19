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
      $query = "SELECT ID,Name,RoomNo,Status,BookedDate FROM users where RoomNo!='-1' and ID!='-1'";
      $res = mysqli_query($conn, $query);
      $list = mysqli_fetch_all($res, MYSQLI_ASSOC);
      $flag=array();
      for($i=0;$i<count($list);$i++){
        array_push($flag,1);
      }
      for($j=0;$j<count($list);$j++){
        $r=$list[$j]['ID'];
      
        if(!empty($_POST["$r"])){
          if($flag[$j]==1){
            $query1="UPDATE users SET RoomNo='-1' where ID='$r'";
            $flag[$j]=0;
          }
          $res1 = mysqli_query($conn, $query1);
        }
      }
      //print_r($list);
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Managers List</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <style type="text/css">
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
      <a class="navbar-brand" href="manager_home.php">
    <img src="arrowleft.png" style="float: left; margin-left: 20px; padding-top: 4px; padding-bottom: 0px;"width="30" height="30" alt="back">
     </a>
    <div class="welcome">--RESOLVE BOOKING--</div></div><br>
    <div style="float: right; margin-right: 22%;"><button onclick="print()">Print</button></div><br>
	<center>
	<table id="list" class="table table-bordered" style="width: 70%; margin-top: 3%;">
  <thead>
    <tr class="table-primary">
      <th style="text-align: center;" scope="col">Guest ID</th>
      <th style="text-align: center;" scope="col">Name</th>
      <th style="text-align: center;" scope="col">Room Number</th>
      <th style="text-align: center;" scope="col">Booked Date</th>
      <th style="text-align: center;" scope="col">Status of the Booking</th>
      <th style="text-align: center;" scope="col">Change his status</th>
      
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($list); $i++) {?>
      <tr style="background-color: #eaf6fb">
        <?php $n=$list[$i]['ID'];?>
      <td style="text-align: center;"><?php echo $list[$i]['ID'] ?></td>
      <td style="text-align: center;"><?php echo $list[$i]['Name'] ?></td>
      <td style="text-align: center;"><?php echo $list[$i]['RoomNo'] ?></td>
      <td style="text-align: center;"><?php echo $list[$i]['BookedDate'] ?></td>
      <td style="text-align: center;"><?php echo $list[$i]['Status'] ?></td>
      <form method="post">
      <td style="text-align: center;">
        <input type="submit" class="btn btn-info"id="status" name="<?php echo $n?>" 
        value="MAKE USER INACTIVE"></input></td>
      </form>
    
        <!--<button type="button" class="btn btn-danger" align="center">Danger</button></td>-->
    </tr>
<?php } ?>
  </tbody>
</table>
</center>
<script type="text/javascript">
  function print() {
  var prtContent = document.getElementById("list");
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


    </script>
</body>
</html>
<?php } ?>