<?php
session_start();
//connection to database
$conn = new mysqli("localhost", "root", "", "chatroom");
if ($conn->connect_error) {
    die('Database Error!' . $conn->connect_error);
}

$error = "";
$username = $_POST['username'];
$password = $_POST['password'];
$check = mysqli_query($conn, "SELECT * FROM admin WHERE a_username='$username' AND a_password='$password'");
if (mysqli_num_rows($check) > 0) {
    $row = mysqli_fetch_assoc($check);
    $_SESSION['aid'] = $row["aid"];
    header('location:admindashboard.php'); //Redirected to admin dashboard  page; 
    exit();
} else {
    echo '<script>
     alert("invalid credentials");
     window.location="adminlogin.php";
    </script>';
}
