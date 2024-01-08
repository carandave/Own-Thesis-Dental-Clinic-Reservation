<?php 
    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'addProducts'){
         
        $prodName = $_POST['prodName'];
        $prodStocks = $_POST['prodStocks'];
        $prodLastUpdated = $_POST['prodStocks'];

         

        // $stmt = $conn->prepare("INSERT INTO treatment (patientId, dentistId, serviceId, date_visit, service_name, teethNo, description, fees, remarks, dateTreatmentSubmitted) VALUES (?,?,?,?,?,?,?,?,?,?)"); // Mag peprapre ulit tayo ng statement para makapg Insert ng data sa database
        // $stmt->bind_param("iiissssssd", $patientId, $dentistId, $serviceId, $dateVisit, $patientTreatment, $teeth_number, $description, $patientFees, $patientRemarks, $dateSubmitted); // Mag babind ulit tayo ng parameter para sa prepare statement
        $insert_query = "INSERT INTO `inventory`(`products`, `stocks`) values ('".$prodName."','".$prodStocks."')";             
        $execute = mysqli_query($conn, $insert_query);

        if($execute){
            // $updateStatusPrescription = "statusPrescription";
            // $sqlu = "UPDATE request_appointment SET statusPrescription='$updateStatusPrescription' WHERE reqId='$reqId'";
            // $sqlu_run = mysqli_query($conn, $sqlu);

            echo "Success";
        }

        else{
            echo "UnSuccess";
        }
        
    }

    

?>