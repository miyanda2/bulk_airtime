<?php

include_once '../../functions.php';

$db = new DataSource();
$conn = $db->getConnection();


if (isset($_POST['save'])) {

    $apikey = $_POST['apikey'];
    $apisek = $_POST['apisec'];


    $sqlInsert = "UPDATE `setting` SET `nx_apikey` = '$apikey' , `nx_apisec` = '$apisek' ";

    if (mysqli_query($conn, $sqlInsert)) {
        echo "successfully !";
    } else {
        echo "Error: " . $sqlInsert . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}


