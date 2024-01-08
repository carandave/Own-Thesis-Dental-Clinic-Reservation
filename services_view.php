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
    <title>Dental Clinic | Services</title>
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
                <h3 style="border-bottom: 2px solid #002c42">Services</h3>
                <h6 class="mt-3 mb-3">Services List</h6>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#exampleModal">
                    Add Services
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Services</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="services_add.php" method="post">
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Service Name <span class="text-danger">*</span></label>
                                        <input type="text" name="service_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Price <span class="text-danger">*</span></label>
                                        <input type="text" name="service_price" class="form-control" required>
                                    </div>
                                </div>

                                <!-- <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Article Title <span class="text-danger">*</span></label>
                                        <input type="text" name="article_title" class="form-control" required>
                                    </div>
                                </div> -->

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Content <span class="text-danger">*</span></label>
                                        <textarea name="service_content" id="service_content" cols="20" rows="5" class="form-control" required>

                                        </textarea>
                                        <!-- <input type="number" name="service_content" class="form-control" required> -->
                                    </div>
                                </div>

                                <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-primary">Add Dentist</button> -->
                            <input type="submit" class="btn btn-primary" name="addServices" value="Add Services">
                        </div>
                                
                            </form>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                
                <?php 

                    // $pos = $_SESSION['position'];

                    // $sql = "SELECT * FROM dentist ";
                    $sql = "SELECT * FROM services";
                    $result = $conn->query($sql);


                
                ?>


                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 200px; width: 100%;">
                    <thead style="background-color: #002c42 !important; color: white; text-align: left">
                        <tr>
                        <th scope="col" class="d-none">Services Id</th>
                        <th >Service Name</th>
                        <th >Price</th>
                        <!-- <th >Service Article</th> -->
                        <th >Service Content</th>
                        <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) { ?>
                        <?php while($row = $result->fetch_assoc()){?>
                        <tr>
                            <td class="d-none"><?php echo $row['serviceId']; ?></td>
                            <td><?php echo $row['service_name']; ?></td>
                            <td><?php echo $row['fees']; ?></td>
                            <!-- <td><?php echo $row['article_title']; ?></td> -->
                            <td style="word-wrap: break-word !important;"><?php echo $row['content']; ?></td>
                            <td >
                                <input type="submit" class="btn btn-secondary editBtn" value="Edit">
                            </td>
                        </tr>
                        <?php }?>
                        <?php } ?>

                        
                        
                    </tbody>
                </table>

                <!-- Start Edit Modal -->
                <div class="modal fade" id="editservicemodal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Service Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" id="editService-form">
                                <div>
                                    <input type="text" name="service_id" id="service_id" class="d-none">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Service Name <span class="text-danger">*</span></label>
                                        <input type="text" name="service_name" id="service_name" class="form-control">
                                    
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Price <span class="text-danger">*</span></label>
                                        <input type="text" name="service_price" id="service_price" class="form-control">
                                    </div>
                                    
                                </div>

                                <!-- <div class="mt-3 ">
                                    <label for="">Service Article <span class="text-danger">*</span></label>
                                    <input type="text" name="service_article" id="service_article" class="form-control">
                                </div> -->

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="">Service Content <span class="text-danger">*</span></label>
                                        <textarea name="service_contents" id="service_contents" cols="20" rows="5" class="form-control">
                                        </textarea>
                                        <!-- <input type="text" name="service_content" id="service_content" class="form-control"> -->
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-secondary" name="updateServiceBtn" id="updateServiceBtn" value="Update">
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
                $('#editservicemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#service_id').val(data[0]);
                $('#service_name').val(data[1]);
                $('#service_price').val(data[2]);
                // $('#service_article').val(data[3]);
                $('#service_contents').val(data[3]);

            });


            //Update of Dentist
            $('#updateServiceBtn').click(function(e){
                console.log("Click Profile");
                e.preventDefault();
                $.ajax({
                    url: 'service_update.php',
                    method: 'post',
                    data: $("#editService-form").serialize()+ '&action=updateService',
                    success: function(response){

                        console.log(response);

                        if(response == "TrueProfile"){

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Successfully Updated the Service',
                                showConfirmButton: false,
                                timer: 1500  
                            }).then(function(){
                                window.location = "services_view.php";
                                
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