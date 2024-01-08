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

        if(isset($_POST['printBtn'])){
            $patientId = $_POST['patientId'];
        }

        else{
            header("Location: patient_view.php");
        }


        
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>Dental Clinic | Treatment Reports Print</title>
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
            <div class="container mb-5">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0 mr-3">Print Patient Treatment Reports</h5>

                        <div>

                        <button class="btn btn-info btn-border btn-round" onclick="printDiv('printThis')">
                            Print
                        </button>
                        </div>
                        
                        
                    </div>       
                </div>
                
                <div class="card-body m-5" id="printThis">
                    <div class="d-flex flex-wrap justify-content-center pb-3" style="border-bottom:1px solid red">
                        <div class="" style="width: 100%">
                            <div class="row">
                                <div class="col-md-4 d-flex align-items-center">
                                        <img src="img/Logo.png" alt="" style="height: 150px">
                                </div>
                                <div class="col-md-4 d-flex justify-content-center flex-column">
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                                        <h6 class="mb-0 ">Republic of the Philippines</h6>    
                                        <h5 class="fw-bold mt-1 mb-0" style="color: #002c42 !important;">Dental Care Portal</h5>
                                        <h6 class="fw-bold my-0"><span class="" style="">dentalcare@gmail.com</span></h6>
                                        <h6 class="fw-bold "><span class="" style="">+63 912332112</span></h6>
                                    </div>
                                        
                                </div>
                            </div>
                                
                        </div>
                    </div>
                    <?php 
                            
                            // $patientId = $_SESSION['id'];

                            // $sql = "SELECT a.appointment_date, a.appointment_time, a.status, d.fullname FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId INNER JOIN services s ON a.serviceId = s.serviceId WHERE u.patientId = '$patientId'";
                            // $sql = "SELECT a.appointment_date, a.appointment_time, a.status, d.fullname FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId WHERE u.patientId = '$patientId' AND a.status='Confirmed'";
                            $sqlt = "SELECT t.treatmentId, t.patientId, t.dentistId, t.serviceId, t.date_visit, t.service_name, t.teethNo, t.description, t.fees, t.totalFees, t.totalChange, t.remarks, t.dateTreatment_submitted, u.first_name, u.last_name, u.teeth1, u.teeth2, u.teeth3, u.teeth4, u.teeth5, u.teeth6, u.teeth7, u.teeth8, u.teeth9, u.teeth10, u.teeth11, u.teeth12, u.teeth13, u.teeth14, u.teeth15, u.teeth16, u.teeth17, u.teeth18, u.teeth19, u.teeth20, u.teeth21, u.teeth22, u.teeth23, u.teeth24, u.teeth25, u.teeth26, u.teeth27, u.teeth28, u.teeth29, u.teeth30, u.teeth31, u.teeth32, d.fullname FROM treatment t INNER JOIN dentist d ON t.dentistId = d.dentistId INNER JOIN users u ON t.patientId = u.patientId WHERE u.patientId = '$patientId'";
                            $resultt = $conn->query($sqlt);

                            //Tapos na tayo sa Treatment Page
                        ?>

                        <table class="table table-responsive table-striped table-bordered mt-2">
                            <thead style="background-color: #002c42 !important; color: white; text-align: left">
                                <!-- <th>Patient Id</th> -->
                                <th>Name</th>
                                <th>Date Visit</th>
                                <th>Dentist</th>
                                <!-- <th>Teeth No</th> -->
                                <th>Treatment</th>
                                <th>Description</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Pay of Patient</th>
                                <th scope="col">Change</th>
                            </thead>

                            <?php ?>

                            <tbody>
                                <?php if ($resultt->num_rows > 0) { ?>
                                    <?php while($rowt = $resultt->fetch_assoc()){?>
                                        <tr>
                                            <td><?php echo $rowt['first_name']; ?> <?php echo $rowt['last_name']; ?></td>
                                            <td class="d-none"><?php echo $rowt['patientId']; ?></td>
                                        <td>
                                
                                <?php echo date("l, F j Y", strtotime($rowt['date_visit']));?>
                            </td>
                            

                            <td class=""><?php echo $rowt['fullname']; ?></td>
                                            
                                            
                                            
                                            <td><?php echo $rowt['service_name']; ?></td>
                                            <td><?php echo $rowt['description']; ?></td>
                                            <td>Php <?php echo $rowt['fees']; ?></td>
                                            <td>Php <?php echo $rowt['totalFees']; ?></td>
                                            <td>Php <?php echo $rowt['totalChange']; ?></td>
                                            <!-- <td><?php echo $rowt['remarks']; ?></td> -->

                                            <td class="d-none"><?php echo $rowt['teeth1']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth2']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth3']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth4']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth5']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth6']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth7']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth8']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth9']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth10']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth11']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth12']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth13']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth14']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth15']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth16']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth17']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth18']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth19']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth20']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth21']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth22']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth23']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth24']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth25']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth26']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth27']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth28']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth29']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth30']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth31']; ?></td>
                            <td class="d-none"><?php echo $rowt['teeth32']; ?></td>
                                        </tr>
                                    <?php }?>
                                <?php } ?>
                                
                                    
                            </tbody>
                        </table>

                <div class="row">
                    <div class="col-md-6">

                    </div>

                    <div class="col-md-6 text-right" >
                        <?php date_default_timezone_set('Asia/Manila'); ?>
                        <p style="font-weight: bold" class="text-right"><?php echo date("Y-m-d  h:i:sa") ?></p>
                    </div>
                </div>

                
                
                            
                </div>
            </div> 
        </div>   
        </div>
    </div>



    

    <script>
            function printDiv(divName) {
                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;

                        window.print();

                        document.body.innerHTML = originalContents;
                    
            }
    </script>
    

    
        
    

    





    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
        <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    
</body>
</html>