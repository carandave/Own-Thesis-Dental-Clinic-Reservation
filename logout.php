<?php 

    session_start();

    // echo "Logout";
    // echo $_SESSION['email'];
    // echo $_SESSION['position'];
    unset($_SESSION['email']);
    unset($_SESSION['position']);

    echo '<script>    
        window.location.href =  "index.php";
        </script>';

?>