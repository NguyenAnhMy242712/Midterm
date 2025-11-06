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

// Lấy dữ liệu 
$username = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password']; 
$dob = $_POST['dob'];
$nationality = $_POST['nationality'];
$phone = $_POST['phonenumber'];



// "Làm sạch" tất cả dữ liệu để tránh lỗi SQL
$username_safe = mysqli_real_escape_string($conn, $username);
$email_safe = mysqli_real_escape_string($conn, $email);
$password_safe = mysqli_real_escape_string($conn, $password); // "Làm sạch" mật khẩu gốc
$dob_safe = mysqli_real_escape_string($conn, $dob);
$nationality_safe = mysqli_real_escape_string($conn, $nationality);
$phone_safe = mysqli_real_escape_string($conn, $phone);

// KIỂM TRA TRÙNG LẶP
$s = "SELECT * FROM users WHERE username='$username_safe'";
$result = mysqli_query($conn, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    echo "Username Exists. Please go back and try another one.";
} else {
    // Chèn mật khẩu đã "làm sạch" ($password_safe)
    $reg = "INSERT INTO users (username, email, password, dob, nationality, phonenumber) 
            VALUES ('$username_safe', '$email_safe', '$password_safe', '$dob_safe', '$nationality_safe', '$phone_safe')";
    
    if (mysqli_query($conn, $reg)) {
        header("Location: login.php");
        exit(); 
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>