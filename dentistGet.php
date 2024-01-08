<?php 

require_once "connection.php";

if($_REQUEST['empid']){
    $sql1 = "SELECT * FROM dentist WHERE dentistId='".$_REQUEST['empid']."'"; 
    $resultSet1 = mysqli_query($conn, $sql1);
    $empData = array();
    while($emp = mysqli_fetch_assoc($resultSet1)){
        $empData = $emp;
    }

    echo json_encode($empData);
}

else{
    echo 0;
}
//Dun na tayo sa pag iinput ng treatment data dentistTreatment_view.php
?>