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
    <title>Dental Clinic | Inventory Reports</title>
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
        <div class="bg-dark" style="width: 17%">
            <?php require("templates/sidebar.php"); ?>
        </div>

        <!-- Start Edit Modal -->
        <div class="modal fade" id="editmodal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="editProd-form">
                        <div>
                            <input type="text" class="d-none" name="update_id" id="update_id">
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <label for="">Product Name <span>*</span></label>
                                <input type="text" name="editprodName" id="editprodName" class="form-control mb-3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Stocks <span>*</span></label>
                                <input type="text" name="editprodStocks" id="editprodStocks" class="form-control">
                            </div>        
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-secondary" name="updateProdBtn" id="updateProdBtn" value="Update">
                            <!-- <button type="button" class="btn btn-secondary" name="updateData">Save</button> -->
                        </div>
                    </form>
                </div>
                
                </div>
            </div>
        </div>

        <!-- End Edit Modal -->

        <div style="width: 83%">
            <div class="p-5">
                <h3 style="border-bottom: 2px solid #002c42">Inventory </h3>
                <h6 class="mt-3 mb-3">Inventory Reports</h6>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                            Add Products
                            </button>
                        </div>

                        <div class="col-md-6 d-flex justify-content-end">
                            <form action="adminInventoryReports_print.php" method="POST">
                                <!-- <input type="text" class="d-none" name="productIdPrint" value="<?php echo $rowp['productId']; ?>">
                                <input type="text" class="d-none" name="productNamePrint" value="<?php echo $rowp['products']; ?>">
                                <input type="text" class="d-none" name="productStocksPrint" value="<?php echo $rowp['stocks']; ?>"> -->
                                
                                <input type="submit" value="Print" name="printBtn" class="btn btn-primary form-control " style="width: 100px;">
                            </form>
                        </div>
                    </div>
                    

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Products </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" id="inventory-form">
                                <div class="row mb-3">

                                    <div class="col-12">

                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <label for="" class="mb-0">Product Name <span class="text-danger">*</span></label>
                                                <input type="text" name="prodName" id="prodName" class="form-control" required>
                                                
                                            </div>             
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <label for="" class="mb-0">Stocks <span class="text-danger">*</span>    </label>
                                                <input type="number" name="prodStocks" id="prodStocks" class="form-control" required>
                                            </div>
                                        </div>   
                                        
                                        
                                        
                                        

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-primary">Add Dentist</button> -->
                                    <input type="submit" class="btn btn-primary" id="addProducts" name="addProducts" value="Add Products">
                                </div>
                                
                            </form>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                
                <?php 

                    // $pos = $_SESSION['position'];
                    // $dentistId = $_SESSION['id'];

                    
                    // $sql = "SELECT * FROM users";
                    // $result = $conn->query($sql);
                    // $sql = "SELECT a.reqId, a.date_submitted, a.appointment_date, a.appointment_time, a.status, a.q1, a.q2, a.q3, a.q4, a.q5, a.q6, a.q7, a.q8, a.q9, a.q10, a.q11, a.q12, a.q13, d.dentistId, d.fullname, u.patientId, u.last_name, u.first_name, u.email, s.service_name FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId INNER JOIN services s ON a.serviceId = s.serviceId";
                    // Eto ang latest $sqlp = "SELECT prescriptionId, reqId, patientId, dentistId, dateToday, patientName, dentistName, medicine, notes FROM prescription WHERE dentistId ='$dentistId'";
                    
                    // $sqlp = "SELECT p.prescriptionId, p.patientId, p.dentistId, p.patientName, p.dateToday, p.dentistName, p.medicine, p.notes, u.patientId, u.gender, u.address FROM prescription p INNER JOIN users u ON p.patientId = u.patientId WHERE dentistId ='$dentistId'";
                    // $resultp = $conn->query($sqlp);
                    //Ipiprint na natin ang treatment list sa specific dentist

                    $sql = "SELECT * FROM inventory";
                    $result = $conn->query($sql);


                
                ?>


                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 200px;">
                    <thead style="background-color: #002c42 !important; color: white; text-align: left">
                        <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Stocks</th>
                        <!-- <th scope="col">Last Updated</th> -->
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) { ?>
                        <?php while($row = $result->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $row['productId']; ?></td>
                            <td><?php echo $row['products']; ?></td>
                            <td><?php echo $row['stocks']; ?></td>
                            <!-- <td><?php echo $row['last_updated']; ?></td> -->
                            
                            <td>
                                <button type="button" class="btn btn-secondary mr-2 editBtn">
                                    Edit
                                </button>
                            </td>
                        
                        </tr>
                        <?php }?>
                        <?php } ?>

                        
                        
                    </tbody>
                </table>

                
                
                
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function (){
            //Adding of Inventory
            $('#addProducts').click(function(e){

                    e.preventDefault();
                    $.ajax({
                        url: 'inventory_add.php',
                        method: 'post',
                        data: $("#inventory-form").serialize()+ '&action=addProducts',
                        success: function(response){
                            // $("#alert").show();
                            // $("#result").html(response);
                            console.log(response);

                            if(response == "Success"){

                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Successfully Added Product',
                                    showConfirmButton: false,
                                    timer: 1500  
                                }).then(function(){
                                    window.location = "inventory_view.php";
                                })

                            }

                            else if(response == "UnSuccess"){

                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'There was an error',
                                showConfirmButton: false,
                                timer: 1300  
                            }).then(function(){
                                window.location = "inventory_view.php";
                            })

                            }

                            
                            
                        }
                    });
             
                return true;
            });

            // Edit Products
            $('#updateProdBtn').click(function(e){

            e.preventDefault();
            $.ajax({
                url: 'inventory_update.php',
                method: 'post',
                data: $("#editProd-form").serialize()+ '&action=editProducts',
                success: function(response){
                    // $("#alert").show();
                    // $("#result").html(response);
                    console.log(response);

                    if(response == "SuccessEdit"){

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Successfully Edited Product',
                            showConfirmButton: false,
                            timer: 1500  
                        }).then(function(){
                            window.location = "inventory_view.php";
                        })

                    }

                    else if(response == "UnSuccessEdit"){

                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'There was an error',
                        showConfirmButton: false,
                        timer: 1300  
                    }).then(function(){
                        window.location = "inventory_view.php";
                    })

                    }

                    
                    
                }
            });

            return true;
            });

            
            // Print Data Edit modal
            $('.editBtn').on('click', function(){
                console.log("Clikced")
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                // console.log(data);

                $('#update_id').val(data[0]);
                $('#editprodName').val(data[1]);
                $('#editprodStocks').val(data[2]);
 
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