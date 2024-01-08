<?php 
    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'editProducts'){
        $editProductId = $_POST['update_id'];
        $editprodName = $_POST['editprodName'];
        $editprodStocks = $_POST['editprodStocks'];
        // $editprodLastUpdated = date('Y-F-d');

        // ayusin munan natin ang formar ng time
        // $editprodLastUpdated = date('D-M-Y');
        $editprodLastUpdated = date("F d, Y");
         

        // $stmt = $conn->prepare("INSERT INTO treatment (patientId, dentistId, serviceId, date_visit, service_name, teethNo, description, fees, remarks, dateTreatmentSubmitted) VALUES (?,?,?,?,?,?,?,?,?,?)"); // Mag peprapre ulit tayo ng statement para makapg Insert ng data sa database
        // $stmt->bind_param("iiissssssd", $patientId, $dentistId, $serviceId, $dateVisit, $patientTreatment, $teeth_number, $description, $patientFees, $patientRemarks, $dateSubmitted); // Mag babind ulit tayo ng parameter para sa prepare statement
        $edit_query = "UPDATE inventory SET products='$editprodName', stocks='$editprodStocks', last_updated='$editprodLastUpdated' WHERE productId='$editProductId'";             
        $execute = mysqli_query($conn, $edit_query);

        if($execute){
            // $updateStatusPrescription = "statusPrescription";
            // $sqlu = "UPDATE request_appointment SET statusPrescription='$updateStatusPrescription' WHERE reqId='$reqId'";
            // $sqlu_run = mysqli_query($conn, $sqlu);

            echo "SuccessEdit";
        }

        else{
            echo "UnSuccessEdit";
        }
        
    }

    

?>