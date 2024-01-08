<?php 

    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'updateService'){
        $serviceId = $_POST['service_id'];
        $service_name = $_POST['service_name'];
        $service_price = $_POST['service_price'];
        // $service_article = $_POST['service_article'];
        $service_contents = $_POST['service_contents'];

        $sqlu = "UPDATE services SET service_name='$service_name', fees='$service_price', content='$service_contents' WHERE serviceId='$serviceId'";
        $sqlu_run = mysqli_query($conn, $sqlu);


        echo "TrueProfile";


    }
?>