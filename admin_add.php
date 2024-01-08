<?php 
    require_once "connection.php";

    if(isset($_POST['addAdmin'])){
         $adminName = $_POST['admin_name'];
         $adminBirthdate = $_POST['admin_birthdate'];
         $adminAddress = $_POST['admin_address'];
         $adminGender = $_POST['admin_gender'];
         $adminNumber = $_POST['admin_number'];
         $adminEmail = $_POST['admin_email'];
         $adminPassword = $_POST['admin_password'];
         $adminCpassword = $_POST['admin_cpassword'];
         $adminPassword = sha1($adminPassword);
         $adminCpassword = sha1($adminCpassword);
         $adminPosition = "Admin";

         if($adminPassword != $adminCpassword){ // Kung hindi mag match ang password at confirm password hindi sya mag tutuloy sa pinaka babang code
            // echo "The password is not match";
            exit();
        }

        else{ // Kung nag match naman eto ang gagawin nya
            $sql = $conn->prepare("SELECT email FROM dentist WHERE email=?"); //Gagagmit tayo ng prepare statement para maka iwas sa sql injection attack
            $sql->bind_param("s", $adminEmail); // Mag bababind tayo ng parameter para sa prepare statement
            $sql->execute(); // Ipapasok na natin ang query sa database 
            $result = $sql->get_result(); // Kukunin na natin ang result galing sa database 
            $row = $result->fetch_array(MYSQLI_ASSOC); // Gagawin nating array ang result na galing sa database
            
            if($row['email'] == $adminEmail){ // Kung may nakitang existing na email galing sa database na kaparehong naiinput ni user ay mag lalabas sya ng error
                // echo "Email is not available";
            }

            else{ // Kung hindi naman mag kapareho gagawin nya ang nasa baba
                $stmt = $conn->prepare("INSERT INTO dentist (fullname, birthdate, address, gender, phone, email, password, position) VALUES (?,?,?,?,?,?,?,?)"); // Mag peprapre ulit tayo ng statement para makapg Insert ng data sa database
                $stmt->bind_param("ssssssss", $adminName, $adminBirthdate, $adminAddress, $adminGender, $adminNumber, $adminEmail, $adminPassword, $adminPosition); // Mag babind ulit tayo ng parameter para sa prepare statement
                
                if($stmt->execute()){ // Kapag nai-execute ng maayos at walang nakitang error it means nakapag input tayo ng data sa database
                    // echo "Registered Succesfully";
                    echo '<script>
                            window.alert("Registered Successfully"); 
                            window.location.href = "admin_view.php";
                          </script>';
                    
                }
                else{ // Kapag may nakitang error sa pag eexecute hindi ito makakapg insert ng data sa database
                    // echo "Something Went wRONG";
                }
            }   
        }

    }

?>