<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'user_car_system');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = mysqli_real_escape_string($con, $_POST['user']);
$pass = mysqli_real_escape_string($con, $_POST['password']);

$s = "SELECT * FROM users WHERE username='$name' AND password='$pass'";

$result = mysqli_query($con, $s);

if ($result) {
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $_SESSION['username'] = $_POST['user'];
        header('location:home.php');
        exit();
    } else {
        header('location:login.php');
        exit();
    }
} else {
    echo "SQL Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
