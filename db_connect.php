<?php 
 //connect to db
	$conn = mysqli_connect('localhost', 'Prasuna', 'suna16', 'quarters_management');

	//check connection
	if (!$conn) {
		echo "Connection Failed: " . mysqli_connect_error();
	}
?>