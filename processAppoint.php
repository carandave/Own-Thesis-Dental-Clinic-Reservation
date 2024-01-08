<?php 

    require_once "connection.php";
    
    //Process Include
	if(isset($_POST['action']) && $_POST['action'] == 'Appoint'){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $doctorName = $_POST['doctorName'];

        $patientId = $_POST['patient_id'];
        $dentistId = $_POST['dentist_name'];
        $concerned = $_POST['concerned'];
        $appointDate = $_POST['appoint_date'];
        $doctorEmail = $_POST['doctorEmail'];
        // $serviceId = $_POST['service_name'];
        // $appointTime = $_POST['appoint_time'];
        
        
        $status = "Pending";
        $dateSubmitted = date("F d, Y");
        
        // $question1 = $_POST['question1'];
        // $question2 = $_POST['question2'];
        // $question3 = $_POST['question3'];
        // $question4 = $_POST['question4'];
        // $question5 = $_POST['question5'];
        // $question6 = $_POST['question6'];
        // $question7 = $_POST['question7'];
        // $question8 = $_POST['question8'];
        // $question9 = $_POST['question9'];
        // $question10 = $_POST['question10'];
        // $question11 = $_POST['question11'];
        // $question12 = $_POST['question12'];
        // $question13 = $_POST['question13'];

        if($dentistId == ""){
            echo "empty";
        }

        elseif($appointDate == ""){
            echo "empty";
        }

        elseif($concerned == ""){
            echo "empty";
        }

        elseif($dentistId !== "" || $appointDate !== "" || $concerned !== ""){
        $sql=$conn->prepare("SELECT appointment_date, dentistId FROM request_appointment WHERE appointment_date=? AND dentistId=? AND status='Confirmed'");
        $sql->bind_param("ss", $appointDate, $dentistId);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $num_rows = $result->num_rows;

            $insert_query = "INSERT INTO `request_appointment`(`patientId`,`dentistId`,`appointment_date`, `concerned`,`date_submitted`,`status`) values ('".$patientId."','".$dentistId."','".$appointDate."','".$concerned."','".$dateSubmitted."','".$status."')";             
            mysqli_query($conn, $insert_query);

                $appointDate = date("l, F j Y", strtotime($appointDate));

                // require("Phpmailer/Exception.php");
                require("Phpmailer/PHPMailer.php");
                require("Phpmailer/SMTP.php");

                $mail = new PHPMailer\PHPMailer\PHPMailer();

                // $mail->SMTPDebug = 3;
                $mail->Host = 'smtp.gmail.com';
                // $mail->Port = 587;
                $mail->Port = 587;
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "tls";

                // $mail->Username = "clinicdental829@gmail.com";
                // $mail->Password = "bxeivzsxepbsbpko";
                // $mail->Password = "cpxfuzxjmrcslstr";
                // $mail->Password = "tmbouiargglopcnw";

                $mail->Username = "drmarkfeirbauzondentalclinic@gmail.com";
                $mail->Password = "vymylyrivgmbotwg";
                

                $mail->AddAddress($doctorEmail);
                $mail->setFrom('drmarkfeirbauzondentalclinic@gmail.com', 'Dr. Marc Dental Clinic Notification');
                $mail->Subject = 'There is Someone Requesting an Appointment || Dental Clinic';
                $mail->isHTML(true);

                $mail->Body = "<h3>Appointment Details</h3>
                                <p>First Name: $firstName</p>
                                <p>Last Name: $lastName</p>
                                <p>Preferred Date: $appointDate</p>
                                <p>Concerned: $concerned</p>
                                <p>Preferred Dentist: $doctorName</p>
                                

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

                echo "UniqueAppointment";
        }

        else{
            echo "empty";
        }

        
        

        }

   


 


?>