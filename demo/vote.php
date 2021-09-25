<?php
session_start();
include('db.php');
$votes = $_POST['gvotes'];
$total_votes = $votes + 1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];
$update_votes = mysqli_query($conn, "UPDATE user SET votes='$total_votes' Where id='$gid'");
$update_vote_status = mysqli_query($conn, "UPDATE user SET status=1 Where id='$uid'");
if ($update_votes and $update_vote_status) {
  $groups = mysqli_query($conn, "SELECT * FROM user WHERE role='candidate'");
  $groupdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
  $_SESSION['userdata']['status'] = 1;
  $_SESSION['groupsdata'] = $groupdata;
  echo '
  <script>
    alert("Voted Succesfully!");
    window.location="dashboard.php";
  </script>
  ';
} else {
  echo '
    <script>
      alert("Error occured!!");
      window.location="dashboard.php";
    </script>
    ';
}
