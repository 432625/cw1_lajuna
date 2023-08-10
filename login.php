<?php
include "dbconnect.php";

if(isset($_POST['submit']))
{
  if($_POST['submit']=="login")
  { 
        $username=$_POST['login_username'];
        $password=$_POST['login_password'];
        $gmail=$_POST['login_email'];
        $location=$_POST['location'];
        $query = "SELECT * from users where UserName ='$username' AND Password='$password'";
        $result = mysqli_query($con,$query)or die(mysql_error());
        if(mysqli_num_rows($result) > 0)
        {
             $row = mysqli_fetch_assoc($result);
             $_SESSION['user']=$row['UserName'];
             $email=$row['Email'];
             $location=$row['Location'];
             header("Location: index.php?login=" . "Successfully Logged In");
        }
        else
          echo "Incorrect username or password";
   }
}

?>	
