<?php
session_start();
if (!isset($_SESSION['aid'])) {
    header('location:adminlogin.php');
    exit();
}
$conn = new mysqli("localhost", "root", "", "chatroom");
if ($conn->connect_error) {
    die('Database Error!' . $conn->connect_error);
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .header {
            align-items: center;
            display: inline-block;
            background-color: #343a40;
            height: 10%;
            width: 100%;

        }

        #btnlogout {
            float: right;
            margin-right: 5%;
            align-self: center;
            margin-top: -20px;
            border-radius: 10px;
            padding: 5px;
            background-color: #366abf;
            color: white;
            height: 40%;
            width: 5%;
            text-align: center;
            cursor: pointer;
        }

        #btnlogout:hover {
            background-color: #366abf;
            box-shadow: 2px 2px brown;
        }

        .header h3 {
            transform: translate(0%, 70%);
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
            color: white;
        }

        .header img {
            margin-left: 30px;
            float: left;
            align-self: center;
            padding-top: 10px;
        }

        .table {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="admin-img.png" alt="admin img" height="60px" width="70px">
        <h3>Admin dashboard</h3>
        <a id="btnlogout" href="adminlogout.php">logout</a>
    </div>
    <br>
    <div class="container-fluid">

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Verified</th>
                    <th>Role</th>
                    <th>Votes</th>
                    <th>Voting status</th>
                    <th style="color: green;">Update</th>
                    <th style="color: red;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT*FROM user";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['verified'] ?></td>
                        <td><?php echo $row['role'] ?></td>
                        <td><?php echo $row['votes'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><a href="update.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit" style="color: green;"></i></a></td>
                        <td><a href="delete.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="color: red;"></i></a></td>
                    </tr>
                <?php

                } ?>
            </tbody>
        </table>

    </div>

</body>
<!--Bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>