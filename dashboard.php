<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../");
}
$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0)
{
    $status ='<b style="color:red;">Note Voted</b>';
}
else{
    $status ='<b style="color:green;"> Voted</b>';
}
?>
<html>
   <head>
     <title>
     Online Voting System - Dashboard
    </title>
    </head>
    <link rel="stylesheet" href="../css/style.css">
    <body>
     <div class="mainsection">
     <center>   
     <div class="headersection">
        <a href="../">  <button class="backbtn">Back</button></a>
        <a href="../"> <button class="logbtn">Logout</button></a>
        <h1>Online Voting System</h1>
        <hr>   
        </div>
        </center>
    </div>
    <div class="mainpanel">
        <div class="profile">
          <center>  <img src="../uploads/<?php echo $userdata['photo']?>" hegiht="100" width="100"></center><br><br>
            <b>Name :<?php echo $userdata['name']?></b><br><br>
            <b>Mobail :<?php echo $userdata['mobail']?></b><br><br>
            <b>Address:<?php echo $userdata['address']?></b><br><br>
            <b>Status :<?php echo $status ?></b><br><br>
        </div> 
        <div class="Group">
            <?php
            if($_SESSION['groupsdata'])
            {
                for($i=0; $i<count($groupsdata); $i++)
                {
                    ?>
                    <div>
                        <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo']?> " height="100" width="100" alt=""><br><br>
                        <b>Group Name :</b><?php echo $groupsdata[$i]['name']?><br><br>
                        <b>Votes :</b><?php echo $groupsdata[$i]['votes']?><br><br>
                        <form action="../api/vote.php" method="post">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                           <?php
                           if($_SESSION['userdata']['status']==0){
                           ?>
                           <input type="submit" name="votebtn" value="vote" class="votebtn">
                           <?php
                           }
                           else{
                            ?>
                            <button disabled type="button" name="votebtn" value="vote" class="voted" >voted</button>
                            <?php
                           }
                           ?>
                        </form>
                    </div>
                    <?php
                }

            }
            else{

            }
            
            ?>
        </div>
        </div>
    </body>
   
</html>