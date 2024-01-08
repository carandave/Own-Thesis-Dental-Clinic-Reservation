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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#exampleModal">
                            Add Prescription
                            </button>
                        </div>

                        <div class="col-md-6 d-flex justify-content-end">
                            <form action="dentistPresctiption_viewSearch.php" method="get" class="d-flex justify-content-center align-items-center">
                                <input type="text" name="search" id="search" class="form-control mb-0" placeholder="Search Patient Name..." required>
                                <button type="submit" class="btn btn-secondary mb-0 ml-2">Search</button>
                            </form>
                        </div>

                        
                    </div>

                    <form action="dentistPrescription_filter.php" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">From Date Prescribed</label>
                                    <input type="date" name="from_date" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="font-weight-bold">To Date Prescribed</label>
                                    <input type="date" name="to_date" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div>
                                        <label for="" class="font-weight-bold">.</label>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Prescription</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" id="prescription-form">
                                <div class="row mb-3">

                                    <div class="col-12">
                                        <label for="" class="mb-0">Select Patient <span class="text-danger">*</span></label>
                                        <select name="patientId" id="patientPrescription" class="form-control">
                                            <option value="" selected="selected">Select Patient Name</option>
                                            
                                            <?php 

                                                $dentistId = $_SESSION['id'];

                                                // $sqlp = "SELECT t.reqId, t.patientId, t.dentistId, t.serviceId, t.status, u.first_name, u.last_name, u.patientId, d.dentistId FROM request_appointment t INNER JOIN users u ON t.patientId = u.patientId INNER JOIN dentist d ON t.dentistId = d.dentistId WHERE d.dentistId='$dentistId' AND t.status='Treated' AND t.statusPrescription=''";
                                                $sqlp = "SELECT t.reqId, t.patientId, t.dentistId, t.status, u.first_name, u.last_name, u.patientId, d.dentistId FROM request_appointment t INNER JOIN users u ON t.patientId = u.patientId INNER JOIN dentist d ON t.dentistId = d.dentistId WHERE d.dentistId='$dentistId' AND t.status='Treated' AND t.statusPrescription=''";
                                                // $resultset = mysqli_query($conn, $sql);
                                                $resultset = $conn->query($sqlp);

                                                //Dun na tayo sa pag lalagay ng 
                                                
                                            ?>

                                            <?php if ($resultset->num_rows > 0) { ?>
                                                <?php while($rows = $resultset->fetch_assoc()){ ?>

                                            
                                            <option value="<?php echo $rows['reqId'];?>"><?php echo $rows['first_name'];?> <?php echo $rows['last_name'];?></option>
                                            <!-- <option value=""><?php echo $rows['dentistId'];?> </option> -->
                                            <!-- <option value=""><?php echo $rows['reqId'];?> </option> -->
                                            
                                                <?php }?>
                                            <?php }?>
                                        </select>
                                        
                                    </div>
                                                         
                                </div>

                                <div class="row mb-3 d-none">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Request Id</label>
                                        <input type="text" name="reqId" id="reqId" value="" class="form-control" >
                                    </div>             
                                </div>

                                <div class="row mb-3 d-none">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Patient Id</label>
                                        <input type="text" name="spec_patientId" id="spec_patientId" value="" class="form-control" >
                                    </div>             
                                </div>

                                <div class="row mb-3 d-none">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Dentist Id</label>
                                        <input type="text" name="dentistId" id="dentistId" value="" class="form-control" >
                                    </div>             
                                </div>

                                <!-- <div class="row mb-3 d-none">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Service Id</label>
                                        <input type="text" name="serviceId" id="serviceId" value="" class="form-control" >
                                    </div>             
                                </div> -->

                                <div class="row mb-3 d-none">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Patient Name <span class="text-danger">*</span></label>
                                        <input type="text" name="patientName" id="patientName" value="" class="form-control" >
                                    </div>             
                                </div>

                                <div class="row mb-3 d-none">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Dentist Name <span class="text-danger">*</span></label>
                                        <input type="text" name="dentistName" id="dentistName" value="" class="form-control" >
                                    </div>             
                                </div>
                                <!-- Ididisplay na natin sa table ang prescription -->
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Date Visit <span class="text-danger">*</span></label>
                                        <!-- <input type="date" name="dateToday" value="" id="dateToday"  class="form-control" > -->
                                        <input type="text" name="dateToday" value="" id="appointmentDate"  class="form-control" readonly="true">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Medicine <span class="text-danger">*</span></label>
                                        <textarea name="medicine" id="medicine" cols="10" rows="3" class="form-control" required></textarea >
                                    </div>             
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Notes <span class="text-danger">*</span></label>
                                        <textarea name="notes" id="notes" cols="10" rows="3" class="form-control" required></textarea >
                                    </div>
                                </div>                                

                                <!-- <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="" class="mb-0">Remarks <span class="text-danger">*</span></label>
                                        <input type="text" name="patientRemarks" class="form-control" required>
                                    </div>
                                </div> -->

                                <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-primary">Add Dentist</button> -->
                            <input type="submit" class="btn btn-primary" id="addPrescription" name="addPrescription" value="Add Prescription">
                        </div>
                                
                            </form>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                
                <?php 

                    // $pos = $_SESSION['position'];
                    $dentistId = $_SESSION['id'];

                    
                    // $sql = "SELECT * FROM users";
                    // $result = $conn->query($sql);
                    // $sql = "SELECT a.reqId, a.date_submitted, a.appointment_date, a.appointment_time, a.status, a.q1, a.q2, a.q3, a.q4, a.q5, a.q6, a.q7, a.q8, a.q9, a.q10, a.q11, a.q12, a.q13, d.dentistId, d.fullname, u.patientId, u.last_name, u.first_name, u.email, s.service_name FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId INNER JOIN services s ON a.serviceId = s.serviceId";
                    // Eto ang latest $sqlp = "SELECT prescriptionId, reqId, patientId, dentistId, dateToday, patientName, dentistName, medicine, notes FROM prescription WHERE dentistId ='$dentistId'";
                    
                    $sqlp = "SELECT p.prescriptionId, p.patientId, p.dentistId, p.patientName, p.dateToday, p.date_Submitted,p.dentistName, p.medicine, p.notes, u.patientId, u.gender, u.address FROM prescription p INNER JOIN users u ON p.patientId = u.patientId WHERE dentistId ='$dentistId' ORDER BY prescriptionId DESC";
                    $resultp = $conn->query($sqlp);
                    //Ipiprint na natin ang treatment list sa specific dentist


                
                ?>


                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 300px;">
                    <thead style="background-color: #002c42 !important; color: white; text-align: left">
                        <tr>
                        <th scope="col">Patient Full Name</th>
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
                        <?php if ($resultp->num_rows > 0) { ?>
                        <?php while($rowp = $resultp->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $rowp['patientName']; ?></td>
                            <td>
                                
                                <?php echo date("l, F j Y", strtotime($rowp['date_Submitted']));?>
                            </td>
                            <td><?php echo $rowp['dentistName']; ?></td>
                            <td><?php echo $rowp['medicine']; ?></td>
                            <td><?php echo $rowp['notes']; ?></td>
                            <!-- <td>
                                <form action="dentistPrescription_print.php" method="POST">
                                    <input type="text" class="d-none" name="namePrint" value="<?php echo $rowp['patientName']; ?>">
                                    <input type="text" class="d-none" name="genderPrint" value="<?php echo $rowp['gender']; ?>">
                                    <input type="text" class="d-none" name="addressPrint" value="<?php echo $rowp['address']; ?>">
                                    <input type="text" class="d-none" name="medicinePrint" value="<?php echo $rowp['medicine']; ?>">
                                    <input type="text" class="d-none" name="notesPrint" value="<?php echo $rowp['notes']; ?>">
                                    <input type="submit" value="Print" name="printBtn" class="btn btn-secondary form-control">
                                </form>
                            </td> -->
                        <!-- Tapos na tayo sa pag lalagay ng mga data sa print Dun na tayo sa inventory -->
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
                        const d = new Date(empData.appointment_date).toDateString();
                        $("#appointmentDate").val(d);
                        
                        
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