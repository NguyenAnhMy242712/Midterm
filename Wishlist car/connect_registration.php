<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "user_car_system"; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password']; 
$dob = $_POST['dob'];
$nationality = $_POST['nationality'];
$phone = $_POST['phonenumber'];



$s = "SELECT * FROM users WHERE username='$username'";

$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    echo "Username Exists. Please go back and try another one.";
} else {
    $reg = "INSERT INTO users (username, email, password, dob, nationality, phonenumber) 
            VALUES ('$username', '$password', '$email', '$dob', '$nationality', '$phone')";
    
    if (mysqli_query($conn, $reg)) {
        header("Location: login.php");
        exit(); 
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
