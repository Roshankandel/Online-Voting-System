<?php
$conn = new mysqli("localhost", "root", "", "chatroom");
if ($conn->connect_error) {
    die('Database Error!' . $conn->connect_error);
}
$id = $_GET['id'];
$deletequery = "DELETE FROM user WHERE id=$id";
$query = mysqli_query($conn, $deletequery);
if ($query) {
?>
    <script>
        alert("Deleted successfully!");
        window.location = "admindashboard.php";
    </script><?php

            } else {
                ?>
    <script>
        alert("Error can't be Deleted!");
    </script><?php
            } ?>