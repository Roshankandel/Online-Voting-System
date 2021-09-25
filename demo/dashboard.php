 <?php

  include 'authController.php';

  if (!isset($_SESSION['userdata'])) {     //if user is not logged in and tries to         //access the index page the following code
    header('location:login.php');  //redirects to the login page
    exit();
  }
  $userdata = $_SESSION['userdata'];
  $candidatedata = $_SESSION['groupsdata'];

  if ($_SESSION['userdata']['status'] == 0) {
    $status = '<strong style="color:red">Not Voted</strong>';
  } else {
    $status = '<strong style="color:green">Voted</strong>';
  }

  ?>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home page</title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <style>
     #profile {
       float: left;
       background: white;
       width: 100% !important;
     }

     .userinfo {
       padding-left: 10px;
     }

     #group {
       margin-top: 10px;
       margin-left: 7%;
       align-items: center;
       background: white !important;
       width: 55%;
     }

     #votebtn {
       padding: 10px;
       border-radius: 8px;
       width: fit-content;
       background-color: #4a75ca;
       color: white;
       font-size: medium;
       border: 1px solid black;
     }

     #voted {
       padding: 10px;
       border-radius: 8px;
       width: fit-content;
       background-color: rgb(10, 163, 10);
       color: white;
       font-size: medium;
       border: 1px solid black;
     }

     .header {
       display: block;
       height: 10%;
       text-align: center;
       color: white;
       font-family: "Courier New", Courier, monospace;
       background-color: #3a3e45;
     }


     .header h2 {
       align-self: center;
       padding-top: 13px;
       font-weight: bolder;
       color: white;
     }

     #btnlogout {
       margin-top: -3%;
       margin-right: 10px;
       border-radius: 8px;
       width: fit-content;
       background-color: #84A6EA;
       color: white;
       font-size: 15px;
       border: 1px solid black;
       float: right;
       font-weight: bold;
     }

     .main {
       background-color: #84A6EA;
       width: 100%;
     }

     #profile {
       box-shadow: 5px 5px #6F6F77;
       border-radius: 20px;
     }

     #group {
       box-shadow: 5px 5px #6F6F77;
       border-radius: 20px;

     }

     .groupimg {
       float: right;
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
   </style>
 </head>



 <body>

   <div class="header">
     <h2>Online Voting System</h2>
     <a href="logout.php"><button id="btnlogout" class="btn">Logout</button></a>
   </div>

   <div class="container-fluid main">
     <br><br>
     <div class="row">
       <div class="col-md-4  col-sm-6 ml-3 mr-2 mt-2">
         <div id="profile">

           <center> <img src="../demo/uploads/<?php echo $userdata['photo'] ?>" height=100 width=100 alt="Profile photo" class="mt-3"></center><br><br>
           <div class="userinfo">
             <strong>Name: </strong><?php echo $userdata['username'] ?><br><br>
             <strong>Email: </strong><?php echo $userdata['email'] ?><br><br>
             <strong>Status: </strong><?php echo $status ?><br><br><br>
           </div>
         </div>
       </div>
       <br><br>


       <div id="group">
         <div class="col-md-8 col-sm-6 ml-5 mt-3">

           <?php
            if ($_SESSION['groupsdata']) {
              for ($i = 0; $i < count($candidatedata); $i++) {
            ?>
               <div><br>


                 <img class="groupimg" src="../demo/uploads/<?php echo $candidatedata[$i]['photo'] ?>" height="100" width="100" alt="candidate image"><br><br>
                 <strong>Candidate Name:</strong><?php echo $candidatedata[$i]['username'] ?><br>
                 <!-- <strong>Votes:</strong><?php //echo $candidatedata[$i]['votes'] 
                                              ?><br><br> --><br>


                 <form action="../demo/vote.php" method="POST">
                   <input type="hidden" name="gvotes" value="<?php echo $candidatedata[$i]['votes'] ?>">
                   <input type="hidden" name="gid" value="<?php echo $candidatedata[$i]['id'] ?>">


                   <?php
                    if ($_SESSION['userdata']['status'] == 0) {
                    ?>
                     <input type="submit" name="votebtn" value="vote" id="votebtn">
                   <?php
                    } else {
                    ?>
                     <button disabled type="button" name="votebtn" class="btn btn-primary" value="vote" id="voted">Voted</button>
                   <?php
                    }
                    ?>
                 </form>
               </div>
               <hr>
           <?php
              }
            } else {
              echo '<script>
              alert("Error occured!!");
              windows.location="../demo/dashboard.php";
              </script>';
            }

            ?>
         </div>
       </div>
     </div>
     <br>
   </div>
   <div class="footer">
     <p>&copy; Team Coding Warriers 2021<br>
       Build as a project first</p>
   </div>


 </body>
 <!--Bootstrap-->


 </html>