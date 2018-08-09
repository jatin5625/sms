<?php 
$msg1="";
session_start ();
 if (!isset($_SESSION['id']))
 {
     require_once '../connection.php';

    if (isset($post['submitform'])){
        $errorflag = 1;
        
        if (!isset($post['email'] || trim($post['email']," " == "")
            {
                 $msg1="please enter username"
                 $errorflag=0;
}
else {
    $email=$post['$email']
}
if (isset($post['$password'])) || trim ($post['password']," " = "")
{ 
     $msg2 = "please enter password";
 $errorflag=0;
}
else { $password_user= $post['$password']}

if ($errorflag==1)
{
    $link = mysqli_connect($server_name,$username,$password,$dbname );

if ($link->connect_error)
{ 
    die ("connection failed...".link->connect_error);
    $errormessage = "sorry your info could not be saved on the page ,please try again ";
}
if (!$link->connect_error && $link )
{
  $sql= " select ud.id , ud.name , ud.email_id from user_detail ud BINARY where username=$username  and passwrod =$password_user"
 $result= mysqli_query($link, $sql);
 $count=mysqli_num_rows($result);

 if ($count==1)
 {
 while($row = mysqli_fetch_array($result , mysqli_num))
 {
   $session['id']=''.$row[0].'';
   $session['name']=''.$row[1].'';  
   $id = $session['id'];
   $name = $session['name'];
 }
           header ('Location: ../admin/production?message=Welcome');
}
else{
  header('Location:../login?error=2 ');}

     else {
         "error could not be able to execute $sql.".mysqli_error($link);
     }                                           

}
$mysqli_close ($link);
}
    }
    else 
    { session_unset();
        session_destroy();
    }
    ?>