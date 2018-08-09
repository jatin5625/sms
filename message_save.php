<?php
$msg1="";
$msg2="";
$msg3="";
$patient="";

session_start();
if (!isset($_SESSION['login_user']))
// echo "fgdvfsfrsgfsgdgdgd";
{header("location:index.php");}
	// require_once 'DB.class.php';
	if (isset($_POST['submitform'])){
		$errorFlag = 0;
		if (!isset($_POST['message']) || trim($_POST['message'], " ") == "")
		{
            $msg1 = "Please enter message";
            echo $msg1;
			$errorFlag = 1;
		}
		else
		{
			$message=$_POST['message'];
		}
		if (!isset($_POST['doctor_id']) || trim($_POST['doctor_id'], " ") == "")
		{
			$msg2 = "Please select doctor";
			$errorFlag = 1;
		}
		
		else
		{
			$doctor_id = $_POST['doctor_id'];
        }

        if (!isset($_POST['patient_id']) )   
		{
            $msg3 = "Please select patient name";
            echo $msg3;
			$errorFlag = 1;
		}
		
		else
		{
            $patient_id = $_POST['patient_id'];
            // $patient = implode(",", $_POST['patient_id']);
        }
   
        
        
        
	
		if ($errorFlag == 0)
		{
		$link = mysqli_connect($servername, $username, $password, $dbname);
        if ($link->connect_error)
        {

            die("Connection failed: " . $link->connect_error);
            $errormessage = "Sorry!! your information could not be saved , please try again.";
        }   

		if (!$link->connect_error && $link)
		{
			for ($i=0; $i<count($patient_id); $i++)
			{
				// $query="INSERT INTO example (orange) VALUES ('" . $checkBox[$i] . "')";     
				$sql = "insert into msg_detail (doc_id,message,patient_id,status) values('".$doctor_id."','".$message."','". $patient_id[$i] ."','4');";
				// mysqli_query($query) or die (mysqli_error() );
				$result = mysqli_query($link, $sql);
				// echo $sql; 
			}
			
            // $result = mysqli_query($link, $sql);
      
			if($result){
                   header('Location:onsend.php?success=1&doctor_id='.$doctor_id.'&msg='.$message.'patient_id='.$patient);
            }
		
          
		
			
		}
 else{
	
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
		}


}

				
?>