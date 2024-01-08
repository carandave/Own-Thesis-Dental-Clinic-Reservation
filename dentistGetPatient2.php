<?php 

require_once "connection.php";

if($_REQUEST['preid']){
    
    // $sql1 = "SELECT t.reqId, t.patientId, t.dentistId, t.appointment_date, t.serviceId, s.service_name, s.fees, d.dentistId, d.fullname, p.patientId, p.first_name, p.last_name FROM request_appointment t INNER JOIN services s ON t.serviceId = s.serviceId INNER JOIN dentist d ON t.dentistId = d.dentistId INNER JOIN users p ON t.patientId = p.patientId WHERE t.reqId='".$_REQUEST['preid']."'"; 
    $sql1 = "SELECT t.reqId, t.patientId, t.dentistId, t.appointment_date, d.dentistId, d.fullname, p.patientId, p.first_name, p.last_name FROM request_appointment t INNER JOIN dentist d ON t.dentistId = d.dentistId INNER JOIN users p ON t.patientId = p.patientId WHERE t.reqId='".$_REQUEST['preid']."'"; 
    // $sql1 = ""; 
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