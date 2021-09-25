<?php

session_start();
include  'db.php';



$errors = array();   //making $error global variable;
$username = "";
$email = "";
// if users clicks on  the signup button
if (isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordconf = $_POST['passwordconf'];
    $role = $_POST['role'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    //validation of the user input
    if (empty($username)) {
        $errors['username'] = "Username Required!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please Enter a valid email!";
    }
    if (empty($email)) {
        $errors['email'] = "Email  Required!";
    }
    if (empty($password)) {
        $errors['password'] = "Password Required!";
    }
    if ($password !== $passwordconf) {
        $errors['password'] = "The two passwords do not match!";
    }
    if (empty($role)) {
        $errors['role'] = "Please select your role";
    }
    //check douplicate email
    $emailQuery = "SELECT * FROM user WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = "Email Already Exists";
    }
    if (count($errors) === 0) {
        move_uploaded_file($tmp_name, "../demo/uploads/$image");
        //uploads images to the folder 

        $token = bin2hex(random_bytes(50)); // token for email verification..generates random string
        $verified = false;
        $sql = mysqli_query($conn, "INSERT INTO user(username,email,verified,token,password,photo,role,status,votes) 
                 VALUES('$username','$email',0,'$token','$password','$image','$role',0,0)");
        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param('ssdss', $username, $email, $verified, $token, $password);
        // //s->string,d->boolean;

        // sendVerificationEmail($email,$token);
        if ($sql) {
            //login user
            // $user_id = $conn->insert_id;
            // $_SESSION['id'] = $user_id;
            // $_SESSION['username'] = $username;
            // $_SESSION['email'] = $email;
            // $_SESSION['verified'] = $verified;




            // send verification mail

            //             $to = $email;
            //             $subject = "Email Verification";
            //             $message = '
            //        <html lang="en">
            //        <head>
            //            <meta charset="UTF-8">
            //            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            //            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            //            <title>Verify email</title>
            //        </head>
            //        <body>
            //            <div class="wrapper">
            //                 <p>
            //                    Thankyou for signing up on our website
            //                    .Please click on the link below to verify your email. 
            //                 </p>
            //                 <a href="http://localhost/demo/index.php?token=' . $token . '">
            //                   Verify your email address
            //                  </a>
            //            </div>
            //        </body>
            //        </html> ';
            //             $headers = "From: rkrtest2021@gmail.com";

            //             $headers = "MIME-Version: 1.0" . "\r\n";
            //             $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            //             if (mail($to, $subject, $message, $headers)) {
            //                 echo " Email sent successfully to" . $to;
            //             } else {
            //                 echo "Email not sent";
            //             }




            //             //set flash message

            //             $_SESSION['message'] = "You are now logged in!";
            //             $_SESSION['alert-class'] = "alert-success";
            header('location:login.php'); //Redirected to login page; 
            exit();
        } else {
            $errors['db_error'] = "Database error:Failed to Register";
        }
    }
}


//<!-- if user clicks on the login button-->

if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    //validation of the user input
    if (empty($username)) {
        $errors['username'] = "Username Required!";
    }
    if (empty($password)) {
        $errors['password'] = "Password Required!";
    }
    if (count($errors) === 0) {
        $check = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password' AND role='$role'");
        if (mysqli_num_rows($check) > 0) {
            $userdata = mysqli_fetch_array($check, MYSQLI_ASSOC);
            $groups = mysqli_query($conn, "SELECT * FROM user WHERE role='candidate'");
            $groupdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);



            $_SESSION['userdata'] = $userdata;
            $_SESSION['groupsdata'] = $groupdata;


            header('location:dashboard.php'); //Redirected to home page; 
            exit();
        } else {
            $errors['db_error'] = "Invalid Credentials ";
        }
    }
}
