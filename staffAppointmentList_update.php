<?php 

    require_once "connection.php";

    if(isset($_POST['updateData'])){

        $id = $_POST['update_id'];
        $dentistId = $_POST['dentist_id'];
        $patientEmail = $_POST['patient_email'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $preferredDate = $_POST['preferred_date'];
        // $preferredTime = $_POST['preferred_time'];
        // $preferredService = $_POST['preferred_service'];
        $dentistFullName = $_POST['dentist_fullname'];
        $updateStatus = $_POST['ddselect'];
        
        //Gagayahin natin ang code ng DentistAppoinmentList_Update para maprevent ang mga possible same date and time

        $sql = $conn->prepare("SELECT t.appointment_date, t.status, d.fullname FROM request_appointment t INNER JOIN dentist d WHERE t.appointment_date=? AND t.dentistId=? AND status=?");
        // $sql = $conn->prepare("SELECT t.appointment_date, t.appointment_time, t.status, d.fullname FROM request_appointment t INNER JOIN dentist d ON t.appointment_date =?, t.appointment_time=?, t.appointment_date=?, d.fullname=?, t.status=?");
        $sql->bind_param("sss", $preferredDate, $dentistId, $updateStatus);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $num_rows = $result->num_rows;
        
        //Dun na tayo sa pag lalagay ng treatment

        

        

            // echo "UniqueAppointment";

            $sqlu = "UPDATE request_appointment SET status='$updateStatus' WHERE reqId='$id'";
            $sqlu_run = mysqli_query($conn, $sqlu);

        if($sqlu_run){

            if(isset($_POST['patient_check'])) {
                
                require("Phpmailer/PHPMailer.php");
                require("Phpmailer/SMTP.php");

                $mail = new PHPMailer\PHPMailer\PHPMailer();


                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "tls";

                $mail->Username = "drmarkfeirbauzondentalclinic@gmail.com";
                $mail->Password = "vymylyrivgmbotwg";

                $mail->AddAddress($patientEmail);
                $mail->setFrom('drmarkfeirbauzondentalclinic@gmail.com', 'Dr. Marc Dental Clinic Notification');
                $mail->Subject = 'Set an Appointment || Dental Care Clinic';
                $mail->isHTML(true);

                $mail->Body = "<h3>Appointment Details</h3>
                                <p>First Name: $firstName</p>
                                <p>Last Name: $lastName</p>
                                <p>Email: $patientEmail</p>
                                <p>Preferred Date: $preferredDate</p>
                               
                                <p>Preferred Dentist: $dentistFullName</p>
                                
                                

                                <p>Print, Sign and bring the attached PDF on the date of your appointment. This will serve also as proof of appointment</p>
                                <p>Thank You!</p>
                                <h3>Dental Care Clinic</h3>";

                if($mail->send()){
                    // echo "Message";
                    //Ilalagay pa natin ang Specific Dentist sa email
                }

                else{
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' .$mail->ErrorInfo;
                }


            } 
            
            else {
                // echo "Uncheked";
            }

            echo '<script>alert("Appointment Updated")</script>';
            echo '<script>window.location.href = "staffAppointmentList.php"</script>';
            // header("Location: dentistAppointmentList.php");
            //Tapos na sa health declaration form sa patient naman yung ipiprint ang status nya
            
        }

        else{
            echo '<script>alert("Appointment Not Updated")</script>';
        }

        

        
       

    }

?>

