
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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

<h3><center>DOCTOR PATIENT SMS </center></h3>

<div class="container">
  <form action="/action_page.php"
  <label>MSG</label>
    <textarea id="MSG" name="MSG" placeholder="Write something.." style="height:200px"></textarea>

    <center><input type="submit" value="send" ></center>

    <label>Doctor Name</label>
    <select id="name" name="doctor name" onchange="fetchPatient(this)">
    <?php 
    $link = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "select doc_id,name from doctor_detail
 where status=1 ;";
    $result = mysqli_query($link,$sql);
    while($row = mysqli_fetch_array($result,MYSQLI_NUM))
    {
        echo "<option value='$row[0]'>$row[1]</option>";
    }
    ?>
       
    </select>


<div id="patientId">

</div>

    <!-- <label>Patient Name</label>
    <select id="name" name="patient name " ;>

  
   </select>
    
    <label>Patient age</label>
    <input type="text" id="lname" name="patientage" placeholder="age..">
    
    <label>Patient city</label>
    <select id="city" name="country">

    </select>
    
    <label>GENDER</label>
    <input type="text" id="lname"   name="GENDER" placeholder="patient gender..">-->

    
  </form>
</div> 

</body>
<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" language="javascript">
function fetchPatient(patientid){
	var patientID =patientid.value;
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
}
</script>
</html>
