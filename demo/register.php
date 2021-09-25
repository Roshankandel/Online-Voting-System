<?php
require 'authcontroller.php';
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Here</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="register.css">
    <style>
        .form-div {
            margin: 50px auto 50px;
            padding: 25px 15px 10px 15px;
            border: 1px solid rgb(107, 216, 207);
            border-radius: 5px;
            font-size: 1.1em;
            font-family: "Lora", serif;
        }

        .form-control:focus {
            box-shadow: none;
        }

        form p {
            font-size: 0.89em;
        }

        .header {
            height: 10%;
            text-align: center;
            color: white;
            font-family: 'Courier New', Courier, monospace;

        }

        .footer {
            background-color: #524D52;
            height: 8%;
            text-align: center;
            align-content: center;
            color: white;
            padding-top: 5px;
            position: relative;

        }

        .header h2 {
            align-self: center;
            padding-top: 13px;
            font-weight: bolder;
            color: white;
        }

        .main {
            width: 100%;
            background-color: #84A6EA;
        }

        .form-div {
            background-color: white;
            box-shadow: 5px 5px #6F6F77;
        }

        .btnsignup {
            background-color: #84A6EA;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 15px;
            padding: 4px;
            font-weight: bold;
        }

        .btnsignup:hover {
            background-color: #7C8AEA;
            color: black;
            box-shadow: 2px 2px #6F6F77;
        }

        .register {
            text-align: center;
            font-weight: bold;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="header bg-dark">
        <h2>Online Voting System</h2>
    </div>

    <div class="main">
        <div class="container ">
            <div class="row">
                <div class="col-md-4 offset-md-4 form-div ">
                    <form action="register.php" method="post" enctype="multipart/form-data">
                        <h4 class="text-centre register">Register Here</h4>
                        <hr>

                        <?php if (count($errors) > 0) : ?>
                            <div class="alert alert-danger">
                                <?php foreach ($errors as $error) : ?>
                                    <li> <?php echo $error;  ?></li>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="<?php echo $username ?>" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" value="<?php echo $email ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="Role">
                                <option value="voter">Voter</option>
                                <option value="candidate">Candidate</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordconf">Confirm Password</label>
                            <input type="password" name="passwordconf" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="signup-btn" class="btn  btnsignup btn-block btn-sm"> signup</button>
                        </div>
                        <p class="text-centre">Already a member?<a href="login.php">Sign in </a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer">
        <p>&copy; Team Coding Warriers 2021<br>
            Build as a project first</p>
    </div>
</body>

</html>