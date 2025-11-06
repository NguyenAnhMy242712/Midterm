<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "user_car_system"; 

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from form
$username = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password']; 
$confirm_pass = $_POST['confirm_password'];
$dob = $_POST['dob'];
$nationality = $_POST['nationality'];
$phone = $_POST['phonenumber'];

// Simple validation
if ($password != $confirm_pass) {
    die("Error: Password and Confirm Password do not match. Please go back.");
}

if (empty($username) || empty($email) || empty($password)) {
    die("Error: Please fill in all required fields (Username, Email, Password).");
}

// "Clean" the data for security
$username_safe = mysqli_real_escape_string($conn, $username);
$email_safe = mysqli_real_escape_string($conn, $email);
$password_safe = mysqli_real_escape_string($conn, $password); 
$dob_safe = mysqli_real_escape_string($conn, $dob);
$nationality_safe = mysqli_real_escape_string($conn, $nationality);
$phone_safe = mysqli_real_escape_string($conn, $phone);

// SQL query to insert data
$sql = "INSERT INTO users (username, email, password, dob, nationality, phonenumber) 
        VALUES ('$username_safe', '$email_safe', '$password_safe', '$dob_safe', '$nationality_safe', '$phone_safe')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    
    echo "<h2>Registration Successful!</h2>";
    echo "<p>Account saved: <strong>" . htmlspecialchars($username) . "</strong>.</p>";
    echo "<p>(Note: The password was saved without encryption).</p>";
    echo "<p><a href='login.php'>Go to Login page</a></p>";
    echo "<p><a href='registration.php'>Back to Registration page</a></p>";

} else {
    // Handle errors (like duplicate entry)
    if (mysqli_errno($conn) == 1062) {
        echo "<h2>Registration Failed!</h2>";
        echo "<p>Error: This Username or Email is already in use.</p>";
        echo "<p><a href='registration.php'>Try again</a></p>";
    } else {
        // Other SQL errors
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);

?>