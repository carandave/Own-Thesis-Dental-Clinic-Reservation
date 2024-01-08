<?php 

    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'updateDentist'){
        $dentistId = $_POST['dentist_id'];
        $dentist_full_name = $_POST['dentist_full_name'];
        $dentist_birthdate = $_POST['dentist_birthdate'];
        $dentist_address = $_POST['dentist_address'];
        $dentist_gender = $_POST['dentist_gender'];
        $dentist_phone = $_POST['dentist_phone'];
        $dentist_email = $_POST['dentist_email'];
        

        $sqlu = "UPDATE dentist SET fullname='$dentist_full_name', birthdate='$dentist_birthdate', gender='$dentist_gender', phone='$dentist_phone', email='$dentist_email', address='$dentist_address' WHERE dentistId='$dentistId'";
        $sqlu_run = mysqli_query($conn, $sqlu);


        echo "TrueProfile";


    }
?>