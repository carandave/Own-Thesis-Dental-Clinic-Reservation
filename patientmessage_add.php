<?php 
    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'addMessage'){
         $name = $_POST['name'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $message = $_POST['message'];
         
         $dateSubmitted = date("Y-m-d");
         

        // $stmt = $conn->prepare("INSERT INTO treatment (patientId, dentistId, serviceId, date_visit, service_name, teethNo, description, fees, remarks, dateTreatmentSubmitted) VALUES (?,?,?,?,?,?,?,?,?,?)"); // Mag peprapre ulit tayo ng statement para makapg Insert ng data sa database
        // $stmt->bind_param("iiissssssd", $patientId, $dentistId, $serviceId, $dateVisit, $patientTreatment, $teeth_number, $description, $patientFees, $patientRemarks, $dateSubmitted); // Mag babind ulit tayo ng parameter para sa prepare statement
        
        
        
        $insert_query = "INSERT INTO `querymessages`(`name`, `email`, `phone`, `message`, `date_submitted`) values ('".$name."', '".$email."','".$phone."','".$message."','".$dateSubmitted."')";             
        $execute = mysqli_query($conn, $insert_query);

        if($execute){
            echo "Messaged";
        }

        else{
            echo "NotMessaged";
        }
        
    }

    

?>