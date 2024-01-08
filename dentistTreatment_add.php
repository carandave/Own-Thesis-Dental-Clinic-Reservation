<?php 
    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'addTreatment'){
         $reqId = $_POST['reqId'];
         $spec_patientId = $_POST['spec_patientId'];
         $dentistId = $_POST['dentistId'];
        //  $serviceId = $_POST['serviceId'];
         $dateVisit = $_POST['dateVisit'];
         $patientTreatment = $_POST['patientTreatment'];
        //  $teeth_number = $_POST['teeth_number'];
         $description = $_POST['description'];
         $patientTotalFees = $_POST['patientTotalFees'];
         $patientFees = $_POST['patientFees'];
         $patientTotalChange = $_POST['patientTotalChange'];

        //  $patientRemarks = $_POST['patientRemarks'];
         $dateSubmitted = date("Y-m-d");
         

        // $stmt = $conn->prepare("INSERT INTO treatment (patientId, dentistId, serviceId, date_visit, service_name, teethNo, description, fees, remarks, dateTreatmentSubmitted) VALUES (?,?,?,?,?,?,?,?,?,?)"); // Mag peprapre ulit tayo ng statement para makapg Insert ng data sa database
        // $stmt->bind_param("iiissssssd", $patientId, $dentistId, $serviceId, $dateVisit, $patientTreatment, $teeth_number, $description, $patientFees, $patientRemarks, $dateSubmitted); // Mag babind ulit tayo ng parameter para sa prepare statement
        
        if($patientTotalFees <= $patientFees){

            $insert_query = "INSERT INTO `treatment`(`reqId`, `patientId`, `dentistId`, `date_visit`, `service_name`, `description`, `fees`, `totalFees`, `totalChange`, `dateTreatment_Submitted`) values ('".$reqId."', '".$spec_patientId."','".$dentistId."','".$dateVisit."','".$patientTreatment."','".$description."','".$patientFees."','".$patientTotalFees."','".$patientTotalChange."','".$dateSubmitted."')";             
            $execute = mysqli_query($conn, $insert_query);

            if($execute){
                $updateStatusTreated = "statustreated";
                $sqlu = "UPDATE request_appointment SET statusTreated='$updateStatusTreated' WHERE reqId='$reqId'";
                $sqlu_run = mysqli_query($conn, $sqlu);

                echo "Treated";
            }

            else{
                echo "Untreated";
            }

        }

        else{
            echo "Not";
        }
        
        
        
    }

    

?>