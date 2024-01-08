<?php 

    require_once "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Appointment</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Links Start-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Links End-->

    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Sweetalert Cdn Start -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Sweetalert Cdn End -->
</head>
<style>
    .error{
        color: rgba(255, 0, 0, 0.5);
        font-weight: 600;
        font-size: 13px;
        margin-bottom: 0px;
    }
</style>
<body>

    

    <div class="__navBar fluid-container">
        <div class="container">

            <!-- Nav Bar Start -->

            <nav class="__navBar navbar navbar-expand-lg navbar-dark">
                <a href="index.php"><img src="./img/Logo.png" class="img-fluid" alt="..." style="height: 70px; width: 60px "></a>
                <a class="navbar-brand" href="index.php">Dr. Marc Feir Bauzon Dental Clinic</a>
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#servicess">Services</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="#services" >
                            Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Nav Bar End -->

        </div>
    </div>

    <div class="__header-con fluid-container" id="home">
        <div class="__heading-con container">
            <h1>Our Vision is to to be the preferred</h1>
            <h1 class="mb-4">Dental Clinic of all the clients we serve.</h1>

            <a href="login.php" class="__heading-link">Make an Appointment</a>
        </div>
    </div>

    <div class="__sectionTwo container-fluid" id="services">
        <div class="container">

            <h1 class="text-center mt-5">Gallery</h1>

            <div class="row">
                <div class="col-md-3 mt-3 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="img/pictclinic1.jpg" alt="Card image cap">
                        <!-- <div class="card-body">
                          <h5 class="card-title">Service One</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div> -->
                      </div>
                </div>
                <div class="col-md-3 mt-3 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="img/pictclinic2.jpg" alt="Card image cap">
                        <!-- <div class="card-body">
                          <h5 class="card-title">Service Two</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div> -->
                      </div>
                </div>

                <div class="col-md-3 mt-3 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="img/pictclinic3.jpg" alt="Card image cap">
                        <!-- <div class="card-body">
                          <h5 class="card-title">Service Three</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div> -->
                      </div>
                </div>  

                <div class="col-md-3 mt-3 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="img/pictclinic4.jpg" alt="Card image cap">
                        <!-- <div class="card-body">
                          <h5 class="card-title">Service Four</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div> -->
                      </div>
                </div>
                <div class="col-md-3 mt-3 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="img/pictclinic5.jpg" alt="Card image cap">
                        <!-- <div class="card-body">
                          <h5 class="card-title">Service Five</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div> -->
                      </div>
                </div>

                <div class="col-md-3 mt-3 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="img/pictclinic6.jpg" alt="Card image cap">
                        <!-- <div class="card-body">
                          <h5 class="card-title">Service Six</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div> -->
                      </div>
                </div>  

                <div class="col-md-3 mt-3 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="img/pictclinic7.jpg" alt="Card image cap">
                        <!-- <div class="card-body">
                          <h5 class="card-title">Service Six</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div> -->
                      </div>
                </div>  

                <div class="col-md-3 mt-3 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="img/pictclinic8.jpg" alt="Card image cap">
                        <!-- <div class="card-body">
                          <h5 class="card-title">Service Six</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div> -->
                      </div>
                </div>  
            </div>

        </div>
    </div>

    <div class="__sectionOne container-fluid mt-5" id="about">
        <div class="container d-flex justify-content-center align-items-center">

            <div class="my-5" style="width: 50%;">
                <h1 class="text-center">About Us</h1>
                <p class="text-justify">Welcome to Dr. Marc Feir Bauzon Dental Clinic, your go-to dental clinic for comprehensive and compassionate dental care. We are dedicated to providing the highest quality of dental care to our patients in a comfortable and relaxing environment.</p>
                <p>I am committed to helping you achieve optimal oral health through personalized treatment plans that cater to your unique needs. From routine cleanings and exams to complex restorative procedures, we use the latest technology and techniques to deliver exceptional results.</p>
                <p>At [Dental Clinic Name], we understand that visiting the dentist can be daunting for many people. That's why we strive to create a welcoming and stress-free environment for our patients. We take the time to listen to your concerns and answer any questions you may have to help you feel more at ease.</p>

            </div>

            
            </div>

        </div>
    </div>

    <div class="__sectionTwo container-fluid" id="servicess">
        <div class="container">

            <h1 class="text-center mt-5">Services</h1>

            <div class="row">
                <?php 
                
                $sqls = "SELECT * FROM services";
                $resultss = $conn->query($sqls);
                
                ?>

                <?php if($resultss->num_rows > 0){?>
                    <?php while($rows = $resultss->fetch_assoc()){?>
                <div class="col-md-3 mt-3 d-flex justify-content-center align-items-center">
                    <div class="__cards card" style="width: 18rem; background-color: #002c42; color: #D5DFE7" >
                        <!-- <img class="card-img-top" src="img/pictclinic1.jpg" alt="Card image cap"> -->
                        <div class="card-body ">
                          <h5 class="card-title"><?php echo $rows['service_name'];?></h5>
                          <h6 class="card-title"><?php echo $rows['fees'];?></h6>
                          <small class="card-text"><?php echo $rows['content'];?></small>
                          <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                      </div>
                </div>
                <?php }?>
                <?php }?>

                
                
            </div>

        </div>
    </div>

    <!-- <div class="__sectionTwo container-fluid" id="services">
        <div class="container">

            <h1 class="text-center mt-5">Our Services</h1>

            <div class="row">
                <div class="col-md-4 mt-5 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="Cosmetic Dentistry Niagara _ Niagara Teeth Whitening.png" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Service One</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
                <div class="col-md-4 mt-5 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="Cosmetic Dentistry Niagara _ Niagara Teeth Whitening.png" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Service Two</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>

                <div class="col-md-4 mt-5 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="Cosmetic Dentistry Niagara _ Niagara Teeth Whitening.png" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Service Three</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>  

                <div class="col-md-4 mt-5 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="Cosmetic Dentistry Niagara _ Niagara Teeth Whitening.png" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Service Four</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>
                <div class="col-md-4 mt-5 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="Cosmetic Dentistry Niagara _ Niagara Teeth Whitening.png" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Service Five</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>

                <div class="col-md-4 mt-5 d-flex justify-content-center align-items-center">
                    <div class="__card card" style="width: 18rem;">
                        <img class="card-img-top" src="Cosmetic Dentistry Niagara _ Niagara Teeth Whitening.png" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Service Six</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                </div>  
            </div>

        </div>
    </div> -->

    <div class="__sectionThree container-fluid mt-5">
        <div class="container">
            
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
                    <h1 class="mt-5">Why Choose Our Dental Care Clinic? </h1>
                    <p>The most important thing to consider when choosing the proper dental practice is that all the documents from your visits to the dentist are kept securely and can be retrieved.</p>
                    <p>That’s because we can have a thorough dental history and monitor the progress of the health and appearance of your teeth. It allows us to identify any issues and address them as soon as possible.</p>
                    <p>Our dentists believe that the relationship between patients and dentists is exceptional because it demands trust and confidence; you shouldn’t have anyone mess the way with your smile.</p>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div >
                        <img class="img-fluid" style="width: 27rem;" src="FemaleHoldingTeeth.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="__sectionFour container-fluid p-5" id="contact">
        <div class="container">
            <h4 class="text-center">Send Message</h4>
            <h2 class="text-center">Drop Us Message for Any Query</h2>
            <p class="text-center">If you have an idea, we would love to hear about it.</p>
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="POST" id="message-form">
                        <input type="text" name="name" id="name" class="form-control mt-3" placeholder="Name" required>
                        <input type="email" name="email" id="email" class="form-control mt-3" placeholder="Email" required>
                        <input type="number" name="phone" id="phone" class="form-control mt-3" placeholder="Phone" required>
                        <textarea name="message" id="message" cols="10" rows="5"  class="form-control mt-3" placeholder="Message" required>

                        </textarea>
                        <input type="submit" id="messageBtn" class="btn btn-block mt-3" style="background-color: #002c42; color: lightgray;">
                    </form>
                </div>

                <div class="col-md-6 mt-5 mt-sm-0">
                    <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d965.3712457284954!2d121.12916791522026!3d14.571418726270418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c77468c3b11b%3A0xbaa0f5dd3b2a0e8d!2sDr.Marc%20Feir%20Bauzon%20Dental%20Clinic%20Orthodontics!5e0!3m2!1sen!2sph!4v1681135491360!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <div class="__footer container-fluid">
        <div class="container">
            <div class="row pt-5 pb-3 mb-3">
                <div class="col-md-3">
                    <p>DENTAL CARE CLINIC, OFFERS WORLD-CLASS AFFORDABLE DENTAL CARE & TREATMENT WITH THE HIGHEST QUALITY STANDARDS. BEST DENTAL CLINIC IN THE PHILIPPINES FOR ALL YOUR NEEDS</p>
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

                <?php 
                
                $sql = "SELECT * FROM services";
                $results = $conn->query($sql);

                ?>

                <div class="col-md-3 mb-3">
                    <h4>SERVICES</h4>
                    <?php if($results->num_rows>0){?>
                        <?php while($rows = $results->fetch_assoc()){?>
                    <p><?php echo $rows['service_name']?></p>
                    <!-- <p>SERVICE 2</p>
                    <p>SERVICE 3</p>
                    <p>SERVICE 4</p>
                    <p>SERVICE 5</p> -->
                        <?php }?>
                    <?php }?>
                </div>

                <div class="col-md-3 mb-3">
                    <h4>Contacts</h4>
                    <div class="__number">
                        <i class="fa-solid fa-phone"></i>
                        <span> +69 1234567891</span>
                    </div>
                    <div class="__location mt-2">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>90 Rizal Ave, Taytay, 1920 Rizal</span>
                    </div>
                    
                </div>
            </div>

            <div>
                <p>All Rights Reserved @2023.</p>
            </div>
        </div>
    </div>

    

      

    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">

        $(document).ready(function (){

            $("#message-form").validate();

            //Sending of Message
            $('#messageBtn').click(function(e){

                if(document.getElementById("message-form").checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url: 'patientmessage_add.php',
                        method: 'post',
                        data: $("#message-form").serialize()+ '&action=addMessage',
                        success: function(response){
                            // $("#alert").show();
                            // $("#result").html(response);
                            console.log(response);

                            if(response == "Messaged"){

                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Successfully Sent the message!',
                                    showConfirmButton: false,
                                    timer: 1500  
                                }).then(function(){
                                    window.location = "index.php";
                                })

                            }

                            else if(response == "NotMessaged"){

                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'There is an error',
                                showConfirmButton: false,
                                timer: 1300  
                            }).then(function(){
                                window.location = "index.php";
                            })

                            }

                            
                            
                        }
                    });
                }

                    
             
                return true;
            });
            
            

        });

    </script>

</body>
</html>










