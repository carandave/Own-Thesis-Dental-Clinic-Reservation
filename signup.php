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

    <!-- Css File Start-->
    <link rel="stylesheet" href="styles/signup.css">
    <!-- Css File End-->

    <!-- Font Links Start-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Links End-->

    <!-- Bootstrap Links Start -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap Links End -->

    <!-- Animation Links Start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Animation Links End -->

    <title>Dental Clinic | Create Account</title>
</head>
<body class="animate__animated animate__fadeIn animate__faster">
    <div class="container-fluid">
        <div class="__row row px-3">
            <div class="__column-left col-md-4">
                <div class="__form-login container d-flex justify-content-center align-items-center text-center py-3">
                    <h1>Welcome Back !</h1>
                    <p>To keep connected with us please log in with your personal info</p>
                    <a href="login.php" class="btn">SIGN IN</a>
                </div>
            </div>

            <div class="__column-right col-md-8">
                <div class="container d-flex justify-content-center align-items-center">
                <h1 class="__createAcc text-center">Create Account</h1>

                <form class="__registerForm" id="register-form" >
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="firstname" class="form-control"  placeholder="First Name" required autocomplete="off">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="lastname" class="form-control" placeholder="Last Name" required autocomplete="off">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="date" name="birthdate" id="birthdate" class="form-control" placeholder="Birthday" required autocomplete="off">
                            </div>
                            <div class="col-lg-6">
                            <select class="form-control" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male" class="form-control">Male</option>
                                <option value="Female" class="form-control">Female</option>
                            </select>
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="number" name="phoneNo" class="form-control" placeholder="Phone No." required autocomplete="off">
                            </div>
                        </div>    
                    </div>

                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Address" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <input type="password" name="pass" id="pass" class="form-control" required placeholder="Password">
                    </div>

                    <div class="form-group">
                        <input type="password" name="cpass" id="cpass" class="form-control" required placeholder="Confirm Password">
                    </div>
                    <input type="submit" class="button" value="Register" id="register-btn">
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
            $("#alertSuccess").hide();
            // $("#alertSuccess").show();
            $("#register-form").validate({ // Ivavalidate nya yung form kung merong laman kung walang laman mag lalabas sya ng error
                rules:{ // Mag lalagay tayo ng rules kapag hindi nag match ang password sa confirm password mag lalabas sya ng error
                    cpass:{
                        equalTo: "#pass",
                    }
                }
            });
            

            $("#register-btn").click(function(e){ // Kapag na-iclick ang register button gagawin nya yung mga nasa loob ng function
                if(document.getElementById("register-form").checkValidity()){ // Kapag nag true ito or kapag walang nakitang error gagawin nya yung mga nasa loob
                    e.preventDefault(); // para hindi mag reload ang page
                    $.ajax({ // Makikipag communicate tayo sa server side 
                        url: 'process.php', // Dito sya mapupunta kapag nag success
                        method: 'POST', // Para hindi makita sa URL and naiinput ni user
                        data: $("#register-form").serialize() + "&position=Patient", // Eto ang mga input data galing sa form naibabato natin sa server
                        success: function(response){ // Eto ang response na galing sa server papunta sa Client server
                            console.log("Success" + response); 

                            Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'You are successfully registered!',
                                    showConfirmButton: false,
                                    timer: 1300  
                                }).then(function(){
                                    // window.location.href = ("login.php");
                                    window.location = "login.php";
                                })

                            

                        }
                    });          
                }
                return true;
                
            });


        });


    </script>

    

</body>
</html>
