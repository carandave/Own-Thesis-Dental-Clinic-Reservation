<?php

session_start();
    

session_destroy();


if(isset($_SESSION['email']) && $_SESSION['position'] == "Patient"){
    $_SESSION['email'];
    $_SESSION['position'];
    echo $_SESSION['email'];
    echo "Naka set na";
    header("Location: dashPatient.php");
}

else if(isset($_SESSION['email']) && $_SESSION['position'] == "Admin"){
    $_SESSION['email'];
    $_SESSION['position'];
    echo $_SESSION['email'];
    echo "Naka set na";
    header("Location: dashAdmin.php");
}

// else{
//     header("Location: signup.php");
// }

// else if(!isset($_SESSION['email'])){
//     // echo $_SESSION['position'];
//     echo "Hindi pa nakaset";
//     // header("Location: signup.php");
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo.png" type="image/x-icon">
    <!-- Custom Css File Start-->
    <link rel="stylesheet" href="styles/login.css">  
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

<style>
    .error{
        background-color: #D5DFE7 !important;
    }
</style>

<body class="animate__animated animate__fadeIn animate__faster">
    <div class="container-fluid">
        <div class="__row row px-sm-5" style="background-color: #D5DFE7 !important;">
            <div class="__column col-sm-12" style="background-color: #D5DFE7 !important;">
                <div class="container d-flex justify-content-center align-items-center" style="background-color: #D5DFE7 !important;">
                    <div class="alert alert-danger text-center" role="alert" id="alertFailed">
                        <strong id="result">Login Failed! Please make sure you have an account.</strong>
                    </div>
                    <div>

                    </div>
                    <form class="" id="login-form">
                    <h1 class="title" style="background-color: #D5DFE7 !important;">Dr. Bauzon Dental Clinic</h1>
                    <h1 class="create-acc" style="background-color: #D5DFE7 !important;">Patient Sign in</h1>
                        <div class="form-group" style="background-color: #D5DFE7 !important;">
                            <input type="email" name="email" id="uname" style="background-color: #D5DFE7 !important;" class="form-control" required placeholder="Email" autocomplete="off" />
                        </div>

                        <div class="form-group" style="background-color: #D5DFE7 !important;">
                            <input type="password" name="password" id="password" style="background-color: #D5DFE7 !important;" class="form-control" required placeholder="Password" autocomplete="off" />   
                        </div>

                        <div class="forgot-password" style="background-color: #D5DFE7 !important;">
                            <a href="forgot.php">Forgot Password?</a>
                        </div>
                        
                        <input type="submit" class="button btn-block" value="Login" id="login-btn">
                        <p class="text-center mb-1" style="background-color: #D5DFE7 !important;">Don't have an account? <a href="signup.php" id="signup-btn">Signup</a></p>
                        <p class="text-center" style="background-color: #D5DFE7 !important;">Login for Officials? <a href="loginAdmin.php" id="signup-btn">Click This</a></p>
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

    $("#alertFailed").hide();
        // console.log("");
        $(document).ready(function() { // Kelangan mag load muna lahat bago nya irun ang nasa loob ng function na'to
            $("#alertFailed").hide();
            // $("#alertSuccess").show();
            $("#login-form").validate(); // Ivavalidate nya yung form kung merong laman kung walang laman mag lalabas sya ng error 

            $("#login-btn").click(function(e){ // Kapag na-iclick ang register button gagawin nya yung mga nasa loob ng function
                if(document.getElementById("login-form").checkValidity()){ // Kapag nag true ito or kapag walang nakitang error gagawin nya yung mga nasa loob
                    e.preventDefault(); // para hindi mag reload ang page
                    $.ajax({ // Makikipag communicate tayo sa server side 
                        url: 'process.php', // Dito sya mapupunta kapag nag success
                        method: 'POST', // Para hindi makita sa URL and naiinput ni user
                        data: $("#login-form").serialize() + "&action=login", // Eto ang mga input data galing sa form naibabato natin sa server
                        success: function(response){ // Eto ang response na galing sa server papunta sa Client server

                            if(response === "Patient"){                          

                                
                                console.log("This is true talga sa Patientt");

                                
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Successfully Log in as a Patient',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    window.location = "dashPatient.php";
                                })
                            } 

                            if(response === "Admin"){                          

                                
                                console.log("This is true talga sa Admin");


                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Successfully Log in as an Admin',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    window.location = "dashAdmin.php";
                                })
                            } 


                            if(response === "LoginFailed"){
                                    $("#alertFailed").show();
                                }
                        
            

                        }
                    });          
                }
                
                return true;
                
            });


        });


    </script>
    
    
</body>
</html>