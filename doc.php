
<?php 

$userName="";
include "connection.php";
include "message_save.php";
$msg1="";
$msg2="";
$userName= $_SESSION['login_user'];
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.button {border-radius: 8px;}


div.c {
    text-align: right;
} 

body {font-family: Arial, Helvetica, sans-serif;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
WELCOME &#x263A 
<?php 
echo  $userName;

?>      <h3><a href = "signout.php" style="text-decoration:none;"><div class="c">Sign Out</a></h3>


<h3><center>DOCTOR PATIENT SMS </center></h3>


<div class="container">
  <form action="doc.php" method="post">
  <label>MSG</label>
    <textarea id="MSG" name="message" placeholder="Write something.." style="height:200px"></textarea>

   


  
<label style="display:none;">Doctor Name</label>


    <select id="name" name="doctor_id"  onchange="fetchPatient()" style="display:none;" ><br>

    <?php 
    $link = mysqli_connect($servername, $username, $password, $dbname);
   
    $sql = "select dd.doc_id,dd.name from doctor_detail dd
 where dd.status=1 and dd.user_name='$userName' ;";
//  echo $sql;  
 $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($result,MYSQLI_NUM))
    {
        echo "<option value='$row[0] ' >$row[1]</option>";
     
    }
    ?>
       
    </select>
  

<div id="patientId">

</div> 
</br> </br> 
<!-- <h2><center> <a onclick="send()" href ="#"><b>send<b></center></a></h2> -->
<center> <button class="button"  name="submitform" type="submit">Send </button></center>
  </form>
</div> 

</body>
<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" language="javascript">
 
 function send(){
//   var patient_id=   $('input[name="doctorselected"]:checked').serialize();
//      alert(patient_id)

var doctorid=$('#name').val();
var msgToBeSend=$('#MSG').val();
alert(msgToBeSend)

$('input[name="doctorselected"]:checked').each(function() {
alert(this.value);
$arr=this.value.split("_");
alert($arr[0])
alert($arr[1])
fetchPatient();
});


 }


function fetchPatient(){
    // alert("function called");
	var patientID=$('#name').val();
    // alert(patientID);
	if(patientID)
	{
		$.ajax
		({
			type:'POST',
			url:'fetch_patient.php',
			data:'patient_id='+patientID,
			success:function(data)
			{
				$("#patientId").empty();
				$("#patientId").html(data);
			}
		});
	}
	else
	{
		$("#patientId").html("");
	}
}fetchPatient();
</script>
</html>