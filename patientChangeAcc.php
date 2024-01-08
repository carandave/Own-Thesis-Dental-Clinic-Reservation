<?php

require_once "connection.php";

        session_start();

        

        if(!isset($_SESSION['email'])){
            header("Location: login.php");
        }
        
        if(isset($_SESSION['email']) && isset($_SESSION['position'])){

            // echo $_SESSION['email'];
            // echo $_SESSION['position'];

           if($_SESSION['position'] == "Admin"){       
            //    echo "<div id='demo'>123456</div>";
            //    echo "Admin talaga to";       
           }
       
           else if($_SESSION['position'] == "Patient"){
            //    header("Location: dashPatient.php");

            //    echo "<div id='demo'>12345678</div>";
            //    echo "Parehoooo admin talga hahaha";
           }
        }


        
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>Dental Clinic | Patient Change Account </title>
    <link rel="icon" href="img/Logo.png" type="image/x-icon">
    <!-- Custom Css File Start -->
    <link rel="stylesheet" href="styles/dashAdmin.css">  
    <!-- Custom Css File End-->
    <!-- Font Links Start-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Links End-->

    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- bootstrap css and js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap Links Start -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     -->
    <!-- Bootstrap Links End -->

    <!-- Animation Links Start -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->
    <!-- Animation Links End -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> -->
    <!-- Sweetalert Cdn Start -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Sweetalert Cdn End -->

    
</head>
<body style="height: 100vh;">


    <div class="" style=" width: 100%">
        <?php require("templates/main-header.php"); ?>
    </div>

    <div class="d-flex" >
        <div class="bg-dark __sidebar" >
            <?php require("templates/sidebar.php"); ?>
        </div>
        <div class="whole">
            <div class="p-5">
                <h3 style="border-bottom: 2px solid #002c42">Patient Profile </h3>
                <h6 class="mt-3 mb-3">Edit Credentials</h6>

                <?php 

                    
                    $patientId = $_SESSION['id'];

                    
                    
                    $sqlp = "SELECT * FROM users WHERE patientId ='$patientId'";
                    $resultp = $conn->query($sqlp);
                    
                
                ?>

                <?php if($resultp->num_rows > 0){?>
                <?php while($rows = $resultp->fetch_assoc()){?>
                <form action="" method="post" id="updateCredentials-form" style="margin-bottom: 300px;">
                    <div class="row">
                        <input type="text" value="<?php echo $rows['patientId']?>" name="patientId" class="d-none">
                        <input type="text" value="<?php echo $rows['pass_word']?>" name="patientCurrentPassword" class="d-none">
                        <div class="col-md-6">
                            <label for="">Current Password</label>
                            <input type="text" value="" name="inputCurrentPassword" class="form-control">
                        </div>

                        
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="">New Password</label>
                            <input type="text" value="" name="newPassword" class="form-control">
                        </div>

                        
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="">Confirm Password</label>
                            <input type="text" value="" name="conPassword" class="form-control" >
                        </div>

                        
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="button" class="btn btn-info" value="Update" id="updateCredentials">
                        </div>

                        
                    </div>

                    
                </form>

                <?php }?> 
            <?php }?> 

                
                <!-- <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div> -->

                    
                
                


                

                
                
                
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function (){

            // $(".alert").alert("show")
            
            

            //Update of Teeth
            $('#updateCredentials').click(function(e){
                console.log("Click Profile");
            e.preventDefault();
            $.ajax({
                url: 'patientChangeAcc_update.php',
                method: 'post',
                data: $("#updateCredentials-form").serialize()+ '&action=updateCredentials',
                success: function(response){


                    // window.location = "dentistTreatment_view.php";
                    
                    // $("#teethModal").close();data-dismiss="modal"
                    // $('.modal').attr('data-dismiss', 'modal');
                    // $("#teethModal").modal('hide');
                    // alert("Successfully Updated the Profile")
                    // window.location = "dentistTreatment_view.php";
                    // $(".alert").addClass('d-block');
                    console.log(response);

                    if(response == "OneMatched"){

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Successfully Updated Password',
                            showConfirmButton: false,
                            timer: 1500  
                        }).then(function(){
                            window.location = "dentistChangeAcc.php";
                            
                        })

                    }

                    if(response == "NoMatched"){

                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'The New Password and Confirm Password are not matched!',
                            showConfirmButton: false,
                            timer: 1500  
                        }).then(function(){
                            window.location = "dentistChangeAcc.php";
                            
                        })

                    }

                    if(response == "Not"){

                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Make sure your current password is correct!',
                        showConfirmButton: false,
                        timer: 1500  
                    }).then(function(){
                        window.location = "dentistChangeAcc.php";
                        
                    })

                    }

                    

                    
                    
                }
            });

            return true;
            });
            

            

            

            
            
            

        });

    </script>
    

    
        
    

    





    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
        <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    
</body>
</html>