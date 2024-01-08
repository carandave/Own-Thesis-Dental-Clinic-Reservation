<?php 
    require_once "connection.php";

    // For Register Form
    if(isset($_POST['position']) && $_POST['position'] == "Patient"){ // Kung naka set ang position and position is equal to Patient gagawain nya ang mga nasa loob
        //Kukunin natin ang mga ininput ni user galing sa signup form at ilalagay sa variable para magamit ulet
        $firstname = $_POST['firstname']; 
        $lastname = $_POST['lastname'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $phoneno = $_POST['phoneNo'];
        $position = $_POST['position'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $created = date("Y-m-d");
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $pass = sha1($pass); //Gagawin nating secure ang password ni user para hindi madaling makita sa databsase
        $cpass = sha1($cpass); //Gagawin nating secure ang confirm password ni user para hindi madaling makita sa databsase


        if($pass != $cpass){ // Kung hindi mag match ang password at confirm password hindi sya mag tutuloy sa pinaka babang code
            echo "The password is not match";
            exit();
        }

        else{ // Kung nag match naman eto ang gagawin nya
            $sql = $conn->prepare("SELECT email FROM users WHERE email=?"); //Gagagmit tayo ng prepare statement para maka iwas sa sql injection attack
            $sql->bind_param("s", $email); // Mag bababind tayo ng parameter para sa prepare statement
            $sql->execute(); // Ipapasok na natin ang query sa database 
            $result = $sql->get_result(); // Kukunin na natin ang result galing sa database 
            $row = $result->fetch_array(MYSQLI_ASSOC); // Gagawin nating array ang result na galing sa database

            if($row['email'] == $email){ // Kung may nakitang existing na email galing sa database na kaparehong naiinput ni user ay mag lalabas sya ng error
                echo "Email is not available";
            }

            else{ // Kung hindi naman mag kapareho gagawin nya ang nasa baba
                $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, birth_date, gender, phone_no, position, address, email, pass_word, created) VALUES (?,?,?,?,?,?,?,?,?,?)"); // Mag peprapre ulit tayo ng statement para makapg Insert ng data sa database
                $stmt->bind_param("ssssssssss", $firstname, $lastname, $birthdate, $gender, $phoneno, $position, $address, $email, $pass, $created); // Mag babind ulit tayo ng parameter para sa prepare statement
                if($stmt->execute()){ // Kapag nai-execute ng maayos at walang nakitang error it means nakapag input tayo ng data sa database
                    echo "Registered Succesfully";
                    echo '<script>
                            Ok  
                          </script>';
                }
                else{ // Kapag may nakitang error sa pag eexecute hindi ito makakapg insert ng data sa database
                    echo "Something Went wRONG";
                }
            }   
        }
    }

    //For Login Form for Patient
    if(isset($_POST['action']) && $_POST['action'] == 'login'){

        session_start();

        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        // $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND pass_word=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $result = $stmt->get_result(); // Kukunin na natin ang result galing sa database 
        $row = $result->fetch_array(MYSQLI_ASSOC);
        // $user = $stmt->fetch();

        // print_r($row);

        if($row!=null){ 
            $_SESSION['id'] = $row['patientId'];
            $_SESSION['email'] = $email;
            $_SESSION['position'] = $row['position'];
            
            echo $_SESSION['position'] = $row['position'];
        
        }
        else{
            echo "LoginFailed";
        }
    }

    //For Login Form for Admin
    if(isset($_POST['action']) && $_POST['action'] == 'loginAdmin'){

        session_start();

        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        // $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM dentist WHERE email=? AND password=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $result = $stmt->get_result(); // Kukunin na natin ang result galing sa database 
        $row = $result->fetch_array(MYSQLI_ASSOC);
        // $user = $stmt->fetch();

        // print_r($row);

        if($row!=null){ 
            $_SESSION['id'] = $row['dentistId'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $email;
            $_SESSION['position'] = $row['position'];
            
            echo $_SESSION['position'] = $row['position'];
        
        }
        else{
            echo "LoginFailed";
        }
    }
    // else{
    //     echo '<script>Hindi pa nakaset</script>';
    // }

    // For Change Password
    if(isset($_POST['action']) && $_POST['action'] == 'forgot'){

        $email = $_POST['email'];

        $stmt_p = $conn->prepare("SELECT patientId FROM users WHERE email=?");
        $stmt_p->bind_param("s", $email);
        $stmt_p->execute();
        $res = $stmt_p->get_result();

        if($res->num_rows>0){

            $token = "qwertyuiopasdfghjklzxcvbnm1234567890";
            $token = str_shuffle($token);
            $token = substr($token, 0,10);

            $stmt_i = $conn->prepare("UPDATE users SET token=?, token_expire=DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE email=?");
            $stmt_i->bind_param("ss", $token, $email);
            $stmt_i->execute();


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

            $mail->AddAddress($email);
            $mail->setFrom('drmarkfeirbauzondentalclinic@gmail.com', 'Dr. Marc Dental Clinic');
            $mail->Subject = 'Reset Password';
            $mail->isHTML(true);

            $mail->Body = "<h3>Click the Link Below to reset your password.</h3>
                           <br>
                           <a href='https://dr-marc-orthodontics.online/forgotPass.php?email=$email&token=$token'>https://dr-marc-orthodontics.online/forgotPass.php?email=$email&token=$token</a>
                           <br>
                           <h3>Regards:</h3>
                           <h3>Dental Clinic</h3>";

            if($mail->send()){
                echo "Message";
                // <a href='http://localhost/DCMSMID/forgotPass.php?email=$email&token=$token'>http://localhost/DCMSMID/forgotPass.php?email=$email&token=$token</a>
            }

            else{
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' .$mail->ErrorInfo;
            }

        }
        else{
            echo "NoEmail";
        }



    }

    //Process Include
	// if(isset($_POST['action']) && $_POST['action'] == 'appoint'){

//   $dbhost = "localhost";
//   $dbuser = "root";
//   $dbpass = "";
//   $dbname = "db_dentalclinic";

//   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//   $fname = $_POST['fname'];
//   $lname = $_POST['lname'];
//   $phone = $_POST['phone'];
//   $email = $_POST['email'];
//   $date = $_POST['date'];
//   $time = $_POST['time'];
//   $service = $_POST['service'];
//   $comments = $_POST['comments'];

//   $sql=$conn->prepare("SELECT appointment_date, appointment_time FROM tblonlineappointments WHERE appointment_date=? AND appointment_time=?");
//   $sql->bind_param("ss", $date, $time);
//   $sql->execute();
//   $result=$sql->get_result();
//   $row=$result->fetch_array(MYSQLI_ASSOC);

//   // echo $row['appointment_date'];
//   // echo $row['appointment_time'];

//   if($row['appointment_date'] == $date && $row['appointment_time'] == $time){
//     echo "The appointment Date and Time is already appointed. Please Try Again!";
//     echo '<script>alert("The appointment Date and Time is already appointed. Please Try Again!")</script>';
//     // echo "One";
//     // echo ("Location: requestOnline.php");
//   }
//   else{
//     $stmt = $conn->prepare("INSERT INTO tblonlineappointments (fname, lname, phone, email, appointment_date, appointment_time, service, comments) VALUES (?,?,?,?,?,?,?,?)");
//     $stmt->bind_param("ssssssss",$fname, $lname, $phone, $email, $date, $time, $service, $comments);
//       if($stmt->execute()){
//         // echo "Location: requestOnline.php";
//         // echo "We will send an email to you for confirmation";
//         // echo '<script> let alert = document.getElementById("alert")
//         //           alert.style
//         //       </script>';
//         // document.getElementById('alert').innerHTML += 'Query did not work';
       
//         header("Location requestOnline.php");
//         echo '<script> location.href="requestOnline.php" </script>';
//         echo "<script>        
//                 document.getElementById('alert').style.display += 'None'; 
//             </script>";
//         echo '<script>alert("We will send an email to you for confirmation")</script>';
        
//         echo '<script> location.href="requestOnline.php" </script>';
//         header("Location requestOnline.php");
//         // echo '<script>alert("We will send an email to you for confirmation")</script>';
//         // echo ("Location: requestOnline.php");
        
        
//       }
//       else{
//         echo "There was an error, Please Try Again!";
//       }
//   }

// }


 
// if(isset($_POST['btnLogin'])){
//   $email = trim($_POST['user_email']);
//   $upass  = trim($_POST['user_pass']);
//   // $h_upass = sha1($upass);
//   $h_upass = $upass;
  
//    if ($email == '' OR $upass == '') {

//       message("Invalid Username and Password!", "error");
//       redirect("login.php");
         
//     } else {  
//   //it creates a new objects of member
//     $user = new User();
//     //make use of the static function, and we passed to parameters
//     $res = $user->userAuthentication($email, $h_upass);

//     if ($res==true) { 
//        // message("You logon as ".$_SESSION['ADMIN_ROLE'].".","success"); 

//         redirect(web_root."index1.php");
//     }else{
//       message("Account does not exist!", "error");
//        redirect(web_root."login.php"); 
//     }
//  }
//  } 
 
?>