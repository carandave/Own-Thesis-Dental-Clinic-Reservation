<!-- <?php 
    require_once "connection.php";

    if(isset($_POST['addTreatment'])){
         $serviceName = $_POST['service_name'];
         $treatmentName = $_POST['treatment_name'];
         $treatmentPrice = $_POST['treatment_price'];
         

         

       
            $sql = $conn->prepare("SELECT treatment_name FROM treatment WHERE  treatment_name=?"); //Gagagmit tayo ng prepare statement para maka iwas sa sql injection attack
            $sql->bind_param("s", $treatmentName); // Mag bababind tayo ng parameter para sa prepare statement
            $sql->execute(); // Ipapasok na natin ang query sa database 
            $result = $sql->get_result(); // Kukunin na natin ang result galing sa database 
            $row = $result->fetch_array(MYSQLI_ASSOC); // Gagawin nating array ang result na galing sa database
            
            if($row['treatment_name'] == $treatmentName){ // Kung may nakitang existing na email galing sa database na kaparehong naiinput ni user ay mag lalabas sya ng error
                echo "Treatment is already Registered";
            }

            else{ // Kung hindi naman mag kapareho gagawin nya ang nasa baba
                $stmt = $conn->prepare("INSERT INTO treatment (service_name, treatment_name, price) VALUES (?,?,?)"); // Mag peprapre ulit tayo ng statement para makapg Insert ng data sa database
                $stmt->bind_param("ssi", $serviceName, $treatmentName, $treatmentPrice); // Mag babind ulit tayo ng parameter para sa prepare statement
                
                if($stmt->execute()){ // Kapag nai-execute ng maayos at walang nakitang error it means nakapag input tayo ng data sa database
                    echo "Treatment Added Successfully";
                    echo '<script>
                            window.alert("Treatment Added Successfully"); 
                            window.location.href =  "treatment_view.php";
                          </script>';
                    
                }
                else{ // Kapag may nakitang error sa pag eexecute hindi ito makakapg insert ng data sa database
                    echo "Something Went wRONG";
                }
            }

    }

?> -->