<?php 
    require_once "connection.php";
    $msg="";
    if(isset($_GET['email']) && isset($_GET['token'])){
        $email = $_GET['email'];
        $token = $_GET['token'];

        $stmt = $conn->prepare("SELECT patientId FROM users WHERE email=? AND token=? AND token<>'' AND token_expire>NOW()");
        $stmt->bind_param("ss", $email,$token);
        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows>0){
            if(isset($_POST['submit'])){

                $newpass = sha1($_POST['newpass']);
                $cnewpass = sha1($_POST['cnewpass']);

                if($newpass == $cnewpass){
                    $stmt_u = $conn->prepare("UPDATE users SET token='', pass_word=? WHERE email=?");
                    $stmt_u->bind_param("ss", $newpass, $email);
                    $stmt_u->execute();

                    
                    echo '<script>alert("Password Changed Succesfully")</script>';
                    $msg = "Password Changed Succesfully";
                    
                    // header("Location: login.php");
                    
                    echo '<script>window.location.href = "login.php"</script>';
                    
                }

                else{
                    echo '<script>alert("Password Did not match!")</script>';
                    $msg = "Password Did not match";
                }
            }

        }

    }
            
    else{
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo.png" type="image/x-icon">
    <!-- Custom Css File Start-->
    <link rel="stylesheet" href="styles/forgot.css">  
    <!-- Custom Css File End-->
    <!-- Font Links Start-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Links End-->
    <!-- Bootstrap Links Start -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap Links End -->

    <!-- Animation Links Start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Animation Links End -->

    <title>Dental Clinic | Log In</title>
</head>
<body class="animate__animated animate__fadeIn animate__faster">
    <div class="container-fluid">
        <div class="__row row px-5">
            <div class="__column col-sm-12">
                <div class="container d-flex justify-content-center align-items-center">
                    
                    <form action="" method="POST" id="reset-form">
                    <h1 class="title">Reset Password</h1>
                    <h4 class="__msg text-success text-center"><?= $msg; ?></h4>
                        <div class="form-group">
                            <label class="mb-0">Enter New Password</label>
                            <input type="password" class="form-control" name="newpass" placeholder="New Password" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label class="mb-0">Confirm New Password</label>
                            <input type="password" class="form-control" name="cnewpass" placeholder="Confirm Password" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="forgot-btn" class="__reset-btn btn-block" value="Reset">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Sweetalert Cdn Start -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Sweetalert Cdn End -->

    <script type="text/javascript">
        // console.log("");
        $(document).ready(function() { // Kelangan mag load muna lahat bago nya irun ang nasa loob ng function na'to
            $("#alertFailed").hide();
            $("#alertSuccess").hide();
            
            $("#reset-form").validate(); // Ivavalidate nya yung form kung merong laman mag eerror kung walang laman mag lalabas sya ng error 

        });


    </script>

</body>
</html>