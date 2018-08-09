<?php include "connection.php";?>
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
</style>
</head>
<body>

<h3><center>DOCTOR PATIENT SMS </center></h3>

<div class="container">
  <form action="/action_page.php"

    <label>Doctor Name</label>
    <select id="name" name="doctor name">
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

    <label>Patient Name</label>
    <select id="name" name="patient name ">
   <?php 
   
    $sql1 = "select patient_id , name from patient_detail where status = 1;";
   $result1 = mysqli_query($link,$sql1);
   
   while($row = mysqli_fetch_array($result1,MYSQLI_NUM))
   {
       echo "<option value='$row[0]'>$row[1]</option>";
   } 
   ?>
  
   </select>
    
    <label>Patient age</label>
    <input type="text" id="lname" name="patientage" placeholder="age..">
    
    <label>Patient city</label>
    <select id="city" name="city">
      <option value="hansi">hansi</option>
      <option value="hisar">hisar</option>
      <option value="sirsa">sirsa</option>
    </select>
    
    <label>GENDER</label>
    <input type="text" id="lname" name="GENDER" placeholder="patient gender..">

    <label>MSG</label>
    <textarea id="MSG" name="MSG" placeholder="Write something.." style="height:200px"></textarea>

    <center><input type="submit" value="send" ></center>
  </form>
</div>

</body>
</html>
