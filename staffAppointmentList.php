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

        //Counting of Patient in users table
        // $sql=$conn->prepare("SELECT patientId FROM users");
        // $sql->execute();
        // $result=$sql->get_result();
        // $num_rows = $result->num_rows;

        //Counting of Confirmed Status in request Appointment table
        $sqls=$conn->prepare("SELECT status FROM request_appointment WHERE status='Confirmed'");
        $sqls->execute();
        $results=$sqls->get_result();
        $num_rowss = $results->num_rows;

        //Counting of Pending Status in request Appointment table
        $sqlp=$conn->prepare("SELECT status FROM request_appointment WHERE status='Pending'");
        $sqlp->execute();
        $resultp=$sqlp->get_result();
        $num_rowsp = $resultp->num_rows;

        //Counting of Treated Status in request Appointment table
        $sqlt=$conn->prepare("SELECT status FROM request_appointment WHERE status='Treated'");
        $sqlt->execute();
        $resultt=$sqlt->get_result();
        $num_rowst = $resultt->num_rows;

        //Counting of Cancelled Status in request Appointment table
        $sqlc=$conn->prepare("SELECT status FROM request_appointment WHERE status='Cancelled'");
        $sqlc->execute();
        $resultc=$sqlc->get_result();
        $num_rowsc = $resultc->num_rows;


        
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>Dental Clinic | Appointment</title>
    
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="staffAppointmentList_update.php" method="POST">
                        <div>
                            <input type="hidden" name="update_id" id="update_id">
                        </div>

                        <div class="row d-none">
                            <div class="col-12">

                            <label for="">Dentist Id <span class="text-danger">*</span></label>
                            <input type="text" name="dentist_id" id="dentist_id" readonly="true" class="form-control">
                        
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Patient First Name <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="patient_first_name" readonly="true" class="form-control">
                               
                            </div>
                            <div class="col-md-6">
                                <label for="">Patient Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" id="patient_last_name" readonly="true" class="form-control">
                            </div>
                            
                        </div>

                        <div class="mt-3 d-none" >
                            <label for="">Dentist Name <span class="text-danger">*</span></label>
                            <input type="text" name="dentist_fullname" id="dentist_fullname" readonly="true" class="form-control">
                        </div>

                        <div class="mt-3 d-none">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="text" name="patient_email" id="patient_email" readonly="true" class="form-control">
                        </div>

                        

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="">Appointment Date <span class="text-danger">*</span></label>
                                <input type="text" name="preferred_date" readonly="true" id="patient_appDate" class="form-control">
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="">Concerned <span class="text-danger">*</span></label>
                                <textarea name="patient_concerned" id="patient_concerned" cols="5" rows="5" readonly="true" class="form-control">

                                </textarea>
                                <!-- <input type="text" name="patient_concerned" readonly="true" id="patient_concerned" class="form-control"> -->
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="">Appointment Time <span>*</span></label>
                                <input type="text" name="preferred_time" readonly="true" id="patient_appTime" class="form-control">
                            </div> -->
                        </div>

                        <!-- <div class="mt-3">
                            <label for="">Service <span>*</span></label>
                            <input type="text" name="preferred_service" readonly="true" id="patient_service" class="form-control">
                        </div> -->

                        

                        <div class="mt-3">
                            <label for="">Appointment Status <span class="text-danger">*</span></label>
                            <input type="text" readonly="true" name="patient_status" id="patient_status" class="form-control">
                            
                            <label for="" class="mt-2">Select Current Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="ddselect" name="ddselect" onchange="getSelectValue();">
                                <option >Select Current Status </option>
                                <option >Confirmed</option>
                                <option >Pending</option>
                                <option >Cancelled</option>
                                <option >Treated</option>
                                <option >No Show</option>
                            </select>
                        </div>

                        

                        <div class="d-flex align-items-center mt-3">
                            <input type="checkbox" id="patient_check" name="patient_check" class="form-control mt-0" style="height: 20px; width: 20px;">
                            <span class="ml-2">Send Email</span>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-secondary" name="updateData" value="Save">
                            <!-- <button type="button" class="btn btn-secondary" name="updateData">Save</button> -->
                        </div>
                    </form>
                </div>
                
                </div>
            </div>
        </div>

        <!-- End Edit Modal -->

        <!-- Start View Modal -->
        <div class="modal fade" id="viewmodal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 850px !important; ">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Health Declaration Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="width: 100%;">
                    <div class="card-body">
                        <div class="mb-2">
                            <p class="card-text"> - Do you have a fever or temperature over 38 *C? * <input type="text" id="q1" style="font-weight: bold; border: 0px; width: 30px"></p>

                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Have you experienced shortness of breathe or had trouble breathing? * <input type="text" id="q2" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>
                        
                        <div class="mb-2">
                            <p class="card-text"> - Do you have a dry cough? * <input type="text" id="q3" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Do you have runny nose? *  <input type="text" id="q4" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Have you recently lost or had a reduction in your sense of smell? * <input type="text" id="q5" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Do you have sore throat? * <input type="text" id="q6" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Do you have Diarrhea * <input type="text" id="q7" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Do you have influenza-like symptoms? (headache, aches, and pains, a rash on skin) * <input type="text" id="q8" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Do you have history of COVID-19 infection? * <input type="text" id="q9" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Do you have a member of your family who tested positive for COVID-19? * <input type="text" id="q10" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Have you traveled or lived in an area with a report of local transmission of COVID-19? * <input type="text" id="q11" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Have you traveled within the Philippines by air, bus, or train, within the past 14 days? * <input type="text" id="q12" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>

                        <div class="mb-2">
                            <p class="card-text"> - Have you traveled outside the Philippines by air or cruise ship in the past 14 days? * <input type="text" id="q13" style="font-weight: bold; border: 0px; width: 30px"></p>
                                
                        </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

        <!-- End View Modal -->

        <div style="width: 83%">
            <div class="p-5">
                <h3 style="border-bottom: 2px solid #002c42">Appointment</h3>
                <h6 class="mt-3 mb-3">Appointment List</h6>

                <div class="row mb-3">
                    <div class="col-md-6">

                    </div>

                    <div class="col-md-6">
                        <form action="staffAppointmentList_viewSearch.php" method="get" class="d-flex justify-content-center align-items-center">
                            <!-- <input type="text" name="search" id="search" class="form-control mb-0" placeholder="Search Last Name or Status..." required> -->
                            <select name="search" id="search" class="form-control mb-0" placeholder="Search Last Name or Status..." required>
                                <option value="">Filter Status</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Pending">Pending</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Treated">Treated</option>
                                <option value="No Show">No Show</option>
                            </select>
                            <button type="submit" class="btn btn-secondary mb-0 ml-2">Filter</button>
                        </form>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col-md-3 text-white" style="background-color: #059142; border-radius: 5px;">
                                    <div class="py-3 px-0">
                                        <h3 class="ml-0 mb-0"><?php echo $num_rowss;?></h3>
                                        <h6 class="ml-0">Confirmed Appointments </h6>
                                    </div>
                                    
                                </div>

                                <div class="col-md-3 text-white" style="background-color: #F05E16; border-radius: 5px;">
                                    <div class="py-3 px-0">
                                        <h3 class="ml-0 mb-0"><?php echo $num_rowsp;?></h3>
                                        <h6 class="ml-0">Pending Request </h6>
                                    </div>
                                    
                                </div>

                                <div class="col-md-3 text-white" style="background-color: #03254c; border-radius: 5px;">
                                    <div class="py-3 px-0">
                                        <h3 class="ml-0 mb-0"><?php echo $num_rowst;?></h3>
                                        <h6 class="ml-0">Treated Patient  </h6>
                                    </div>
                                    
                                </div>

                                <div class="col-md-3 bg-danger text-white" style="border-radius: 5px;">
                                    <div class="py-3 px-0">
                                        <h3 class="ml-0 mb-0"><?php echo $num_rowsc;?></h3>
                                        <h6 class="ml-0">Cancelled Appointments </h6>
                                    </div>
                                    
                                </div>
                            </div>
                            <div id="calendar" class="mt-3"></div>
                        </div>
                    </div>
                </div>

                
                
                <?php 

                    $dentistId = $_SESSION['id'];

                    // $pos = $_SESSION['position'];

                    // $sql = "for patient";
                    // $sql = "SELECT a.reqId, u.patientId FROM request_appointment a INNER JOIN users u ON a.patientId = u.patientId";

                    // $sql = "for Dentist";
                    $sql = "SELECT a.reqId, a.date_submitted, a.appointment_date, a.concerned, a.status, a.q1, a.q2, a.q3, a.q4, a.q5, a.q6, a.q7, a.q8, a.q9, a.q10, a.q11, a.q12, a.q13, d.dentistId, d.fullname, u.patientId, u.last_name, u.first_name, u.email FROM request_appointment a INNER JOIN dentist d ON a.dentistId = d.dentistId INNER JOIN users u ON a.patientId = u.patientId WHERE a.status != 'Treated' ORDER BY reqId DESC";
                    $result = $conn->query($sql);


                
                ?>


                <table class="table table-sm table-striped table-responsive table-hover table-bordered" style="margin-bottom: 280px;">
                    <thead style="background-color: #002c42 !important; color: white; text-align: left">
                        <tr>
                        <th scope="col" class="d-none">Request Id</th>
                        <th scope="col" class="d-none">Dentist Id</th>
                        <!-- <th scope="col">Dentist Id</th>
                        <th scope="col">Patient Id</th> -->
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th class="d-none" scope="col">Email</th>
                        <th scope="col">Dentist</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Concerned</th>
                        <!-- <th scope="col">Appointment Time</th> -->
                        
                        <!-- <th scope="col">Service</th> -->
                        <th class="d-none" scope="col">Dentist Id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date Submitted</th>
                        <th scope="col">Action</th>
                        <th scope="col">Patient History</th>
                        <!-- <th scope="col">Q1</th>
                        <th scope="col">Q2</th>
                        <th scope="col">Q3</th>
                        <th scope="col">Q4</th>
                        <th scope="col">Q5</th>
                        <th scope="col">Q6</th>
                        <th scope="col">Q7</th>
                        <th scope="col">Q8</th>
                        <th scope="col">Q9</th>
                        <th scope="col">Q10</th>
                        <th scope="col">Q11</th>
                        <th scope="col">Q12</th>
                        <th scope="col">Q13</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) { ?>
                        <?php while($row = $result->fetch_assoc()){?>
                        <tr>
                            <td class="d-none"><?php echo $row['reqId']; ?></td>
                            <td class="d-none"><?php echo $row['dentistId']; ?></td> 
                            <!-- <td><?php echo $row['dentistId']; ?></td>
                            <td><?php echo $row['patientId']; ?></td> -->
                            
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td class="d-none"><?php echo $row['email']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            
                            <td><?php echo date("l, F j Y", strtotime($row['appointment_date']));?>
                            </td>
                            <td><?php echo $row['concerned']; ?></td>
                            
                            <!-- <td><?php echo $row['service_name']; ?></td> -->
                            
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['date_submitted']; ?></td>

                            <td class="d-none"><?php echo $row['q1']; ?></td>
                            <td class="d-none"><?php echo $row['q2']; ?></td>
                            <td class="d-none"><?php echo $row['q3']; ?></td>
                            <td class="d-none"><?php echo $row['q4']; ?></td>
                            <td class="d-none"><?php echo $row['q5']; ?></td>
                            <td class="d-none"><?php echo $row['q6']; ?></td>
                            <td class="d-none"><?php echo $row['q7']; ?></td>
                            <td class="d-none"><?php echo $row['q8']; ?></td>
                            <td class="d-none"><?php echo $row['q9']; ?></td>
                            <td class="d-none"><?php echo $row['q10']; ?></td>
                            <td class="d-none"><?php echo $row['q11']; ?></td>
                            <td class="d-none"><?php echo $row['q12']; ?></td>
                            <td class="d-none"><?php echo $row['q13']; ?></td>


                            <td class="d-flex">
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editModal">
                                    Edit
                                </button> -->

                                <button type="button" class="btn btn-secondary mr-2 editBtn">
                                    Edit
                                </button>

                                <button type="button" class="btn btn-primary viewBtn">
                                    View
                                </button>

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

                

                
                
                
            </div>
        </div>
    </div>

    <script>

            function getSelectValue(){
                var selectedValue = document.getElementById("ddselect").value;
                document.getElementById("patient_status").value=selectedValue;
                console.log(selectedValue);
            }

        $(document).ready(function (){

            $('.viewBtn').on('click', function(){
                console.log("Clikced")
                $('#viewmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                // $('#update_id').val(data[0]);
                // $('#patient_first_name').val(data[1]);
                // $('#patient_last_name').val(data[2]);
                // $('#patient_appDate').val(data[3]);
                // $('#patient_appTime').val(data[4]);
                // $('#patient_service').val(data[5]);
                // $('#patient_status').val(data[6]);

                
                $('#q1').val(data[10]);
                $('#q2').val(data[11]);
                $('#q3').val(data[12]);
                $('#q4').val(data[13]);
                $('#q5').val(data[14]);
                $('#q6').val(data[15]);
                $('#q7').val(data[16]);
                $('#q8').val(data[17]);
                $('#q9').val(data[18]);
                $('#q10').val(data[19]);
                $('#q11').val(data[20]);
                $('#q12').val(data[21]);
                $('#q13').val(data[22]);
            });

            

            $('.editBtn').on('click', function(){
                console.log("Clikced")
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#dentist_id').val(data[1]);
                $('#patient_first_name').val(data[2]);
                $('#patient_last_name').val(data[3]);
                $('#patient_email').val(data[4]);
                $('#dentist_fullname').val(data[5]);
                
                $('#patient_appDate').val(data[6]);
                $('#patient_concerned').val(data[7]);
                // $('#patient_appTime').val(data[7]);
                // $('#patient_service').val(data[7]);
                $('#patient_status').val(data[8]);
                
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