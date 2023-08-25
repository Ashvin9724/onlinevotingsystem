<?php
session_start();
include('connect.php');

$votes = $_POST['gvotes'];
$total_votes = $votes + 1;
$gid = $_POST['gid'];
$uid = $_POST['userdata']['uid'];

$update_votes = mysqli_query($con,"UPDATE user SET votes='$total_votes' WHERE id='$gid'");
$update_user_status = mysqli_query($con,"UPDATE user SET status=1 WHERE id='$uid'");
 if($update_votes  && $update_user_status)
 {
    $groups=mysqli_query($con,"SELECT * FROM user WHERE role=2");
    $groupsdata=mysqli_fetch_all($groups,MYSQLI_ASSOC);
    $_SESSION['userdata']['status']= 1;
    $_SESSION['groupsdata']= $groupsdata;

    echo'
     <script>
     alert("voting successfully");
     window.location = "../route/dashboard.php";
     </script>
     ';
 }
 else{
     echo'
     <script>
     alert("Some Error Occured!!");
     window.location = "../route/dashboard.php";
     </script>
     ';
 }

?>