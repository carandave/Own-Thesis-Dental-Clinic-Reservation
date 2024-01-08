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

        if(isset($_GET['from_date']) && isset($_GET['to_date'])){
            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];
        }


        
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>Dental Clinic | Prescription</title>
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
        <div style="width: 83%">
            <div class="p-5">
                <h3 style="border-bottom: 2px solid #002c42">Prescription </h3>
                <h6 class="mt-3 mb-3">Prescription List</h6>

                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <form action="dentistPresctiption_viewSearchFilter.php" method="get" class="d-flex justify-content-center align-items-center">
                            <input type="text" class="d-none" name="from_dateSearch" id="from_dateSearch" value="<?php echo $from_date?>">
                            <input type="text" class="d-none" name="to_dateSearch" id="to_dateSearch" value="<?php echo $to_date?>">
                            <input type="text" name="search" id="search" class="form-control mb-0" placeholder="Search Patient Name" required>
                            <button type="submit" class="btn btn-secondary mb-0 ml-2">Search</button>
                        </form>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="font-weight-normal">From: <?php echo date("F j Y", strtotime($from_date));?></label>
                    </div>

                    <div class="col-md-6">
                        <label class="font-weight-normal">To: <?php echo date("F j Y", strtotime($to_date));?></label>
                    </div>
                </div>

                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 300px;">
                    <thead style="background-color: #002c42 !important; color: white; text-align: left">
                        <tr>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Date Prescribed</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Medicine</th>
                        <th scope="col">Notes</th>
                        <!-- <th scope="col">Action</th> -->
                        <!-- <th scope="col">Fees</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Date Treated</th> -->
                       
                        </tr>
                    </thead>
                    <tbody>

                        <?php 

                            if(isset($_GET['from_date']) && isset($_GET['to_date'])){

                                $dentistId = $_SESSION['id'];

                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                
                                $queryF = "SELECT p.prescriptionId, p.patientId, p.dentistId, p.patientName, p.dateToday, p.date_Submitted, p.dentistName, p.medicine, p.notes, u.patientId, u.gender, u.address FROM prescription p INNER JOIN users u ON p.patientId = u.patientId WHERE dentistId ='$dentistId' AND p.date_Submitted BETWEEN '$from_date' AND '$to_date' ORDER BY date_Submitted DESC";
                                // $queryF = "SELECT * FROM prescription WHERE date_Submitted BETWEEN '$from_date' AND '$to_date' ORDER BY date_Submitted DESC";
                                $resultF = mysqli_query($conn, $queryF);

                                if(mysqli_num_rows($resultF) > 0){
                                    foreach($resultF as $rowsF){
                                        ?>
                                            <tr>
                                                <td><?php echo $rowsF['patientName']; ?></td>
                                                <td>
                                                    <?php echo date("l, F j Y", strtotime($rowsF['date_Submitted']));?>
                                                </td>
                                                <td><?php echo $rowsF['dentistName']; ?></td>
                                                <td><?php echo $rowsF['medicine']; ?></td>
                                                <td><?php echo $rowsF['notes']; ?></td>
                                            </tr>
                                        <?php
                                    }
                                }

                                else{
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>No Records Found!</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                }
                            }



                        ?>

                    </tbody>
                </table>

                
                
                
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function (){
            //Adding of Treatment
            $('#addPrescription').click(function(e){

                    e.preventDefault();
                    $.ajax({
                        url: 'dentistPrescription_add.php',
                        method: 'post',
                        data: $("#prescription-form").serialize()+ '&action=addPrescription',
                        success: function(response){
                            // $("#alert").show();
                            // $("#result").html(response);
                            console.log(response);

                            if(response == "Prescribed"){

                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Successfully Added Prescription',
                                    showConfirmButton: false,
                                    timer: 1500  
                                }).then(function(){
                                    window.location = "dentistPrescription_view.php";
                                })

                            }

                            else if(response == "UnPrescribed"){

                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'There is an error',
                                showConfirmButton: false,
                                timer: 1300  
                            }).then(function(){
                                window.location = "dentistPrescription_view.php";
                            })

                            }

                            
                            
                        }
                    });
             
                return true;
            });
            
            // Viewing of Treatment
            $("#patientPrescription").change(function(){
                
                var id = $(this).find(":selected").val();
                var dataString = 'preid=' + id;
                console.log(dataString);
                $.ajax({
                    url: 'dentistGetPatient2.php',
                    dataType: "json",
                    data: dataString,
                    cache: false,
                    success: function(empData){

                        console.log(empData.reqId);
                        console.log(empData.patientId);
                        console.log(empData.dentistId);
                        // console.log(empData.serviceId);
                        console.log(empData.first_name);
                        console.log(empData.fullname);
                        
                        // document.getElementById("appointmentDate").value = empData.appointment_date;
                        // document.getElementById("appointmentTreatment").value = empData.serviceId;
                        
                        // $("#appointmentTreatment").val(empData.service_name);
                        // $("#patientFees").val(empData.fees);
                        $("#reqId").val(empData.reqId);
                        $("#spec_patientId").val(empData.patientId);
                        $("#dentistId").val(empData.dentistId);
                        // $("#serviceId").val(empData.serviceId);
                        $("#patientName").val(empData.first_name + " " +empData.last_name);
                        $("#dentistName").val(empData.fullname);
                        
                        
                    }
                })
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