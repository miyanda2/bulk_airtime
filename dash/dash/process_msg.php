<?php

include_once '../functions.php';

$db = new DataSource();
$conn = $db->getConnection();


if(isset($_POST['save']))
{	 
	 
	 $msg = $_POST['msg'];
	 $sqlInsert = "UPDATE `message` SET `msg` = '$msg' WHERE `message`.`sn` = 1";
	 
	 if (mysqli_query($conn, $sqlInsert)) {
		echo "successfully !";
	 } else {
		echo "Error: " . $sqlInsert . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

?>


