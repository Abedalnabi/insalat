<?php
require_once "conn.php";

$first_name = $last_name = $email = $phone_number = $address = "";

$id = $_GET["id"];
if(isset($_POST)){
$id = $_GET["id"];

    $query = mysqli_query($conn, "DeLETE FROM users WHERE id = '$id'");
    echo 'deleted successfully';
    echo '<br/>';
    echo '<a href="index.php">back</a>';
}

