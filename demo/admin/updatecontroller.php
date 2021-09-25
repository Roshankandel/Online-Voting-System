<?php

$conn = new mysqli("localhost", "root", "", "chatroom");
if ($conn->connect_error) {
    die('Database Error!' . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $id = $_GET['id'];

    $query = " SELECT username,email,password,verified,role FROM user WHERE id=$id ";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verified = $_POST['verified'];
    $role = $_POST['role'];
    $query = "UPDATE user SET username='$username',password='$password',email='$email',verified='$verified',role='$role' WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>
        alert("Updated successfully!!");
        window.location="admindashboard.php";
        </script>';
        // } else {
        //     echo '<script>
        //     alert("Error occured!!");
        //     window.location="update.php";
        //     </script>';
        // }
    }
}
