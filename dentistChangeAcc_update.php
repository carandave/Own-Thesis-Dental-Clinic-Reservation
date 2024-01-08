<?php 

require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'updateCredentials'){

        $dentistId = $_POST['dentistId'];
        $dentistCurrentPassword = $_POST['dentistCurrentPassword'];
        $inputCurrentPassword = sha1($_POST['inputCurrentPassword']);

        // $stmt = $conn->prepare("SELECT password FROM dentist WHERE password=?");
        // $stmt->bind_param("s", $dentistCurrentPassword);
        // $stmt->execute();

        // $result = $stmt->get_result();

        if($dentistCurrentPassword == $inputCurrentPassword){

            
            // if(isset($_POST['submit'])){

                $newPassword = sha1($_POST['newPassword']);
                $conPassword = sha1($_POST['conPassword']);

                if($newPassword == $conPassword){
                    $stmt_u = $conn->prepare("UPDATE dentist SET password=? WHERE dentistId=?");
                    $stmt_u->bind_param("ss", $newPassword, $dentistId);
                    $stmt_u->execute();

                    echo "OneMatched";
                }

                else{
                    echo "NoMatched";
                }
            }

        

        else{
            echo "Not";
        }

        // $sqlp = "SELECT * FROM dentist WHERE dentistId ='$dentistId'";
        // $resultp = $conn->query($sqlp);

        



        // $dentistId = $_POST['dentistId'];
        // $fullname = $_POST['fullname'];
        // $address = $_POST['address'];
        // $birthdate = $_POST['birthdate'];
        // $gender = $_POST['gender'];
        // $phone = $_POST['phone'];


        // $sqlu = "UPDATE dentist SET fullname='$fullname', address='$address', birthdate='$birthdate', gender='$gender', phone='$phone' WHERE dentistId='$dentistId'";
        // $sqlu_run = mysqli_query($conn, $sqlu);


        // echo "TrueProfile";


    }

    


?>