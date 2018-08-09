<?php
$error="";
session_start();
if (isset($_SESSION['login_user']))
// echo "fgdvfsfrsgfsgdgdgd";
{header("location:doc.php");}
if(isset($_POST["submitform"])) {
    $myusername="";
    $mypassword="";
    $errorflag = 1;
    if (!isset($_POST['username']) || trim($_POST['username']) == "")
    {
        $msg1 = "Please enter your username";
        echo $msg1;
        $errorFlag = 0;
    }
    else
    {
        $myusername =$_POST['username'];
    }
    if (!isset($_POST['password']) || trim($_POST['password']) == "")
		{
            $msg2 = "Please enter your password";
            echo $msg2;
			$errorFlag = 0;
		}
        else
		{
			$mypassword = $_POST['password'];
		}
 include "connection.php";
   // username and password sent from form 
   $link = mysqli_connect($servername, $username, $password, $dbname);
  $sql ="select dd.doc_id,dd.user_name , dd.password from doctor_Detail dd WHERE BINARY dd.user_name ='$myusername' AND BINARY dd.password ='$mypassword' ;";
  $result = mysqli_query($link , $sql);
  $count=mysqli_num_rows($result);
  if($count == 1) {
    //session_register("myusername");
    $_SESSION['login_user'] = $myusername;
    
    header("location: doc.php");
 }else {
    $error = "Your User Name or Password is invalid";
 }  }
?>



<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:20px;
         }
         .box {
            border:#666666 solid 1px;
         }

         .submit {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.submit {border-radius: 8px;}
      </style>
      
   </head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});
</script>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               <?php echo $error; ?>
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" include name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" include name = "password" class = "box" /><br/><br />
                  <input class = "submit" type = "submit" name="submitform" value = " login "/><br />
                  <!-- <button  type="button">Submit</button> -->
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>


