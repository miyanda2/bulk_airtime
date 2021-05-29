<?php

include_once '../../functions.php';

$db = new DataSource();
$conn = $db->getConnection();


if (isset($_POST['save'])) {

    $pubkey = $_POST['pubkey'];
    $seckey = $_POST['seckey'];


    $sqlInsert = "UPDATE `setting` SET `nx_pubkey` = '$pubkey' , `nx_seckey` = '$seckey' ";

    if (mysqli_query($conn, $sqlInsert)) {
        echo "successfully !";
    } else {
        echo "Error: " . $sqlInsert . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}


