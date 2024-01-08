<?php 

    if(isset($_POST['viewHistoryBtn'])){
        $patientId = $_POST['patient_Id'];
    }

    else{

    }


?>

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
                <h6 class="mt-3 mb-3">Patient Medical History</h6>

                <div class="row">
                    <div class="col-md-6">
                        <form action="patient_view_medical_history_print.php" method="POST">
                            <input type="text" class="d-none" name="patientId" value="<?php echo $patientId; ?>">
                            
                            <input type="submit" value="Print" name="printBtn" class="btn btn-primary form-control mb-3" style="width: 100px;">
                        </form>
                    </div>

                    <div class="col-md-6">
                        
                    </div>
                </div>
                    
                <div class="row mb-3">

                    <div class="col-md-6">

                    </div>

                    <div class="col-md-6 d-flex justify-content-end">
                            <!-- <form action="patient_viewSearch.php" method="get" class="d-flex justify-content-center align-items-center">
                                <input type="text" name="search" id="search" class="form-control mb-0" placeholder="Search Last Name..." required>
                                <button type="submit" class="btn btn-secondary mb-0 ml-2">Search</button>
                            </form> -->
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
                                            <td><?php echo $rowt['first_name']; ?> <?php echo $rowt['last_name']; ?></td>
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
                // console.log(data.length);

                $('#patientIdTeeth').val(data[0]);

                var patientId = document.getElementById('patientIdTeeth').value;
                // console.log(patientId);
                // for(let x = 0; x < data.length; x++){
  

                //     if(data[x] == "isChecked"){
                //         console.log(data[x] == "isChecked");
                //         document.getElementsByName('inlineCheckbox1').checked = true;
                        
                //     }

                    
                // }
                
                if(data[0] == patientId){
                    // if(data[9] == "isChecked"){
                    //     document.getElementById('inlineCheckbox1').checked = true;
                    // }

                    if(data[10] == "isChecked"){
                        document.getElementById('inlineCheckbox1').checked = true;
                    }

                    if(data[11] == "isChecked"){
                            document.getElementById('inlineCheckbox2').checked = true;
                    }

                    if(data[12] == "isChecked"){
                            document.getElementById('inlineCheckbox3').checked = true;
                    }

                    if(data[13] == "isChecked"){
                            document.getElementById('inlineCheckbox4').checked = true;
                    }

                    if(data[14] == "isChecked"){
                            document.getElementById('inlineCheckbox5').checked = true;
                    }

                    if(data[15] == "isChecked"){
                            document.getElementById('inlineCheckbox6').checked = true;
                    }

                    if(data[16] == "isChecked"){
                            document.getElementById('inlineCheckbox7').checked = true;
                    }

                    if(data[17] == "isChecked"){
                            document.getElementById('inlineCheckbox8').checked = true;
                    }

                    if(data[18] == "isChecked"){
                            document.getElementById('inlineCheckbox9').checked = true;
                    }

                    if(data[19] == "isChecked"){
                            document.getElementById('inlineCheckbox10').checked = true;
                    }

                    if(data[20] == "isChecked"){
                            document.getElementById('inlineCheckbox11').checked = true;
                    }

                    if(data[21] == "isChecked"){
                            document.getElementById('inlineCheckbox12').checked = true;
                    }

                    if(data[22] == "isChecked"){
                            document.getElementById('inlineCheckbox13').checked = true;
                    }

                    if(data[23] == "isChecked"){
                            document.getElementById('inlineCheckbox14').checked = true;
                    }

                    if(data[24] == "isChecked"){
                            document.getElementById('inlineCheckbox15').checked = true;
                    }

                    if(data[25] == "isChecked"){
                            document.getElementById('inlineCheckbox16').checked = true;
                    }

                    if(data[26] == "isChecked"){
                        document.getElementById('inlineCheckbox17').checked = true;
                    }

                    if(data[27] == "isChecked"){
                            document.getElementById('inlineCheckbox18').checked = true;
                    }

                    if(data[28] == "isChecked"){
                            document.getElementById('inlineCheckbox19').checked = true;
                    }

                    if(data[29] == "isChecked"){
                            document.getElementById('inlineCheckbox20').checked = true;
                    }

                    if(data[30] == "isChecked"){
                            document.getElementById('inlineCheckbox21').checked = true;
                    }

                    if(data[31] == "isChecked"){
                            document.getElementById('inlineCheckbox22').checked = true;
                    }

                    if(data[32] == "isChecked"){
                            document.getElementById('inlineCheckbox23').checked = true;
                    }

                    if(data[33] == "isChecked"){
                            document.getElementById('inlineCheckbox24').checked = true;
                    }

                    if(data[34] == "isChecked"){
                            document.getElementById('inlineCheckbox25').checked = true;
                    }

                    if(data[35] == "isChecked"){
                            document.getElementById('inlineCheckbox26').checked = true;
                    }

                    if(data[36] == "isChecked"){
                            document.getElementById('inlineCheckbox27').checked = true;
                    }

                    if(data[37] == "isChecked"){
                            document.getElementById('inlineCheckbox28').checked = true;
                    }

                    if(data[38] == "isChecked"){
                            document.getElementById('inlineCheckbox29').checked = true;
                    }

                    if(data[39] == "isChecked"){
                            document.getElementById('inlineCheckbox30').checked = true;
                    }

                    if(data[40] == "isChecked"){
                            document.getElementById('inlineCheckbox31').checked = true;
                    }

                    if(data[41] == "isChecked"){
                            document.getElementById('inlineCheckbox32').checked = true;
                    }

                    

                    // if(data[25] == "isChecked"){
                    //         document.getElementById('inlineCheckbox16').checked = true;
                    // }

                }

                else{
                    window.location.reload(true);
                    console.log("Iba na ang patient Id")
                }

                
            });


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

                }
            });

            return true;
            });

    </script>

</body>
</html>