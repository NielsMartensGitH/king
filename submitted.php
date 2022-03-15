<?php 

ob_start();
require 'vendor/autoload.php';
include "connection.php" ;

if(isset($_REQUEST['submitted'])) {

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $birthDate = mysqli_real_escape_string($conn, $_POST['birthDate']);



    $query = "INSERT INTO `students`(`firstName`, `lastName`, `birthDate`) VALUES ('$firstName','$lastName','$birthDate')";

    mysqli_query($conn, $query);

    $test = mysqli_insert_id($conn);

    echo $test;

    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>U hebt de meet & greet gewonnen. Proficiat!</h1>
</body>
</html>