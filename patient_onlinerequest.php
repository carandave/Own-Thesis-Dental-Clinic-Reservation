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
            //    header("Location: dashPatient.php");

            
           }
        }


        
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>Dental Clinic | Patient Online Request</title>
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
<body style="height: 100vh; color: #002c42;">


    <div class="" style="width: 100%">
        <?php require("templates/main-header.php"); ?>
    </div>

    <div class="d-flex" >
        <div class="bg-dark __sidebar" >
            <?php require("templates/sidebar.php"); ?>
        </div>
        <div class="whole" >
            <div class="p-5" style="background-color: #e0e0e07c; ">
                <div style="background-color: #fff; " class="p-5">
                <h3 class="" >Set an Appointment</h3>
                
                <div class="callout p-3" style="border-radius: 4px; border-left: 4px solid #a70000; border-bottom: 1px solid #6e6e6e81; border-right: 1px solid #6e6e6e81;">
                    <h5 class="mb-0">Please be advised that this is not yet confirmed appointment.</h5>
                    <h5>Our Clinic will email or call you to send your schedule.</h5>
                </div>

                <div class="mt-3">
                    <p>
                        Due to COVID-19 pandemic we are strictly by appointment only until further notice. Please do not schedule an appointment if you have signs or symptoms of COVID-19.
                        Wearing a face mask is a must to ensure the safety of Doctors and Patients. We will confirm your appointment via email or call 2 to 3 days before your appointment date.
                    </p>
                    <p> 
                        This questionnaire is designed with your safety in mind and must be answered honestly. Your answers will be reviewed prior to your appointment and a member of our team 
                        will contact you if we recommend rescheduling to a later date. An answer of YES does not exlude you from treatment. Please answer YES or No to each of the following questions.
                        Thank You for your consideration and understanding. 
                    </p>
                </div>

                <form action="" method="POST" id="appoint-form">
                    <div>
                        <div class="row">
                            <div class="col-md-6">

                                    <?php

                                        $patientEmail = $_SESSION['email'];

                                        $sql = "SELECT * FROM users WHERE email='$patientEmail'";
                                        $result = $conn->query($sql);    
                                    ?>

                                    <?php if ($result->num_rows > 0) { ?>
                                        <?php while($row = $result->fetch_assoc()){?>
                                            <input type="text" class="d-none" name="patient_id" value="<?php echo $row['patientId'];?>">
                                            <input type="text" class="d-none" name="firstName" value="<?php echo $row['first_name'];?>">
                                            <input type="text" class="d-none" name="lastName" value="<?php echo $row['last_name'];?>">
                                        <?php }?>
                                    <?php } ?>

                                <?php
                                    $sql = "SELECT * FROM dentist WHERE position='Dentist'";
                                    $result = $conn->query($sql);    
                                ?>

                                <label for="" class="font-weight-bold">Preffered Dentist <span class="text-danger">*</span></label>

                                <!-- <select class="form-control select2" name="dentist_name" style="width: 100%" id="patients" required> -->
                                <select class="form-control select2" name="dentist_name" style="width: 100%" id="doctorId" required>
                                    <option value="">Select Doctor</option>
                                    

                                    <?php if ($result->num_rows > 0) { ?>
                                        <?php while($row = $result->fetch_assoc()){?>
                                            <option value="<?php echo $row['dentistId'];?>"><?php echo $row['fullname'];?></option>           
                                        <?php }?>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="d-none">
                                <input type="text" class="form-control" id="doctorEmail" name="doctorEmail">
                            </div>

                            <div class="d-none">
                                <input type="text" class="form-control" id="doctorName" name="doctorName">
                            </div>

                            <div class="col-md-6">
                                <label for="" class="font-weight-bold">Appointment Date <span class="text-danger">*</span></label>
                                <input type="date" name="appoint_date" class="form-control" required>
                            </div>

                            <!-- <div class="col-md-4">
                                <label for="" class="font-weight-bold">Appointment Time <span class="text-danger">*</span></label>
                                <select name="appoint_time" id="" class="form-control" required>
                                    <option value=""></option>
                                    <option value="8:00 AM - 9:00 AM">8:00 AM - 9:00 AM</option>
                                    <option value="9:00 AM - 10:00 AM">9:00 AM - 10:00 AM</option>
                                    <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                    <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                    <option value="1:00 PM - 2:00 PM">1:00 PM - 2:00 PM</option>
                                    <option value="2:00 PM - 3:00 PM">2:00 PM - 3:00 PM</option>
                                    <option value="3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
                                    <option value="4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
                                </select>
                            </div> -->

                        </div>

                        <div class="mt-3">
                            <label for="" class="font-weight-bold">Your Concerned <span class="text-danger">*</span></label>
                            <textarea name="concerned" id="concerned" cols="5" rows="3" class="form-control" required>

                            </textarea>
                        </div>

                        <!-- <div class="mt-3">
                            <label for="" class="font-weight-bold">Service <span class="text-danger">*</span></label>
                            <select name="service_name" id="" class="form-control" required>
                                <option value="">Select Service</option>
                                <?php
                                    $sql = "SELECT * FROM services";
                                    $result = $conn->query($sql);    
                                ?>

                                <?php if ($result->num_rows > 0) { ?>
                                    <?php while($row = $result->fetch_assoc()){?>
                                        <option value="<?php echo $row['serviceId'];?>"><?php echo $row['service_name'];?></option>           
                                    <?php }?>
                                <?php } ?>
                            </select>
                        </div> -->
                    </div>

                    <!-- <div class="card bg-light my-3" style="max-width: 100%;">
                        <div class="card-header">Health Declaration</div>

                        <div class="card-body">
                            <div>
                                <p class="card-text">Do you have a fever or temperature over 38 *C? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question1" id="question1" value="Yes" >
                                        <label class="form-check-label" for="question1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question1" id="question2" value="No">
                                        <label class="form-check-label" for="question2">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Have you experienced shortness of breathe or had trouble breathing? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question2" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question2" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>
                            
                            <div>
                                <p class="card-text">Do you have a dry cough? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question3" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question3" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have runny nose? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question4" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question4" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Have you recently lost or had a reduction in your sense of smell? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question5" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question5" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have sore throat? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question6" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question6" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have Diarrhea <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question7" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question7" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have influenza-like symptoms? (headache, aches, and pains, a rash on skin) <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question8" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question8" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have history of COVID-19 infection? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question9" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question9" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have a member of your family who tested positive for COVID-19? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question10" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question10" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Have you traveled or lived in an area with a report of local transmission of COVID-19? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question11" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question11" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Have you traveled within the Philippines by air, bus, or train, within the past 14 days? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question12" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question12" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Have you traveled outside the Philippines by air or cruise ship in the past 14 days? <span class="text-danger">*</span></p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question13" id="exampleRadios1" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question13" id="exampleRadios1" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>
                            

                        </div>
                    </div> -->

                    <input type="submit" id="appoint-btn" class="btn btn-primary mt-3" value="Submit">
                </form>
                
                
                
                
                

                </div>
            </div>
        </div>
    </div>

    

    

    <script type="text/javascript">

    var sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
        // console.log("");

        // setTimeout(function() {
        //     swal.fire({
        //         icon: 'success',
        //         html: '<h5>Success!</h5>'
        //     });
        // }, 500);

        $(document).ready(function() { // Kelangan mag load muna lahat bago nya irun ang nasa loob ng function na'to

            // Viewing of Doctor Email
            $('#loading_wrap').remove();
            $("#doctorId").change(function(){
                var id = $(this).find(":selected").val();
                var dataString = 'empid=' + id;
                console.log(id);
                $.ajax({
                    url: 'dentistGet.php',
                    dataType: "json",
                    data: dataString,
                    cache: false,
                    success: function(empData){

                        $("#doctorEmail").val(empData.email);
                        $("#doctorName").val(empData.fullname);

                    }
                })
            });


            $("#appoint-btn").click(function(e){ // Kapag na-iclick ang register button gagawin nya yung mga nasa loob ng function
                
                    e.preventDefault(); // para hindi mag reload ang page
                    // Swal.showLoading()
                    $.ajax({ // Makikipag communicate tayo sa server side 
                        url: 'processAppoint.php', // Dito sya mapupunta kapag nag success
                        method: 'POST', // Para hindi makita sa URL and naiinput ni user
                        data: $("#appoint-form").serialize() + "&action=Appoint", // Eto ang mga input data galing sa form naibabato natin sa server
                        beforeSend: function() {
                            swal.fire({
                                html: '<h5>Please wait for a second.</h5>',
                                showConfirmButton: false,
                                onRender: function() {
                                    // there will only ever be one sweet alert open.
                                    $('.swal2-content').prepend(sweet_loader);
                                }
                            });
                        },
                        success: function(response){ // Eto ang response na galing sa server papunta sa Client server

                            // if(response === "   SameAppointment"){
                               if(response === "empty"){
                                // console.log("The Appointment Date and Time is already appointed. Please Try Another!");
                                // alert("The Appointment Date and Time is already appointed. Please Try Another!");

                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: 'Make sure all inputs are not Empty. Please try again!',
                                        showConfirmButton: false,
                                        timer: 3000 
                                    }).then(function(){
                                        // window.location = "patient_onlinerequest.php";
                                    })
                                }

                                if(response === "UniqueAppointment"){
                                    console.log("The Appointment is Successfully Created!");
                                    // alert("The Appointment is Successfully Created!");

                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'The Appointment is Successfully Created!',
                                        showConfirmButton: false,
                                        timer: 2000  
                                    }).then(function(){
                                        window.location = "dashPatient.php";
                                    })
                                    // window.location.href = "dashStaff.php";
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