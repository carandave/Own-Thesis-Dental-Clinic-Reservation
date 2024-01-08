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
    <title>Dental Clinic | Sales Reports</title>
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
                <h3 style="border-bottom: 2px solid #002c42">Revenue Reports</h3>
                <h6 class="mt-3 mb-3">Revenue List</h6>

                <form action="adminSalesReports_print.php" method="POST">
                    <input type="text" class="d-none" name="namePrint" value="<?php echo $rowp['patientName']; ?>">
                    <input type="text" class="d-none" name="datePrint" value="<?php echo date("l, F j Y", strtotime($rowp['dateToday']));?>">
                    <input type="text" class="d-none" name="dentistnamePrint" value="<?php echo $rowp['dentistName']; ?>">
                    <input type="text" class="d-none" name="medicinePrint" value="<?php echo $rowp['medicine']; ?>">
                    
                    <input type="submit" value="Print" name="printBtn" class="btn btn-primary form-control mb-3" style="width: 100px;">
                </form>

                <!-- <form action="adminTreatmentReports_filter.php" method="get"> -->
                <form action="adminSalesReports_filter.php" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">From Date Treatment</label>
                                <input type="date" name="from_date" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="font-weight-bold">To Date Treatment</label>
                                <input type="date" name="to_date" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div>
                                    <label for="" class="font-weight-bold">Filter</label>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>

                <?php 

                    // $pos = $_SESSION['position'];
                    $dentistId = $_SESSION['id'];

                    
                    // $sqlp = "SELECT p.treatmentId, p.dentistId, p.date_visit, p.service_name, p.teethNo, p.description, p.fees, p.totalFees, p.totalChange, p.remarks, p.dateTreatment_submitted, u.patientId, u.last_name, u.first_name FROM treatment p INNER JOIN users u ON p.patientId = u.patientId ORDER BY p.dateTreatment_submitted DESC";


                    $sqlp = "SELECT *, SUM(totalFees) AS sum FROM treatment GROUP BY dateTreatment_submitted ORDER BY dateTreatment_submitted DESC";
                    $resultp = $conn->query($sqlp);
                    


                
                ?>


                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 50px;">
                    <thead style="background-color: #002c42 !important; color: white; text-align: left">
                        <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Revenue</th>
                        <!-- <th scope="col">To Date</th>
                        <th scope="col">Revenue</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php if($resultp->num_rows > 0){?>
                        <?php while($row = $resultp->fetch_assoc()){?>
                            <tr>
                                <td><?php echo date("F j, Y", strtotime($row['dateTreatment_submitted']));?></td>
                                <td><?php echo $row['sum'];?></td>
                            </tr>
                            
                            <!-- <tr><?php echo $row[''];?></tr> -->
                        <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>

                
                
                
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function (){

            
        });

    </script>
    

    
        
    

    





    
    
</body>
</html>