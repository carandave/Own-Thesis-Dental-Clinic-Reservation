<?php 

    require_once "connection.php";

        $pat_firstname = $_POST['pat_firstname']; 
        $pat_lastname = $_POST['pat_lastname'];
        $pat_birthdate = $_POST['pat_birthdate'];
        $pat_gender = $_POST['pat_gender'];
        $pat_number = $_POST['pat_number'];       
        $pat_address = $_POST['pat_address'];
        $pat_email = $_POST['pat_email'];      
        $pat_pass = $_POST['pat_password'];
        $pat_cpass = $_POST['pat_cpassword'];
        $pat_pass = sha1($pat_pass); //Gagawin nating secure ang password ni user para hindi madaling makita sa databsase
        $pat_cpass = sha1($pat_cpass); //Gagawin nating secure ang confirm password ni user para hindi madaling makita sa databsase
        $pat_position = "Patient";
        $pat_created = date("Y-m-d");

        if($pat_pass != $pat_cpass){ // Kung hindi mag match ang password at confirm password hindi sya mag tutuloy sa pinaka babang code
            echo "The password is not match";
            exit();
        }

        else{ // Kung nag match naman eto ang gagawin nya
            $sql = $conn->prepare("SELECT email FROM users WHERE email=?"); //Gagagmit tayo ng prepare statement para maka iwas sa sql injection attack
            $sql->bind_param("s", $pat_email); // Mag bababind tayo ng parameter para sa prepare statement
            $sql->execute(); // Ipapasok na natin ang query sa database 
            $result = $sql->get_result(); // Kukunin na natin ang result galing sa database 
            $row = $result->fetch_array(MYSQLI_ASSOC); // Gagawin nating array ang result na galing sa database

            if($row['email'] == $pat_email){ // Kung may nakitang existing na email galing sa database na kaparehong naiinput ni user ay mag lalabas sya ng error
                echo "Email is not available";
            }

            else{ // Kung hindi naman mag kapareho gagawin nya ang nasa baba
                $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, birth_date, gender, phone_no, position, address, email, pass_word, created) VALUES (?,?,?,?,?,?,?,?,?,?)"); // Mag peprapre ulit tayo ng statement para makapg Insert ng data sa database
                $stmt->bind_param("ssssssssss", $pat_firstname, $pat_lastname, $pat_birthdate, $pat_gender, $pat_number, $pat_position, $pat_address, $pat_email, $pat_pass, $pat_created); // Mag babind ulit tayo ng parameter para sa prepare statement
                if($stmt->execute()){ // Kapag nai-execute ng maayos at walang nakitang error it means nakapag input tayo ng data sa database
                    echo "Registered Succesfully";
                    echo '<script>
                            window.alert("Registered Successfully"); 
                            window.location.href =  "patient_view.php";
                          </script>';
                }
                else{ // Kapag may nakitang error sa pag eexecute hindi ito makakapg insert ng data sa database
                    echo "Something Went wRONG";
                }
            }   
        }


?>