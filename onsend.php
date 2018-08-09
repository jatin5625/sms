<?php 
if (isset($_GET['success'])){

    $doc_id = $_GET['doctor_id'];
    $message=$_GET['msg'];

}
?>

<!DOCTYPE html>
<html>
<style>
div.c {
    text-align: right;
} 
</style>
<body>
<body bgcolor = "#FF9F33">
<h2><a href = "signout.php" style="text-decoration:none;"><div class="c">Sign Out</a></h2>
<H1><CENTER><p style="color:blue ">MESSAGE SENT &#9745 <br> </p></CENTER></H1>
<h2><center> <a href ="doc.php" style="text-decoration:none;"><b>SEND MORE MESSAGES<b></center></a></h2>


</body>
</html>
