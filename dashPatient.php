<?php

require_once "connection.php";

    session_start();

    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    }

    if(isset($_SESSION['email']) && isset($_SESSION['position'])){

         $email = $_SESSION['email'];
         $_SESSION['position'];
        

        if($_SESSION['position'] == "Patient"){      

            // echo '<script type="text/JavaScript"> 
            // window.location = "dashPatient.php";

            // </script>';
            // header("Location: login.php");
            // exit();

            // echo "<div id='demo'>123</div>";
            // echo "Pareho";

        }

        else if($_SESSION['position'] == "Admin"){
            header("Location: dashAdmin.php");
            // exit();
            // echo "<div id='demo'>123</div>";
            // echo "Parehoooo";
        }
        // header("Location: dashPatient.php");  
    }
    // echo "Hello Patient";

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
    <!-- Bootstrap Links Start -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    
    <!-- Bootstrap Links End -->

    <!-- Animation Links Start -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->
    <!-- Animation Links End -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body style="height: 100vh;">

    <div class="" style="width: 100%">
        <?php require("templates/main-header.php"); ?>
    </div>

    <div class="d-flex" style="min-height: 92%; width: 100%">
        <div class="bg-dark __sidebar" >
            <?php require("templates/sidebar.php"); ?>
        </div>
        <div style="width: 83%;" class="py-5 pl-5 pr-3">
            <div class="row" style="height: 100%; ">
                <div class="col-3 patient-info-div" style="height: 100%; background-color: #e0e0e07c; border-radius: 10px;">
                    
                    <?php 
                        $sql = "SELECT * FROM users WHERE email='$email'";
                        $result = $conn->query($sql);
                    ?>

                    <?php if ($result->num_rows > 0) { ?>
                        <?php while($row = $result->fetch_assoc()){?>
                        <div class="">
                            <h5 class="mt-3 py-2 px-0 text-left" style="border-bottom: 1px solid black">Patient Info</h5>
                            <div class="text-center mt-5">
                                <h4><?php echo $row['first_name'];?> <?php echo $row['last_name'];?> </h4>
                                <h6 class="font-weight-light"><?php echo $row['email'];?></h6>
                                <hr>
                            </div>

                            <div class="mt-5" style="width: 100%; border-bottom: 1px solid gray;">
                                <div class="row" >
                                    <div class="col-md-5">
                                    <p class="p-1"><span class="text-left font-weight-bold">Gender:</span></p>
                                    </div>
                                    <div class="col-md-7">
                                    <p class="p-1"><span class="text-right font-weight-light"><?php echo $row['gender'];?></span></p>
                                    </div>
                                </div>
                                

                                <div class="row">
                                    <div class="col-md-5">
                                    <p class="p-1"><span class="text-left font-weight-bold">Birthdate:</span></p>
                                    </div>
                                    <div class="col-md-7">
                                    <p class="p-1"><span class="text-right font-weight-light"><?php echo $row['birth_date'];?></span></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                    <p class="p-1"><span class="text-left font-weight-bold">Phone:</span></p>
                                    </div>
                                    <div class="col-md-7">
                                    <p class="p-1"><span class="text-right font-weight-light">+63 <?php echo $row['phone_no'];?></span></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                    <p class="p-1"><span class="text-left font-weight-bold">Address:</span></p>
                                    </div>
                                    <div class="col-md-7">
                                    <p class="p-1"><span class="text-right font-weight-light"><?php echo $row['address'];?></span></p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <?php }?>
                    <?php } ?>
                </div>

                <div class="col-sm-8 ml-4 p-3" style="width: 100%; background-color: #e0e0e07c; ">
                    <!-- <a href="" class="btn btn-outline-primary">Request an Appointment</a> -->
                        <!-- List group -->
                    <div class="list-group d-flex" style="min-width: 100%; flex-direction: row;" id="myList" role="tablist">
                        
                        <a class="list-group-item list-group-item-action active" style="border: 0px !important;" data-toggle="list" href="#home" >Request</a>
                        <a class="list-group-item list-group-item-action " style="border: 0px !important;" data-toggle="list" href="#profile" >Appointment</a>
                        <a class="list-group-item list-group-item-action " style="border: 0px !important;" data-toggle="list" href="#messages" >Treatment</a>
                        <a class="list-group-item list-group-item-action " style="border: 0px !important;" data-toggle="list" href="#settings" >Prescription</a>
                        
                    
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    
                    <!-- For Request Div -->
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <a href="patient_onlinerequest.php" class="btn btn-success mt-3">Request an Appointment</a>
                        <h5 class="font-weight-light mt-3">Your Request Appointment Details</h5>

                        <?php 
                        
                            $patientId = $_SESSION['id'];

                            // $sql = "SELECT a.appointment_date, a.appointment_time, a.status, d.fullname FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId INNER JOIN services s ON a.serviceId = s.serviceId WHERE u.patientId = '$patientId'";
                            $sql = "SELECT a.appointment_date, a.status, a.concerned, d.fullname FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId WHERE u.patientId = '$patientId' AND a.status ='Pending'";
                            $result = $conn->query($sql);
                        ?>

                        <table class="table table-striped table-bordered table-responsive">
                            <thead style="background-color: #002c42 !important; color: white; text-align: left">
                                <tr>
                                    <th>Appointment Date</th>
                                    <!-- <th>Appointment Time</th> -->
                                    <th>Dentist</th>
                                    <th>Concerned</th>
                                    <th>Appointment Status</th>
                                </tr>
                                
                            </thead>

                            <!-- <?php ?> -->

                            <tbody>
                                <?php if ($result->num_rows > 0) { ?>
                                    <?php while($row = $result->fetch_assoc()){?>
                                    <tr>
                                        
                                        
                                        <td>
                                
                                                <?php echo date("l, F j Y", strtotime($row['appointment_date']));?>
                                            </td>
                                        
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['concerned']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                            
                                    </tr>
                                    <?php }?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                     <!-- For Appointment Div -->
                    <div class="tab-pane" id="profile" role="tabpanel">

                        <?php 
                            
                            $patientId = $_SESSION['id'];

                            // $sql = "SELECT a.appointment_date, a.appointment_time, a.status, d.fullname FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId INNER JOIN services s ON a.serviceId = s.serviceId WHERE u.patientId = '$patientId'";
                            $sql = "SELECT a.appointment_date, a.status, a.concerned, d.fullname FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId WHERE u.patientId = '$patientId' AND a.status='Confirmed'";
                            $result = $conn->query($sql);
                        ?>

                        <table class="table table-striped table-responsive mt-2">
                            <thead style="background-color: #002c42 !important; color: white; text-align: left">
                                <th>Appointment Date</th>
                                <!-- <th>Appointment Time</th> -->
                                <th>Dentist</th>
                                <th>Concerned</th>
                                <th>Appointment Status</th>
                            </thead>

                            <?php ?>

                            <tbody>
                                <?php if ($result->num_rows > 0) { ?>
                                    <?php while($row = $result->fetch_assoc()){?>
                                        <tr>
                                            <td>
                                
                                                <?php echo date("l, F j Y", strtotime($row['appointment_date']));?>
                                            </td>
                                            <td><?php echo $row['fullname'];?></td>
                                            <td><?php echo $row['concerned'];?></td>
                                            <td><?php echo $row['status'];?></td>
                                        </tr>
                                    <?php }?>
                                <?php } ?>
                                
                                    
                            </tbody>
                        </table>

                    </div>

                     <!-- For Treatment Div -->
                    <div class="tab-pane" id="messages" role="tabpanel">

                        <?php 
                            
                            $patientId = $_SESSION['id'];

                            // $sql = "SELECT a.appointment_date, a.appointment_time, a.status, d.fullname FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId INNER JOIN services s ON a.serviceId = s.serviceId WHERE u.patientId = '$patientId'";
                            // $sql = "SELECT a.appointment_date, a.appointment_time, a.status, d.fullname FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId WHERE u.patientId = '$patientId' AND a.status='Confirmed'";
                            $sqlt = "SELECT t.treatmentId, t.patientId, t.dentistId, t.serviceId, t.date_visit, t.service_name, t.teethNo, t.description, t.fees, t.totalFees, t.totalChange, t.remarks, t.dateTreatment_submitted, u.teeth1, u.teeth2, u.teeth3, u.teeth4, u.teeth5, u.teeth6, u.teeth7, u.teeth8, u.teeth9, u.teeth10, u.teeth11, u.teeth12, u.teeth13, u.teeth14, u.teeth15, u.teeth16, u.teeth17, u.teeth18, u.teeth19, u.teeth20, u.teeth21, u.teeth22, u.teeth23, u.teeth24, u.teeth25, u.teeth26, u.teeth27, u.teeth28, u.teeth29, u.teeth30, u.teeth31, u.teeth32, d.fullname FROM treatment t INNER JOIN dentist d ON t.dentistId = d.dentistId INNER JOIN users u ON t.patientId = u.patientId WHERE u.patientId = '$patientId'";
                            $resultt = $conn->query($sqlt);

                            //Tapos na tayo sa Treatment Page
                        ?>

                        <table class="table table-responsive table-striped table-bordered mt-2">
                            <thead style="background-color: #002c42 !important; color: white; text-align: left">
                                <!-- <th>Patient Id</th> -->
                                <th>Date Visit</th>
                                <th>Dentist</th>
                                <th>Teeth No</th>
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
                                            <td class="d-none"><?php echo $rowt['patientId']; ?></td>
                                        <td>
                                
                                <?php echo date("l, F j Y", strtotime($rowt['date_visit']));?>
                            </td>

                            <td class=""><?php echo $rowt['fullname']; ?></td>
                                            
                                            
                                            <td>

                                            
                                                <button type="button" class="btn btn-primary teethBtn">
                                                    View Teeth
                                                </button>

                                                <!-- Modal -->
                                <div class="modal fade" id="teethModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="max-width: 700px !important; margin: 1.25rem auto !important;" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Teeth</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <!-- <form action="" method="POST" id="teeth-form"> -->
                                        <form action="" method="POST" id="updateTooth-form">
                                            <h5 class="d-none">Patient Id </h5>
                                            <input type="text" class="d-none" value="<?php echo $rowt['patientId']?>" id="patientIdTeeth" name="patientIdTeeth">
                                            <!-- <h5 class="">Teeth No. <?php echo $rowp['teethNo']; ?></h5> -->
                                            <div class="row mb-3 px-3">
                                                
                                                <div class="col-md-12 mt-2" style="height: 500px">
                                                    
                                                    <div class="img-fluid mb-0 mr-0" style="">
                                                        <div class="row " style="width: 100%;">
                                                            <div class="col-md-6">
                                                                <h6>Upper Right</h6>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <h6 class="text-right">Upper Left</h6>
                                                            </div>
                                                        </div>
                                                        <img src="img/32Teeth.png" style="width: 60%; height: 300px; margin: 0 auto; display:flex;" alt="">
                                                        <div class="row mt-3 mr-0" style="width: 100%;">
                                                            <div class="col-md-6">
                                                                <h6>Lower Right</h6>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <h6 class="text-right">Lower Left</h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    

                                                    <label for="" class="mt-4 mb-0">Tooth Presentation</label>

                                                    <table class="mr-0" style="width: 100%;">
                                                        <thead style="width: 100%; background-color: #023047; color: white">
                                                            <tr style="width: 100%;">
                                                                <th style="padding: 10px !important;">1</th>
                                                                <th style="padding: 10px !important;">2</th>
                                                                <th style="padding: 10px !important;">3</th>
                                                                <th style="padding: 10px !important;">4</th>
                                                                <th style="padding: 10px !important;">5</th>
                                                                <th style="padding: 10px !important;">6</th>
                                                                <th style="padding: 10px !important;">7</th>
                                                                <th style="padding: 10px !important;">8</th>
                                                                <th style="padding: 10px !important;">9</th>
                                                                <th style="padding: 10px !important;">10</th>
                                                                <th style="padding: 10px !important;">11</th>
                                                                <th style="padding: 10px !important;">12</th>
                                                                <th style="padding: 10px !important;">13</th>
                                                                <th style="padding: 10px !important;">14</th>
                                                                <th style="padding: 10px !important;">15</th>
                                                                <th style="padding: 10px !important;">16</th>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody style="width: 100%;">
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox1" id="inlineCheckbox1" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox2"  id="inlineCheckbox2" value="isChecked" disabled="true">
                                                                </td>   
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox3" id="inlineCheckbox3" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox4" id="inlineCheckbox4" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox5" id="inlineCheckbox5" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox6" id="inlineCheckbox6" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox7" id="inlineCheckbox7" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox8" id="inlineCheckbox8" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox9" id="inlineCheckbox9" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox10" id="inlineCheckbox10" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox11" id="inlineCheckbox11" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox12" id="inlineCheckbox12" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox13" id="inlineCheckbox13" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox14" id="inlineCheckbox14" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox15" id="inlineCheckbox15" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox16" id="inlineCheckbox16" value="isChecked" disabled="true">
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>

                                                    <table class="mr-0 mt-2 mb-5" style="width: 100%;">
                                                        <thead style="width: 100%; background-color: #023047; color: white">
                                                            <tr style="width: 100%; ">
                                                                <th style="padding: 10px !important;">32</th>
                                                                <th style="padding: 10px !important;">31</th>
                                                                <th style="padding: 10px !important;">30</th>
                                                                <th style="padding: 10px !important;">29</th>
                                                                <th style="padding: 10px !important;">28</th>
                                                                <th style="padding: 10px !important;">27</th>
                                                                <th style="padding: 10px !important;">26</th>
                                                                <th style="padding: 10px !important;">25</th>
                                                                <th style="padding: 10px !important;">24</th>
                                                                <th style="padding: 10px !important;">23</th>
                                                                <th style="padding: 10px !important;">22</th>
                                                                <th style="padding: 10px !important;">21</th>
                                                                <th style="padding: 10px !important;">20</th>
                                                                <th style="padding: 10px !important;">19</th>
                                                                <th style="padding: 10px !important;">18</th>
                                                                <th style="padding: 10px !important;">17</th>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody >
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox32" id="inlineCheckbox32" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox31" id="inlineCheckbox31" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox30" id="inlineCheckbox30" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox29" id="inlineCheckbox29" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox28" id="inlineCheckbox28" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox27" id="inlineCheckbox27" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox26" id="inlineCheckbox26" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox25" id="inlineCheckbox25" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox24" id="inlineCheckbox24" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox23" id="inlineCheckbox23" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox22" id="inlineCheckbox22" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-contro inlineCheckbox1l" type="checkbox" name="inlineCheckbox21" id="inlineCheckbox21" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox20" id="inlineCheckbox20" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox19" id="inlineCheckbox19" value="isChecked" disabled="true">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox18" id="inlineCheckbox18" value="isChecked" disabled="true">
                                                                </td>

                                                                <td>
                                                                    <input class="form-control inlineCheckbox1" type="checkbox" name="inlineCheckbox17" id="inlineCheckbox17" value="isChecked" disabled="true">
                                                                </td>
                                                            </tr>
                                                            <!-- iaupdate na natin yung teeth ni patient -->
                                                        </tbody>
                                                    </table>

                                                </div>

                                                <!-- <div class="form-check d-none">
                                                    <p>All Treat</p>
                                                    <input type="text"  id="invisibleTooth" name="invisibleTooth" value="">
                                                    
                                                </div> -->
                                                </div>

                                                
                                                
                                                                    
                                            </div>

                                            <div class="modal-footer my-5 pt-5">

                                            </div>

                                            <!-- <div class="modal-footer my-5 pt-5">
                                        
                                                <input type="submit" class="btn btn-primary" id="updateTeeth" name="updateTeeth" value="Update Teeth">
                                            </div> -->
                                            
                                        </form>
                                    </div>
                                    
                                    </div>
                                </div>
                                </div>
                                            </td>
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

                    </div>

                    <!-- For Prescription Div -->
                    <div class="tab-pane" id="settings" role="tabpanel">
                    <?php 
                            
                            $patientId = $_SESSION['id'];

                            // $sql = "SELECT a.appointment_date, a.appointment_time, a.status, d.fullname FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId INNER JOIN services s ON a.serviceId = s.serviceId WHERE u.patientId = '$patientId'";
                            $sqlt = "SELECT * FROM prescription WHERE patientId = '$patientId'";
                            $resultt = $conn->query($sqlt);

                            //Tapos na tayo sa Treatment Page
                        ?>

                        <table class="table table-striped table-bordered mt-2 table-responsive" style="width: 100% !important;">
                            <thead style="background-color: #002c42 !important; color: white; text-align: left;">
                                <th>Dentist Name</th>
                                <th>Date Prescribed</th>
                                <th>Medicine</th>
                                <th>Notes</th>
                                
                            </thead>

                            <?php ?>

                            <tbody>
                                <?php if ($resultt->num_rows > 0) { ?>
                                    <?php while($rowt = $resultt->fetch_assoc()){?>
                                        <tr>
                                            <td><?php echo $rowt['dentistName']; ?></td>
                                            
                                            <td>
                                
                                <?php echo date("l, F j Y", strtotime($rowt['dateToday']));?>
                            </td>
                                            <td><?php echo $rowt['medicine']; ?></td>
                                            <td><?php echo $rowt['notes']; ?></td>
                                            
                                        </tr>
                                    <?php }?>
                                <?php } ?>
                                
                                    
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function (){
            
            $('.teethBtn').on('click', function(){
                
                console.log("Clikced")
                $('#teethModal').modal('show');
                

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                

                document.getElementById('inlineCheckbox1').checked = false;
                document.getElementById('inlineCheckbox2').checked = false;
                document.getElementById('inlineCheckbox3').checked = false;
                document.getElementById('inlineCheckbox4').checked = false;
                document.getElementById('inlineCheckbox5').checked = false;
                document.getElementById('inlineCheckbox6').checked = false;
                document.getElementById('inlineCheckbox7').checked = false;
                document.getElementById('inlineCheckbox8').checked = false;
                document.getElementById('inlineCheckbox9').checked = false;
                document.getElementById('inlineCheckbox10').checked = false;
                document.getElementById('inlineCheckbox11').checked = false;
                document.getElementById('inlineCheckbox12').checked = false;
                document.getElementById('inlineCheckbox13').checked = false;
                document.getElementById('inlineCheckbox14').checked = false;
                document.getElementById('inlineCheckbox15').checked = false;
                document.getElementById('inlineCheckbox16').checked = false;
                document.getElementById('inlineCheckbox17').checked = false;
                document.getElementById('inlineCheckbox18').checked = false;
                document.getElementById('inlineCheckbox19').checked = false;
                document.getElementById('inlineCheckbox20').checked = false;
                document.getElementById('inlineCheckbox21').checked = false;
                document.getElementById('inlineCheckbox22').checked = false;
                document.getElementById('inlineCheckbox23').checked = false;
                document.getElementById('inlineCheckbox24').checked = false;
                document.getElementById('inlineCheckbox25').checked = false;
                document.getElementById('inlineCheckbox26').checked = false;
                document.getElementById('inlineCheckbox27').checked = false;
                document.getElementById('inlineCheckbox28').checked = false;
                document.getElementById('inlineCheckbox29').checked = false;
                document.getElementById('inlineCheckbox30').checked = false;
                document.getElementById('inlineCheckbox31').checked = false;
                document.getElementById('inlineCheckbox32').checked = false;

                

                console.log(data);
                // // console.log(data.length);

                // $('#patientIdTeeth').val(data[0]);

                var patientId = document.getElementById('patientIdTeeth').value;

                // console.log(patientId);

                // console.log(data[0]);

                // console.log(data[6]);
                
                if(data[0] == patientId){
                    if(data[7] == "isChecked"){
                        document.getElementById('inlineCheckbox1').checked = true;
                    }

                    if(data[8] == "isChecked"){
                        document.getElementById('inlineCheckbox2').checked = true;
                    }

                    if(data[9] == "isChecked"){
                            document.getElementById('inlineCheckbox3').checked = true;
                    }

                    if(data[10] == "isChecked"){
                            document.getElementById('inlineCheckbox4').checked = true;
                    }

                    if(data[11] == "isChecked"){
                            document.getElementById('inlineCheckbox5').checked = true;
                    }

                    if(data[12] == "isChecked"){
                            document.getElementById('inlineCheckbox6').checked = true;
                    }

                    if(data[13] == "isChecked"){
                            document.getElementById('inlineCheckbox7').checked = true;
                    }

                    if(data[14] == "isChecked"){
                            document.getElementById('inlineCheckbox8').checked = true;
                    }

                    if(data[15] == "isChecked"){
                            document.getElementById('inlineCheckbox9').checked = true;
                    }

                    if(data[16] == "isChecked"){
                            document.getElementById('inlineCheckbox10').checked = true;
                    }

                    if(data[17] == "isChecked"){
                            document.getElementById('inlineCheckbox11').checked = true;
                    }

                    if(data[18] == "isChecked"){
                            document.getElementById('inlineCheckbox12').checked = true;
                    }

                    if(data[19] == "isChecked"){
                            document.getElementById('inlineCheckbox13').checked = true;
                    }

                    if(data[20] == "isChecked"){
                            document.getElementById('inlineCheckbox14').checked = true;
                    }

                    if(data[21] == "isChecked"){
                            document.getElementById('inlineCheckbox15').checked = true;
                    }

                    if(data[22] == "isChecked"){
                            document.getElementById('inlineCheckbox16').checked = true;
                    }

                    if(data[23] == "isChecked"){
                            document.getElementById('inlineCheckbox17').checked = true;
                    }

                    if(data[24] == "isChecked"){
                        document.getElementById('inlineCheckbox18').checked = true;
                    }

                    if(data[25] == "isChecked"){
                            document.getElementById('inlineCheckbox19').checked = true;
                    }

                    if(data[26] == "isChecked"){
                            document.getElementById('inlineCheckbox20').checked = true;
                    }

                    if(data[27] == "isChecked"){
                            document.getElementById('inlineCheckbox21').checked = true;
                    }

                    if(data[28] == "isChecked"){
                            document.getElementById('inlineCheckbox22').checked = true;
                    }

                    if(data[29] == "isChecked"){
                            document.getElementById('inlineCheckbox23').checked = true;
                    }

                    if(data[30] == "isChecked"){
                            document.getElementById('inlineCheckbox24').checked = true;
                    }

                    if(data[31] == "isChecked"){
                            document.getElementById('inlineCheckbox25').checked = true;
                    }

                    if(data[32] == "isChecked"){
                            document.getElementById('inlineCheckbox26').checked = true;
                    }

                    if(data[33] == "isChecked"){
                            document.getElementById('inlineCheckbox27').checked = true;
                    }

                    if(data[34] == "isChecked"){
                            document.getElementById('inlineCheckbox28').checked = true;
                    }

                    if(data[35] == "isChecked"){
                            document.getElementById('inlineCheckbox29').checked = true;
                    }

                    if(data[36] == "isChecked"){
                            document.getElementById('inlineCheckbox30').checked = true;
                    }

                    if(data[37] == "isChecked"){
                            document.getElementById('inlineCheckbox31').checked = true;
                    }

                    if(data[38] == "isChecked"){
                            document.getElementById('inlineCheckbox32').checked = true;
                    }

                    if(data[39] == "isChecked"){
                            document.getElementById('inlineCheckbox33').checked = true;
                    }

                    

                    

                }

                else{
                    window.location.reload(true);
                    console.log("Iba na ang patient Id")
                }

                

                // console.log(data[10]);
                // console.log(data[11]);
                // console.log(data[12]);
                // console.log(data[13]);
                // console.log(data[14]);
                // console.log(data[15]);
                // console.log(data[16]);
                // console.log(data[17]);
                // console.log(data[18]);
                // console.log(data[19]);
                // console.log(data[20]);
                // console.log(data[21]);
                // console.log(data[22]);
                // console.log(data[23]);
                // console.log(data[24]);
                // console.log(data[25]);
                // console.log(data[26]);
                // console.log(data[27]);
                // console.log(data[28]);
                // console.log(data[29]);
                // console.log(data[30]);
                // console.log(data[31]);
                // console.log(data[32]);
                // console.log(data[33]);
                // console.log(data[34]);
                // console.log(data[35]);
                // console.log(data[36]);
                // console.log(data[37]);
                // console.log(data[38]);
                // console.log(data[39]);
                // console.log(data[40]);
                

                

                // document.querySelectorAll("inlineCheckbox1").checked = true;
                // document.getElementById("inlineCheckbox1").checked = true;
                

                

                

                
                // $('#inlineCheckbox1').checked = true;
                // document.getElementById("inlineCheckbox1").checked = true;
                
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