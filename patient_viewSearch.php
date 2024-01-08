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
    <title>Dental Clinic | Patient</title>
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
                <h3 style="border-bottom: 2px solid #002c42">Patient</h3>
                <h6 class="mt-3 mb-3">Patient List</h6>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#exampleModal">
                    Add Patient
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="patient_add.php" method="post">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="" class="mb-0">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="pat_firstname" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="mb-0">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="pat_lastname" class="form-control" required>
                                    </div>
                                    
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="" class="mb-0">Birth Date <span class="text-danger">*</span></label>
                                        <input type="date" name="pat_birthdate" class="form-control" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="" class="mb-0">Gender <span class="text-danger">*</span></label>
                                        <select class="form-control" name="pat_gender" required>
                                            <option value="">Select Gender <span class="text-danger">*</span></option>
                                            <option value="Male" class="form-control">Male</option>
                                            <option value="Female" class="form-control">Female</option>
                                        </select>
                                        <!-- <input type="text" name="" class="form-control" required> -->
                                    </div>
                                    
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Address <span class="text-danger">*</span></label>
                                        <input type="text" name="pat_address" class="form-control" required>
                                    </div>
                                    
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="" class="mb-0">Phone No. <span class="text-danger">*</span></label>
                                        <input type="number" name="pat_number" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="mb-0">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="pat_email" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="" class="mb-0">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="pat_password" class="form-control" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="mb-0">Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" name="pat_cpassword" class="form-control" required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-primary">Add Dentist</button> -->
                            <input type="submit" class="btn btn-primary" name="addPatient" value="Add Patient">
                        </div>
                                
                            </form>
                        </div>
                        
                        </div>
                    </div>
                    </div>

                <div class="row mb-3">

                    <div class="col-md-6">

                    </div>

                    <div class="col-md-6 d-flex justify-content-end">
                            <form action="patient_viewSearch.php" method="get" class="d-flex justify-content-center align-items-center">
                                <input type="text" name="search" id="search" class="form-control mb-0" placeholder="Search Last Name..." required>
                                <button type="submit" class="btn btn-secondary mb-0 ml-2">Search</button>
                            </form>
                    </div>

                </div>
                
                
                <?php 

                    $pos = $_SESSION['position'];

                    $search = $_GET['search'];

                    // $sql = "SELECT * FROM dentist ";
                    $sql = "SELECT * FROM users WHERE last_name LIKE '%$search%'";
                    $result = $conn->query($sql);


                
                ?>


                <table class="table table-striped table-responsive table-hover table-bordered" style="margin-bottom: 200px;">
                    <thead style="background-color: #002c42 !important; color: white; text-align: left">
                        <tr>
                        <th scope="col" class="d-none">Patient Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Birth Date</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                        <th scope="col">Patient History</th>
                       
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) { ?>
                        <?php while($row = $result->fetch_assoc()){?>
                        <tr>
                            <td class="d-none"><?php echo $row['patientId']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['birth_date']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['phone_no']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <input type="submit" class="btn btn-secondary editBtn" value="Edit">
                            </td>

                            <td>

                                <form action="patient_view_medical_history.php" method="POST">
                                    <input type="text" class="d-none" name="patient_Id" value="<?php echo $row['patientId'];?>">
                                    <input type="submit" class="btn btn-info" name="viewHistoryBtn" value="View History">
                                </form>

                            </td>
                            
                        </tr>
                        <?php }?>
                        <?php } ?>

                        
                        
                    </tbody>
                </table>

            <!-- Start Edit Modal -->
                <div class="modal fade" id="editpatientmodal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Patient Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" id="editPatient-form">
                                <div>
                                    <input type="text" name="patient_id" id="patientId" class="d-none">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Patient First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" id="patient_first_name" class="form-control">
                                    
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Patient Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" id="patient_last_name" class="form-control">
                                    </div>
                                    
                                </div>

                                <div class="mt-3 " >
                                    <label for="">Birth Date <span class="text-danger">*</span></label>
                                    <input type="date" name="patient_birthdate" id="patient_birthdate" class="form-control">
                                </div>

                                <div class="mt-3 ">
                                    <label for="">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="patient_address" id="patient_address" class="form-control">
                                </div>

                                

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="">Gender <span class="text-danger">*</span></label>
                                        <input type="text" name="patient_gender" id="patient_gender" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Phone No. <span class="text-danger">*</span></label>
                                        <input type="text" name="patient_phone" id="patient_phone" class="form-control">
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-secondary" name="updatePatient" id="updatePatientBtn" value="Update">
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

        $(document).ready(function (){
            $('.editBtn').on('click', function(){
                console.log("Clikced")
                $('#editpatientmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                // console.log(data);

                $('#patientId').val(data[0]);
                $('#patient_first_name').val(data[1]);
                $('#patient_last_name').val(data[2]);
                $('#patient_birthdate').val(data[3]);
                $('#patient_address').val(data[4]);
                $('#patient_gender').val(data[5]);
                $('#patient_phone').val(data[6]);
            });
        });

        //Update of Teeth
        $('#updatePatientBtn').click(function(e){
                console.log("Click Profile");
            e.preventDefault();
            $.ajax({
                url: 'patient_update.php',
                method: 'post',
                data: $("#editPatient-form").serialize()+ '&action=updatePatient',
                success: function(response){

                    console.log(response);

                    if(response == "TrueProfile"){

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Successfully Updated Patient Information',
                            showConfirmButton: false,
                            timer: 1500  
                        }).then(function(){
                            window.location = "patient_view.php";
                            
                        })

                    }

                    // if(response == "NoMatched"){

                    //     Swal.fire({
                    //         position: 'center',
                    //         icon: 'error',
                    //         title: 'The New Password and Confirm Password are not matched!',
                    //         showConfirmButton: false,
                    //         timer: 1500  
                    //     }).then(function(){
                    //         window.location = "dentistChangeAcc.php";
                            
                    //     })

                    // }

                    // if(response == "Not"){

                    //     Swal.fire({
                    //         position: 'center',
                    //         icon: 'error',
                    //         title: 'Make sure your current password is correct!',
                    //         showConfirmButton: false,
                    //         timer: 1500  
                    //     }).then(function(){
                    //         window.location = "dentistChangeAcc.php";
                            
                    //     })

                    // }

                    

                    
                    
                }
            });

            return true;
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