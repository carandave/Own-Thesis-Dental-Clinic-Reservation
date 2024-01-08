<?php
        // session_start();

		require_once "connection.php";

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

		   else if($_SESSION['position'] == "Staff"){       
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
        $sql=$conn->prepare("SELECT patientId FROM users");
        $sql->execute();
        $result=$sql->get_result();
        $num_rows = $result->num_rows;

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

        
        
?> 
<!DOCTYPE html>
<html>
<head>
<title>Dental Clinic | Dashboard</title>

<!-- CSS for full calender -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
<!-- JS for jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- JS for full calender -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<!-- bootstrap css and js -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Sweetalert Cdn Start -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Sweetalert Cdn End -->
    

</head>

<style>
	.fc-title{
		color: white;
		text-transform: uppercase;
	}

	.fc-content{
		padding: 3px;
	}


</style>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
            <div class="row">
                <div class="col-md-3 bg-primary text-white" style="border-radius: 5px;">
                    <div class="py-3 px-0">
                        <h3 class="ml-0 mb-0"><?php echo $num_rows;?></h3>
                        <h6 class="ml-0">Patients </h6>
                    </div>
                    
                </div>

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

            </div>

            <div class="row">
                <div class="col-md-3">

                </div>

                <div class="col-md-3">

                </div>

                <div class="col-md-3">

                </div>

                <?php 
                    date_default_timezone_set('Asia/Manila');
                    $dateToday = date("Y-m-d");
                
                    $sqlf = "SELECT SUM(totalFees) AS sum FROM treatment WHERE dateTreatment_submitted='$dateToday'";
                    $sqlf_result = mysqli_query($conn, $sqlf);

                ?>

                <?php while($rowf = mysqli_fetch_assoc($sqlf_result)){?>
                <div class="col-md-3 bg-dark d-flex justify-content-center align-items-center mt-2" style="border-radius: 5px;">
                    <h6 class="text-white mb-0 p-2">Revenue Today: <label for="" style="" class="mb-0"><?php echo $rowf['sum'];?></label></h6>
                </div>
                <?php } ?>
            </div>

            

            
			<div id="calendar" class="mt-3"></div>
		</div>
	</div>
</div>

<!-- Start popup dialog box -->
<?php if($_SESSION['position'] == "Staff"){?>
<div class="modal fade" id="event_entry_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Add Walk in Appointment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">�</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="img-container">
					<form action="" method="POST" id="appoint-form">
						<div class="row">
							<div class="col-md-6">
								<?php

								// $patientEmail = $_SESSION['email'];

								$sql = "SELECT * FROM users";
								$result = $conn->query($sql);    
								?>

								<?php if ($result->num_rows > 0) { ?>
								<?php while($row = $result->fetch_assoc()){?>
									<input type="text" class="d-none" name="patient_id" value="<?php echo $row['patientId'];?>">
								<?php }?>
								<?php } ?>



								<label for="" class="font-weight-bold">Select Patient<span class="text-danger">*</span></label>

								<select class="form-control select2" name="patient_name" id="patient_name" style="width: 100%" id="patients" required>
								<option value="">Select Patient</option>
								<?php
								$sql = "SELECT * FROM users WHERE position='Patient'";
								$result = $conn->query($sql);    
								?>

								<?php if ($result->num_rows > 0) { ?>
								<?php while($row = $result->fetch_assoc()){?>
									<option value="<?php echo $row['patientId'];?>"><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></option>           
								<?php }?>
								<?php } ?>
								</select>
								
							</div>

							<div class="col-md-6">
								<!-- <?php

								$patientEmail = $_SESSION['email'];

								$sql = "SELECT * FROM users WHERE email='$patientEmail'";
								$result = $conn->query($sql);    
								?>

								<?php if ($result->num_rows > 0) { ?>
								<?php while($row = $result->fetch_assoc()){?>
									<input type="text" class="d-none" name="patient_id" value="<?php echo $row['patientId'];?>">
								<?php }?>
								<?php } ?> -->



								<label for="" class="font-weight-bold">Preffered Dentist <span class="text-danger">*</span></label>

								<select class="form-control select2" name="dentist_name" style="width: 100%" id="dentist_name" required>
								<option value="">Select Doctor</option>
								<?php
								$sql = "SELECT * FROM dentist WHERE position='Dentist'";
								$result = $conn->query($sql);    
								?>

								<?php if ($result->num_rows > 0) { ?>
								<?php while($row = $result->fetch_assoc()){?>
									<option value="<?php echo $row['dentistId'];?>"><?php echo $row['fullname'];?></option>           
								<?php }?>
								<?php } ?>
								</select>
							</div>

						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="mt-3">
									<label for="" class="font-weight-bold">Appointment Date <span class="text-danger">*</span></label>
									<input type="date" name="appoint_date" readonly="true" id="appoint_date" class="form-control" required>
								</div>	
							</div>
							<!-- <div class="col-md-6">
								<div class="mt-3">
									<label for="" class="font-weight-bold">Appointment Time <span class="text-danger">*</span></label>
									<select name="appoint_time" id="appoint_time" class="form-control" required>
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
								</div>
							</div> -->
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="mt-3">
									<!-- <label for="" class="font-weight-bold">Service <span class="text-danger">*</span></label>
									<select name="service_name" id="service_name" class="form-control" required>
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
									</select> -->
                                    <label for="" class="font-weight-bold">Concerned <span class="text-danger">*</span></label>
                                    <textarea name="concerned" id="concerned" cols="5" rows="3" class="form-control" required>

                                    </textarea>
								</div>	
							</div>

							<div class="col-md-12">
								<div class="mt-3">
									<label for="" class="font-weight-bold">Status <span class="text-danger">*</span></label>
									<input type="text" readonly="true" name="patient_status" id="patient_status" class="form-control" value="Confirmed">
								</div>
							</div>

						</div>

						<div class="card bg-light my-3" style="max-width: 100%;">
                        <div class="card-header">Health Declaration</div>

                        <div class="card-body">
                            <div>
                                <p class="card-text">Do you have a fever or temperature over 38 *C? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question1" id="question1" value="Yes" >
                                        <label class="form-check-label" for="question1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question1" id="question1" value="No">
                                        <label class="form-check-label" for="question1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Have you experienced shortness of breathe or had trouble breathing? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question2" id="question2" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question2" id="question2" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>
                            
                            <div>
                                <p class="card-text">Do you have a dry cough? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question3" id="question3" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question3" id="question3" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have runny nose? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question4" id="question4" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question4" id="question4" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Have you recently lost or had a reduction in your sense of smell? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question5" id="question5" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question5" id="question5" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have sore throat? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question6" id="question6" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question6" id="question6" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have Diarrhea *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question7" id="question7" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question7" id="question7" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have influenza-like symptoms? (headache, aches, and pains, a rash on skin) *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question8" id="question8" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question8" id="question8" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have history of COVID-19 infection? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question9" id="question9" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question9" id="question9" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Do you have a member of your family who tested positive for COVID-19? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question10" id="question10" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question10" id="question10" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Have you traveled or lived in an area with a report of local transmission of COVID-19? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question11" id="question11" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question11" id="question11" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Have you traveled within the Philippines by air, bus, or train, within the past 14 days? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question12" id="question12" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question12" id="question12" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>

                            <div>
                                <p class="card-text">Have you traveled outside the Philippines by air or cruise ship in the past 14 days? *</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question13" id="question13" value="Yes" >
                                        <label class="form-check-label" for="exampleRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question13" id="question13" value="No">
                                        <label class="form-check-label" for="exampleRadios1">
                                            No
                                        </label>
                                    </div>
                            </div>
                            

                        </div>
                    </div>

						<!-- <input type="submit" id="appoint-btn" class="btn btn-primary" value="Submit"> -->

						<div class="modal-footer">
							<!-- <button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button> -->
                            <button type="button" class="btn btn-primary" id="save_event" >Save Appointment</button>
						</div>
				
					</form>
				</div>
			</div>

			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="save_event()">Save Event</button>
			</div> -->
		</div>
	</div>
</div>
<!-- End popup dialog box -->
<?php }?>
<br>

</body>

<script>
$(document).ready(function() {
	display_events();

   
            

            $('#save_event').click(function(e){
                
                    e.preventDefault();
                    $.ajax({
                        url: 'save_event.php',
                        method: 'post',
                        data: $("#appoint-form").serialize()+ '&action=Appoint',
                        success: function(response){

                            if(response === "   SameAppointment"){
                                console.log("The Appointment Date and Time is already appointed. Please Try Another!");
                                // alert("The Appointment Date and Time is already appointed. Please Try Another!");

                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'The Appointment Date and Time is already appointed. Please Try Another!',
                                    showConfirmButton: false,
                                    timer: 2000 
                                }).then(function(){
                                    // window.location = "dashPatient.php";
                                })
                            }

                            if(response === "   UniqueAppointment"){
                                console.log("The Appointment is Successfully Created!");
                                // alert("The Appointment is Successfully Created!");

                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'The Appointment is Successfully Created!',
                                    showConfirmButton: false,
                                    timer: 2000  
                                }).then(function(){
                                    window.location = "dashStaff.php";
                                })
                                // window.location.href = "dashStaff.php";
                            }

                            
                            
                        }
                    });
               
                return true;
            });
    
}); //end document.ready block


function display_events() {
	var events = new Array();
$.ajax({
    url: 'display_event.php',  
    dataType: 'json',
    success: function (response) {
         
    var result=response.data;
    $.each(result, function (i, item) {
    	events.push({
            event_id: result[i].event_id,
            title: result[i].title,
			titleFirstName: result[i].title_firstname,
			dentistFullname: result[i].dentist_fullname,
            start: result[i].start,
            // end_time: result[i].end_time,
			pat_status: result[i].patStatus,
            color: result[i].color,
            url: result[i].url
        }); 	
    })
	

	var calendar = $('#calendar').fullCalendar({
	    defaultView: 'month',
		 timeZone: 'local',
	    editable: true,
        selectable: true,
		selectHelper: true,
        select: function(start) {
				//alert(start);
				//alert(end);
				$('#appoint_date').val(moment(start).format('YYYY-MM-DD'));
				
				// $('#event_end_date').val(moment(end).format('YYYY-MM-DD'));
				$('#event_entry_modal').modal('show');
			},

		

        events: events,
	    eventRender: function(event, element, view) { 
            element.bind('click', function() {
					
					//Pag naiclick to may lalabas na modal then makikita natin yung mga data sa specific date na calendar
					let title = event.title;
					let patientStatus = event.pat_status;
					// let appointmentTime = event.end_time;
					let titleFirstName = event.titleFirstName;
					let dentistFullname = event.dentistFullname;
					
					let appointmentDate = new Date(event.start);
					
					// alert(title + patientStatus);
					alert("APPOINTMENT DETAILS" + "\n\n"
								+ "Client:                                          " + titleFirstName + " " + title + "\n"	
								+ "Dentist:                                        " + dentistFullname + "\n"	
								+ "Appointment Date:                     " + appointmentDate.toDateString() + "\n"
								// + "Appointment Time:                     " + appointmentTime + "\n"
								+ "Status:                                          " + patientStatus + "\n");
					
					// alert(event.title);
					// alert(event.pat_status);
					// alert(event.end);
					// alert(event.start);

					
					
				});
				// console.log(events);
    	}
		}); //end fullCalendar block	
	  },//end success block
	  error: function (xhr, status) {
	  alert(response.msg);
	  }
	});//end ajax block	
}


</script>
</html> 