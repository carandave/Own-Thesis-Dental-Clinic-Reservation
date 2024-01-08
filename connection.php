<?php 

    $dbhost = "localhost"; 
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "dcms";

    // $dbhost = "localhost"; 
    // $dbusername = "u962515527_root";
    // $dbpassword = "clinicDental123";
    // $dbname = "u962515527_dcms"; 

    $conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname); //Icoconnect na natin sa Database gamit ang mysqli method

    if($conn->connect_error){ // Kapag nag true 'tong condition mag piprint ng Connection failed kasama ang error message
        die("Connection Failed".$conn->connect_error);
    }
    else{ // Kapag walang nakitang error it means connected na sya
        // echo "Connected";
    }
?>