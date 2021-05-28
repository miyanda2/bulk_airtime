<?php

include_once '../functions.php';

$db = new DataSource();
$conn = $db->getConnection();


if (isset($_POST['save'])) {

    $accesskey = $_POST['accesskey'];
    


    $sqlInsert = "UPDATE `setting` SET `nv_accesskey` = '$accesskey'";

    if (mysqli_query($conn, $sqlInsert)) {
        echo "successfully !";
    } else {
        echo "Error: " . $sqlInsert . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
