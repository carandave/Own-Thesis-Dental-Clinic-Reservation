<?php 
    session_start();

    session_destroy();
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
                    <div class="alert alert-danger text-center" role="alert" id="alertFailed">
                        <strong id="result">Forgot Password Failed! Please make sure you have an account.</strong>
                    </div>

                    <div class="alert alert-success text-center" role="alert" id="alertSuccess">
                        <strong id="result">The email has been sent. Please check your email.</strong>
                    </div>
                    
                    <form class="" id="forgot-form">
                    <h1 class="title">Forgot Password</h1>
                    <p class="__desc-forgot text-muted text-center">To reset your password enter the email address and we will send the reset password instructions on your email.</p>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="emails" placeholder="Email" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="forgot-btn" class="__reset-btn btn-block" value="Forgot">
                            <a href="login.php" class="__back-btn button btn-block">Back</a>
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
            
            $("#forgot-form").validate(); // Ivavalidate nya yung form kung merong laman mag eerror kung walang laman mag lalabas sya ng error 

            $("#forgot-btn").click(function(e){
                if(document.getElementById("forgot-form").checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url: "process.php",
                        method: "POST",
                        data: $("#forgot-form").serialize() + "&action=forgot",
                        success: function(response){

                            if(response === "Message"){
                                $("#alertSuccess").show();
                            }

                            else if(response === "NoEmail"){
                                $("#alertFailed").show();
                            }
                        }
                    })
                }
                else{
                    // console.log("May maling nakita sa form");
                }

            })

        });


    </script>

</body>
</html>