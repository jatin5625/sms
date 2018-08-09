<?php
require_once 'connection.php';
$link = mysqli_connect($servername, $username, $password,$dbname);
$patient_id = $_POST['patient_id'];
$sql = "select  pd.patient_id , pd.name,pd.city,pd.age,pd.gender ,dd.name 
from patient_detail pd , doctor_detail dd ,doctor_patient_treatment_mapping dptm
where dptm.patient_id= pd.patient_id 
and dptm.doc_id= dd.doc_id 
and dd.doc_id =".$patient_id.";";
//  echo $sql;

    if($patient_id!="")
    {
        $result = mysqli_query($link,$sql);
        echo "<table>";
        echo "<thead><tr><th>Select</th><th>Patient Name</th><th>City</th><th>Age</th><th>Gender</th></tr></thead>";
        echo "<tbody>";
        $rowcount=mysqli_num_rows($result);
        if($rowcount>0){
            $rowid=0;
            while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
            {   
                echo "<tr id='row_$rowid'>";
                    echo "<td><label><input id = 'patient_id' type='checkbox' value='".$row[0]."' name='patient_id[]' include></label></td><td >" . $row[1] . "</td><td>" . $row[2] . "</td><td >" . $row[3] . "</td><td>" . $row[4] . " </td>";
                    echo "</tr>";
                    $rowid++;
            }
        }

        else{
            echo "<tr><td colspan=6 style='color:red'>Oops!! No Patient found in this city.. </td><td><input type='hidden' id='hiddenId' value = $rowcount ></td></tr>";
        }
        
        echo "</tbody>";
        echo "</table>";

    }
	
?>