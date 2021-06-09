<?php

include "../../functions.php"; // Using database connection file here

$data_source = new DataSource;

$conn = $data_source->getConnection();

$id = $_GET['id']; // get id through query string

// print_r($id);
// die();

$del = mysqli_query($conn,"DELETE from tag where event = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:../events.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
