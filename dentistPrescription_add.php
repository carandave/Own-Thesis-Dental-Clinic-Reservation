<?php 
    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'addPrescription'){
         $reqId = $_POST['reqId'];
         $spec_patientId = $_POST['spec_patientId'];
         $dentistId = $_POST['dentistId'];
        //  $serviceId = $_POST['serviceId'];
         $patientName = $_POST['patientName'];
         $dentistName = $_POST['dentistName'];
         $dateToday = $_POST['dateToday'];
         $medicine = $_POST['medicine'];
         $notes = $_POST['notes'];
         $dateSubmitted = date('Y-m-d');

         

        // $stmt = $conn->prepare("INSERT INTO treatment (patientId, dentistId, serviceId, date_visit, service_name, teethNo, description, fees, remarks, dateTreatmentSubmitted) VALUES (?,?,?,?,?,?,?,?,?,?)"); // Mag peprapre ulit tayo ng statement para makapg Insert ng data sa database
        // $stmt->bind_param("iiissssssd", $patientId, $dentistId, $serviceId, $dateVisit, $patientTreatment, $teeth_number, $description, $patientFees, $patientRemarks, $dateSubmitted); // Mag babind ulit tayo ng parameter para sa prepare statement
        $insert_query = "INSERT INTO `prescription`(`reqId`, `patientId`, `dentistId`, `dateToday`, `patientName`, `dentistName`, `medicine`, `notes`, `date_Submitted`) values ('".$reqId."', '".$spec_patientId."','".$dentistId."','".$dateToday."','".$patientName."','".$dentistName."','".$medicine."','".$notes."','".$dateSubmitted."')";             
        $execute = mysqli_query($conn, $insert_query);

        if($execute){
            $updateStatusPrescription = "statusPrescription";
            $sqlu = "UPDATE request_appointment SET statusPrescription='$updateStatusPrescription' WHERE reqId='$reqId'";
            $sqlu_run = mysqli_query($conn, $sqlu);

            echo "Prescribed";
        }

        else{
            echo "UnPrescribed";
        }
        
    }

    

?>