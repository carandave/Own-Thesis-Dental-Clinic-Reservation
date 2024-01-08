<?php                
require 'database_connection.php'; 

if(isset($_POST['action']) && $_POST['action'] == 'Appoint'){
$patient_name = $_POST['patient_name'];
$dentist_name = $_POST['dentist_name'];
// $service_name = $_POST['service_name'];
$appoint_date = $_POST['appoint_date']; 
$concerned = $_POST['concerned']; 
// $appoint_time = $_POST['appoint_time']; 
$patient_status = $_POST['patient_status'];
$dateSubmitted = date("F d, Y");
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];
$question3 = $_POST['question3'];
$question4 = $_POST['question4'];
$question5 = $_POST['question5'];
$question6 = $_POST['question6'];
$question7 = $_POST['question7'];
$question8 = $_POST['question8'];
$question9 = $_POST['question9'];
$question10 = $_POST['question10'];
$question11 = $_POST['question11'];
$question12 = $_POST['question12'];
$question13 = $_POST['question13'];

$sql=$con->prepare("SELECT appointment_date, dentistId FROM request_appointment WHERE appointment_date=? AND dentistId=?");
$sql->bind_param("ss", $appoint_date, $dentist_name);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_array(MYSQLI_ASSOC);
$num_rows = $result->num_rows;

    // echo $row['appointment_date'];
    // echo $row['appointment_time'];
    // echo($result->num_rows);
    // print_r($row);

// if($num_rows > 0){
//     echo "SameAppointment";
//     // echo "The Appointment Date and Time is already appointed. Please Try Again!";
    
//     // echo "One";
//     // echo ("Location: requestOnline.php");
    
//     // echo '<script>alert("The appointment Date and Time is already appointed. Please Try Again!");</script>';
// }


    $insert_query = "INSERT INTO `request_appointment`(`patientId`,`dentistId`,`appointment_date`,`concerned`,`date_submitted`,`status`,`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`q7`,`q8`,`q9`,`q10`,`q11`,`q12`,`q13`) values ('".$patient_name."','".$dentist_name."','".$appoint_date."','".$concerned."','".$dateSubmitted."','".$patient_status."','".$question1."','".$question2."','".$question3."','".$question4."','".$question5."','".$question6."','".$question7."','".$question8."','".$question9."','".$question10."','".$question11."','".$question12."','".$question13."')";             
    mysqli_query($con, $insert_query);
    echo "UniqueAppointment";

    // if(mysqli_query($con, $insert_query))
    // {

    //     echo "UniqueAppointment";
    //     // echo '<script>alert("Appointment Added Successfully!")</script>';
    //     // $data = array(
    //     //             'status' => true,
    //     //             'msg' => 'Appointment Added Successfully!'
    //     //         );
    // }
    // else
    // {
    //     // $data = array(
    //     //             'status' => false,
    //     //             'msg' => 'Sorry, Appointment not added.'				
    //     //         );
    // }

    // echo json_encode($data);	

}




			


?>
