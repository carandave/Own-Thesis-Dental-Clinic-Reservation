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
               header("Location: dashPatient.php");

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
    <title>Dental Clinic | Dentist</title>
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

    <!-- Sweetalert Cdn Start -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Sweetalert Cdn End -->

    <!-- Bootstrap Links Start -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     -->
    <!-- Bootstrap Links End -->

    <!-- Animation Links Start -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->
    <!-- Animation Links End -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> -->

</head>
<body style="height: 100vh;">


    <div class="" style=" width: 100%">
        <?php require("templates/main-header.php"); ?>
    </div>

    <div class="d-flex" >
        <div class="bg-dark" style="width: 17%">
            <?php require("templates/sidebar.php"); ?>
        </div>
        <div style="width: 83%">
            <div class="p-5">
                <h3 style="border-bottom: 2px solid #002c42">Dentist</h3>
                <h6 class="mt-3 mb-3">Dentist List</h6>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#exampleModal">
                    Add Dentist
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Dentist</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="dentist_add.php" method="post">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="" class="mb-0">Full Name</label>
                                        <input type="text" name="doctor_name" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="mb-0">Birth Date</label>
                                        <input type="date" name="doctor_birthdate" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="" class="mb-0">Address</label>
                                        <input type="text" name="doctor_address" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="mb-0">Gender</label>
                                        <input type="text" name="doctor_gender" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="" class="mb-0">Phone No.</label>
                                        <input type="number" name="doctor_number" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="mb-0">Email</label>
                                        <input type="email" name="doctor_email" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="" class="mb-0">Password</label>
                                        <input type="password" name="doctor_password" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="mb-0">Confirm Password</label>
                                        <input type="password" name="doctor_cpassword" class="form-control" required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-primary">Add Dentist</button> -->
                            <input type="submit" class="btn btn-primary" name="addDentist" value="Add Dentist">
                        </div>
                                
                            </form>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                
                <?php 

                    // $pos = $_SESSION['position'];

                    // $sql = "SELECT * FROM dentist ";
                    $sql = "SELECT * FROM dentist WHERE position='Dentist'";
                    $result = $conn->query($sql);


                
                ?>


                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 200px;">
                    <thead style="background-color: #002c42 !important; color: white; text-align: left">
                        <tr>
                        <th scope="col" class="d-none">Dentist Id</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                       
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) { ?>
                        <?php while($row = $result->fetch_assoc()){?>
                        <tr>
                            <td class="d-none"><?php echo $row['dentistId']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['birthdate']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <input type="submit" class="btn btn-secondary editBtn" value="Edit">
                            </td>
                            
                        </tr>
                        <?php }?>
                        <?php } ?>

                        
                        
                    </tbody>
                </table>

                <!-- Start Edit Modal -->
                <div class="modal fade" id="editdentistmodal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Dentist Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" id="editDentist-form">
                                <div>
                                    <input type="text" name="dentist_id" id="dentist_id" class="d-none">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Full Name<span>*</span></label>
                                        <input type="text" name="dentist_full_name" id="dentist_full_name" class="form-control">
                                    
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Birth Date<span>*</span></label>
                                        <input type="date" name="dentist_birthdate" id="dentist_birthdate" class="form-control">
                                    </div>
                                    
                                </div>

                                <div class="row mt-3 ">
                                    <div class="col-md-6">
                                        <label for="">Email <span>*</span></label>
                                        <input type="text" name="dentist_email" id="dentist_email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Address <span>*</span></label>
                                        <input type="text" name="dentist_address" id="dentist_address" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="">Gender <span>*</span></label>
                                        <input type="text" name="dentist_gender" id="dentist_gender" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Phone No. <span>*</span></label>
                                        <input type="text" name="dentist_phone" id="dentist_phone" class="form-control">
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-secondary" name="updateDentist" id="updateDentistBtn" value="Update">
                                    <!-- <button type="button" class="btn btn-secondary" name="updateData">Save</button> -->
                                </div>
                            </form>
                        </div>
                        
                        </div>
                    </div>
                </div>

            <!-- End Edit Modal -->

                
                
                
            </div>
        </div>
    </div>

    <script>

        //Viewing of Dentist Data
        $(document).ready(function (){
            $('.editBtn').on('click', function(){
                console.log("Clikced")
                $('#editdentistmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#dentist_id').val(data[0]);
                $('#dentist_full_name').val(data[1]);
                $('#dentist_birthdate').val(data[2]);
                
                $('#dentist_address').val(data[3]);
                $('#dentist_gender').val(data[4]);
                $('#dentist_phone').val(data[5]);
                $('#dentist_email').val(data[6]);
            });


            //Update of Dentist
            $('#updateDentistBtn').click(function(e){
                console.log("Click Profile");
                e.preventDefault();
                $.ajax({
                    url: 'dentist_update.php',
                    method: 'post',
                    data: $("#editDentist-form").serialize()+ '&action=updateDentist',
                    success: function(response){

                        console.log(response);

                        if(response == "TrueProfile"){

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Successfully Updated Dentist Information',
                                showConfirmButton: false,
                                timer: 1500  
                            }).then(function(){
                                window.location = "dentist_view.php";
                                
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