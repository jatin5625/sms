<?php 
require_once 'connection.php';
$link = mysqli_connect($servername, $username, $password,$dbname);
$doc_id =$_POST['doc_id'];
$sql= "select  pd.patient_id , pd.name,pd.city,pd.age,pd.gender ,dd.name 
from patient_detail pd , doctor_detail dd ,doctor_patient_treatment_mapping dptm
where dptm.patient_id= pd.patient_id 
and dptm.doc_id= dd.doc_id 
and dd.doc_id =".$patient_id.";";


if ($doctorid!="")
{
    $result = mysqli_query($link,$sql);
    echo "<table>";
    echo "<thead><tr><th>id</th><th>Name</th></tr></thead>";
    echo "<tbody>";
    $rowcount=mysqli_num_rows($result);
    if($rowcount>0){
        $rowid=0;
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM))
        {
            echo "<tr id='row_$rowid'>";
                echo "<td><label><input id = 'doc_id' type='checkbox' value=".$row[0]." name='total' include></label></td><td >" . $row[1] . "</td><td>" . $row[2] . "</td><td >" . $row[3] . "</td><td>" . $row[4] . " </td>";
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