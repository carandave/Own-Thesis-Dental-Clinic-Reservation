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



        // if(isset($_POST['printBtn'])){
        //     $namePrint = $_POST['namePrint'];
        //     $genderPrint = $_POST['genderPrint'];
        //     $addressPrint = $_POST['addressPrint'];
        //     $medicinePrint = $_POST['medicinePrint'];
        //     $notesPrint = $_POST['notesPrint'];
        // }


        
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>Dental Clinic | Inventory Reports Print</title>
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
                        <h5 class="card-title mb-0 mr-3">Print Inventory Reports</h5>

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

                    // $pos = $_SESSION['position'];
                    $dentistId = $_SESSION['id'];

                    // $sqlp = "SELECT p.prescriptionId, p.patientId, p.dentistId, p.patientName, p.dateToday, p.dentistName, p.medicine, p.notes, u.patientId, u.gender, u.address FROM prescription p INNER JOIN users u ON p.patientId = u.patientId WHERE dentistId ='$dentistId'";
                    $sqlp = "SELECT * FROM inventory";
                    $resultp = $conn->query($sqlp);
                    //Ipiprint na natin ang treatment list sa specific dentist


                
                ?>


                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 20px;">
                    <thead style="background-color: #002c42 !important; color: white; text-align: left">
                        <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Stocks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultp->num_rows > 0) { ?>
                        <?php while($rowp = $resultp->fetch_assoc()){?>
                        <tr>
                            <td><?php echo $rowp['productId']; ?></td>
                            <td><?php echo $rowp['products']; ?></td>
                            <td><?php echo $rowp['stocks']; ?></td>
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