<?php

include_once '../functions.php';

$db = new DataSource();
$conn = $db->getConnection();


if(isset($_POST['save']))
{	 
	 
	 $username = $_POST['username'];
    $apikey = $_POST['apikey'];


	 $sqlInsert = "UPDATE `setting` SET `username` = '$username' , `apikey` = '$apikey' ";
	 
	 if (mysqli_query($conn, $sqlInsert)) {
		echo "successfully !";
	 } else {
		echo "Error: " . $sqlInsert . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
