<?php 

    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'updatePatient'){
        $patientId = $_POST['patient_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birth_date = $_POST['patient_birthdate'];
        $address = $_POST['patient_address'];
        $gender = $_POST['patient_gender'];
        $phone_no = $_POST['patient_phone'];

        $sqlu = "UPDATE users SET first_name='$first_name', last_name='$last_name', birth_date='$birth_date', gender='$gender', phone_no='$phone_no', address='$address' WHERE patientId='$patientId'";
        $sqlu_run = mysqli_query($conn, $sqlu);


        echo "TrueProfile";


    }
?>