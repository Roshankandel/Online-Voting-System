<?php

$conn = new mysqli("localhost", "root", "", "chatroom");
if ($conn->connect_error) {
    die('Database Error!' . $conn->connect_error);
}
$id = $_GET['id'];

$query = " SELECT username,email,password,verified,role FROM user WHERE id=$id ";
$result = $conn->query($query);
$row = $result->fetch_assoc();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">



    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Update user information</title>
</head>
<style>
    body {
        margin: 0;
        font-size: .9rem;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        text-align: left;
        background-color: #f5f8fa;
    }

    .my-form,
    .login-form {
        font-family: Raleway, sans-serif;
    }

    .card-header {
        color: white;
        font-weight: bold;
        text-align: center;
    }

    .my-form {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .my-form .row {
        margin-left: 0;
        margin-right: 0;
    }

    .login-form {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .login-form .row {
        margin-left: 0;
        margin-right: 0;
    }
</style>

<body>



    <main class="my-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark ">Update information</div>
                        <div class="card-body">
                            <form name="my-form" action="updatecontroller.php?id=<?php echo $id; ?>" method="POST">
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">UserName</label>
                                    <div class="col-md-6">
                                        <input type="text" id="full_name" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="text" id="user_name" class="form-control" name="password" value="<?php echo $row['password']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Verified</label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control" name="verified" value="<?php echo $row['verified']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Role</label>
                                    <div class="col-md-6">
                                        <input type="text" id="present_address" class="form-control" name="role" value="<?php echo $row['role']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" class="btn btn-primary" name="submit">

                                    </input>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>