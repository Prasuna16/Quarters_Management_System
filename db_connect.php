<?php 
 //connect to db
	$conn = mysqli_connect('localhost', '', '', 'quarters_management');

	//check connection
	if (!$conn) {
		echo "Connection Failed: " . mysqli_connect_error();
	}
?>
