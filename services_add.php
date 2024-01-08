<?php 
    require_once "connection.php";

    if(isset($_POST['addServices'])){
         $serviceName = $_POST['service_name'];
         $servicePrice = $_POST['service_price'];
        //  $articleTitle = $_POST['article_title'];
         $serviceContent = $_POST['service_content'];
         

         

       
            $sql = $conn->prepare("SELECT service_name FROM services WHERE service_name=?"); //Gagagmit tayo ng prepare statement para maka iwas sa sql injection attack
            $sql->bind_param("s", $serviceName); // Mag bababind tayo ng parameter para sa prepare statement
            $sql->execute(); // Ipapasok na natin ang query sa database 
            $result = $sql->get_result(); // Kukunin na natin ang result galing sa database 
            $row = $result->fetch_array(MYSQLI_ASSOC); // Gagawin nating array ang result na galing sa database
            
            if($row['service_name'] == $serviceName){ // Kung may nakitang existing na email galing sa database na kaparehong naiinput ni user ay mag lalabas sya ng error
                echo '<script>
                            window.alert("Service is already registered!"); 
                            window.location.href =  "services_view.php";
                      </script>';
            }

            else{ // Kung hindi naman mag kapareho gagawin nya ang nasa baba
                $stmt = $conn->prepare("INSERT INTO services (service_name, fees, content) VALUES (?,?,?)"); // Mag peprapre ulit tayo ng statement para makapg Insert ng data sa database
                $stmt->bind_param("sss", $serviceName, $servicePrice, $serviceContent); // Mag babind ulit tayo ng parameter para sa prepare statement
                
                if($stmt->execute()){ // Kapag nai-execute ng maayos at walang nakitang error it means nakapag input tayo ng data sa database
                    // echo "Service Added Successfully";
                    echo '<script>
                            window.alert("Service Added Successfully"); 
                            window.location.href =  "services_view.php";
                          </script>';
                    
                }
                else{ // Kapag may nakitang error sa pag eexecute hindi ito makakapg insert ng data sa database
                    echo "Something Went wRONG";
                }
            }

    }

?>