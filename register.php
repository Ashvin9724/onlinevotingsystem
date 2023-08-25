<?php
 
    include("connect.php");
  
   $name = $_POST['name'];
   $mobail = $_POST['mobail'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $address = $_POST['address'];
   $image= $_FILES['photo']['name'];
   $tmp_name= $_FILES['photo']['tmp_name'];
   $role = $_POST['role'];
  
   if($pass==$cpass)
   {
      move_uploaded_file($tmp_name , "../uploads/$image");
      $query = mysqli_query($con,"INSERT INTO user (name,mobail,address,password,photo,role,status,votes) VALUES('$name','$mobail','$address','$password','$image','$role',0,0)");
      
      if($query)
      {
         echo '
      <script>
      alert("Registration Successfully");
      window.location = "../";
      </script>
      ';
      }
      echo '
      <script>
      alert("some error occured");  
      window.location = "../route/register.html";
      </script>
      ';
   }
   else
   {
      echo '
      <script>
      alert("password and confirm password does not match");
      window.location = "../route/register.html";
      </script>
      ';
   }
  
?>
