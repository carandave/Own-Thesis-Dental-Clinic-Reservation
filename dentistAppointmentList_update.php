<?php 

    require_once "connection.php";

    if(isset($_POST['updateData'])){

        $id = $_POST['update_id'];   
        $dentistId = $_POST['dentist_id'];
        $patientEmail = $_POST['patient_email'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        // $preferredService = $_POST['preferred_service'];
        $preferredDate = $_POST['preferred_date'];
        $patientConcerned = $_POST['patient_concerned'];
        // $preferredTime = $_POST['preferred_time'];
        $dentistFullName = $_POST['dentist_fullname'];
        $updateStatus = $_POST['ddselect'];

        //  $sql=$conn->prepare("SELECT appointment_date, appointment_time, dentistId FROM request_appointment WHERE appointment_date=? AND appointment_time=? AND dentistId=? AND status='Confirmed'");
        // $sql = $conn->prepare("SELECT t.appointment_date, t.appointment_time, t.status, d.fullname FROM request_appointment t INNER JOIN dentist d WHERE t.appointment_date=? AND t.appointment_time=? AND d.fullname=? AND status=?");
        $sql = $conn->prepare("SELECT t.appointment_date, t.status, d.fullname FROM request_appointment t INNER JOIN dentist d WHERE t.appointment_date=? AND t.dentistId=? AND status=?");
        $sql->bind_param("sss", $preferredDate, $dentistId, $updateStatus);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $num_rows = $result->num_rows;

        // echo $num_rows;

        // if($num_rows > 0){
        //     echo "SameAppointment";
        //     echo '<script>alert("The Appointment Date and Time is already appointed. Please Try Another!")</script>';
        //     echo '<script>window.location.href = "dentistAppointmentList.php"</script>';
        // }

        
            // echo "UniqueAppointment";

        $sqlu = "UPDATE request_appointment SET status='$updateStatus' WHERE reqId='$id'";
        $sqlu_run = mysqli_query($conn, $sqlu);

        

            if(isset($_POST['patient_check'])) {
                
                require("Phpmailer/PHPMailer.php");
                require("Phpmailer/SMTP.php");

                $mail = new PHPMailer\PHPMailer\PHPMailer();


                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "tls";

                // $mail->Username = "clinicdental829@gmail.com";
                // $mail->Password = "tmbouiargglopcnw";

                $mail->Username = "drmarkfeirbauzondentalclinic@gmail.com";
                $mail->Password = "vymylyrivgmbotwg";

                // $mail->Username = "drmarkfeirbauzondentalclinic@gmail.com";
                // $mail->Password = "vymylyrivgmbotwg";

                $mail->AddAddress($patientEmail);
                $mail->setFrom('drmarkfeirbauzondentalclinic@gmail.com', 'Dr. Marc Dental Clinic Notification');
                $mail->Subject = 'Set an Appointment || Dental Care Clinic';
                $mail->isHTML(true);

                $mail->Body = "<h3>Appointment Details</h3>
                                <p>First Name: $firstName</p>
                                <p>Last Name: $lastName</p>
                                <p>Email: $patientEmail</p>
                                <p>Preferred Date: $preferredDate</p>
                                <p>Your Concerned: $patientConcerned</p>
                                <p>Preferred Dentist: $dentistFullName</p>
                                
                                

                                <p>Please show this to the Staff or Doctor. This will serve also as proof of appointment</p>
                                <p>Thank You!</p>
                                <h3>Dental Care Clinic</h3>";

                if($mail->send()){
                    
                }

                else{
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' .$mail->ErrorInfo;
                }


            } 
            
            else {
                
            }
            
            echo '<script>alert("The Appointment is Successfully Updated")</script>';
            echo '<script>window.location.href = "dentistAppointmentList.php"</script>';
            
            

        

        
        
        
        

        
       

    }

?>

