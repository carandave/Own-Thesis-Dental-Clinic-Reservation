<?php 

    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'updateProfile'){
        $dentistId = $_POST['dentistId'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];


        $sqlu = "UPDATE dentist SET fullname='$fullname', address='$address', birthdate='$birthdate', gender='$gender', phone='$phone' WHERE dentistId='$dentistId'";
        $sqlu_run = mysqli_query($conn, $sqlu);


        echo "TrueProfile";


    }

?>