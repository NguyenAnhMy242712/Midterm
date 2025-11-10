<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, "user_car_system");

$username    = $_POST['user'];
$email       = $_POST['email'];
$password    = $_POST['password'];
$dob         = $_POST['dob'];
$nationality = $_POST['nationality'];
$phone       = $_POST['phonenumber'];

$s = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if ($num == 1) {
    echo "<script>
            alert('Username already exists! Please try another one.');
            window.location.href = 'registration.php';
          </script>";
} else {
    $reg = "INSERT INTO users (username, email, password, dob, nationality, phonenumber)
            VALUES ('$username', '$email', '$password', '$dob', '$nationality', '$phone')";
    mysqli_query($con, $reg);

    echo "<script>
            alert('Registration successful! Please login.');
            window.location.href = 'login.php';
          </script>";
}

mysqli_close($con);
?>