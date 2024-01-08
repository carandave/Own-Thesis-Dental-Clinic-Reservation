<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Request Appointment</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .error{
        color: rgba(202, 0, 0, 0.863);
        margin-top: 5px;
    }
</style>
<body>

    <div class="__navBar fluid-container">
        <div class="container">

            <!-- Nav Bar Start -->

            <nav class="__navBar navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#">Logo Here</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Online Appointment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="index.php" >
                            Services
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Nav Bar End -->

        </div>
    </div>

    <div class="__request-con container-fluid">
        <div class="container p-5">
            <!-- <div class="alert alert-success">
                <strong id="result"></strong>
            </div> -->
            <h1>Book an Appointment</h1>
            <form class="px-md-5 pt-3" action="" method="post" role="form" id="appointment-frm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>      
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Phone" required>      
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Preffered Appointment Date</label>
                            <input type="date" name="date" class="form-control" placeholder="Enter Phone" required>      
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Preffered Appointment Time</label>
                            <select name="time" id="" class="form-control" required>
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
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Service Required</label>
                    <div class="d-flex" style="flex-direction: column">
                        <select class="form-control" name="service" id="exampleFormControlSelect1" required>
                            <option></option>
                            <option value="Service One">Service One</option>
                            <option value="Service Two">Service Two</option>
                            <option value="Service Three">Service Three</option>
                            <option value="Service Four">Service Four</option>
                            <option value="Service Five">Service Five</option>
                          </select>
                          
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="">Any Comments</label>
                    <textarea name="comments" id="" style="width: 100%;" class="form-control" required></textarea>
                </div>
                
                
                <div class="d-flex justify-content-center align-items-center">
                    <input type="submit" name="addAppointment" id="addAppointment" class="__reqBtn" value="Request Appointment" >
                </div>

                <div class="alert alert-danger mt-3 text-center" id="alert">
                    <strong id="result" class="text-center"></strong>
                </div>
                
              </form>
        </div>
    </div>

    <div class="__footer container-fluid">
        <div class="container">
            <div class="row pt-5 pb-3 mb-3">
                <div class="col-md-3">
                    <p>PEARL DENTAL CLINIC, OFFERS WORLD-CLASS AFFORDABLE DENTAL CARE & TREATMENT WITH THE HIGHEST QUALITY STANDARDS. BEST DENTAL CLINIC IN DUBAI FOR ALL YOUR NEEDS</p>
                </div>

                <div class="__links col-md-3 pl-4 mb-4">
                    <h4>LINKS</h4>
                    <a href="" >
                        <i class="fa-brands fa-facebook"></i>
                    </a>

                    <a href="" >
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="" >
                        <i class="fa-brands fa-twitter"></i>
                    </a>

                    <a href="" >
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                    <a href="">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                        
                </div>

                <div class="col-md-3 mb-3">
                    <h4>SERVICES</h4>
                    <p>SERVICE 1</p>
                    <p>SERVICE 2</p>
                    <p>SERVICE 3</p>
                    <p>SERVICE 4</p>
                    <p>SERVICE 5</p>
                </div>

                <div class="col-md-3 mb-3">
                    <h4>Contacts</h4>
                    <div class="__number">
                        <i class="fa-solid fa-phone"></i>
                        <span> +69 1234567891</span>
                    </div>
                    <div class="__location mt-2">
                        <i class="fa-solid fa-location-dot"></i>
                        <span> Brgy Example Blk Example Lot Example Example Rizal</span>
                    </div>
                    
                </div>
            </div>

            <div>
                <p>All Rights Reserved @2023.</p>
            </div>
        </div>
    </div>

    



    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <!-- Jquery Validation Form -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Jquery Validation Form -->

    <script>
        $(document).ready(function(){
            $("#alert").hide();
            $('#appointment-frm').validate()
            console.log("Start");

            $('#addAppointment').click(function(e){
                if(document.getElementById('appointment-frm').checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url: 'process.php',
                        method: 'post',
                        data: $("#appointment-frm").serialize()+ '&action=appoint',
                        success: function(response){
                            $("#alert").show();
                            $("#result").html(response);
                            console.log(response);

                            
                            
                        }
                    });
                }
                return true;
            });
        });
    </script>

    
</body>
</html>