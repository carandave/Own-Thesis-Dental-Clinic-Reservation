<?php 

    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'updateProfile'){
        $patientId = $_POST['patientId'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $phone_no = $_POST['phone_no'];
        $address = $_POST['address'];
        
       


        $sqlu = "UPDATE users SET first_name='$first_name', last_name='$last_name', birth_date='$birth_date', gender='$gender', phone_no='$phone_no', address='$address' WHERE patientId='$patientId'";
        $sqlu_run = mysqli_query($conn, $sqlu);


        echo "TrueProfile";


    }

?>