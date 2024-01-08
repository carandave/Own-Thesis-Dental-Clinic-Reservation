<?php 

    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'updateStaff'){
        $staffId = $_POST['staff_id'];
        $staff_full_name = $_POST['staff_full_name'];
        $staff_birthdate = $_POST['staff_birthdate'];
        $staff_address = $_POST['staff_address'];
        $staff_gender = $_POST['staff_gender'];
        $staff_phone = $_POST['staff_phone'];

        $sqlu = "UPDATE dentist SET fullname='$staff_full_name', birthdate='$staff_birthdate', gender='$staff_gender', phone='$staff_phone', address='$staff_address' WHERE dentistId='$staffId'";
        $sqlu_run = mysqli_query($conn, $sqlu);


        echo "TrueProfile";


    }
?>