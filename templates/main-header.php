<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/dashAdmin.css">  
    <title>Document</title>
</head>
<body>
<div class="container-fluid bg-dark px-3 " style="height: 100%; background-color: #002c42 !important;" >
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-xl navbar-dark" >
        <!-- <a href="#"><img src="./img/Logo.png" class="img-fluid" alt="..." style="height: 30px; width: 30px "></a> -->
        <a class="navbar-brand text-uppercase text-white" href="#">Dental Care Clinic</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
        </button>

        <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                <?php if(isset($_SESSION['email']) && $_SESSION['position']=='Dentist'): ?>
                    <div class="dentistViewMobile d-none">
                        <a class="dropdown-item" href="dashAdmin.php">Dashboard</a>
                        <a class="dropdown-item" href="patient_view.php">Patient</a>
                        <a class="dropdown-item" href="dentistAppointmentList.php">Appointment List</a>
                        <a class="dropdown-item" href="dentistPrescription_view.php">Prescription</a>
                        <a class="dropdown-item" href="dentistTreatment_view.php">Treatment</a>
                        <a class="dropdown-item" href="inventory_view.php">Inventory</a>
                        <a class="dropdown-item" href="patientmessage_view.php">Query Messages</a>
                    </div>

        <a class="dropdown-item" href="dentistProfile.php">Edit Profile</a>
        <a class="dropdown-item" href="dentistChangeAcc.php">Change Password</a>
        
                <?php endif ?>

                <?php if(isset($_SESSION['email']) && $_SESSION['position']=='Staff'): ?>
                    <a class="dropdown-item" href="dentistProfile.php">Edit Profile</a>
                    <a class="dropdown-item" href="dentistChangeAcc.php">Change Password</a>
                <?php endif ?> 

                <?php if(isset($_SESSION['email']) && $_SESSION['position']=='Admin'): ?>
                    <a class="dropdown-item" href="dentistProfile.php">Edit Profile</a>
                    <a class="dropdown-item" href="dentistChangeAcc.php">Change Password</a>
                <?php endif ?>

                <?php if(isset($_SESSION['email']) && $_SESSION['position']=='Patient'): ?>
                    <a class="dropdown-item" href="patientProfile.php">Edit Profile</a>
                    <a class="dropdown-item" href="patientChangeAcc.php">Change Password</a>
                <?php endif ?>

                <!-- <a class="dropdown-item" href="dentistProfile.php">Edit Profile</a> -->
                <!-- <a class="dropdown-item" href="dentistChangeAcc.php">Change Password</a> -->
                <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
            </ul>
        </li>
        </div>
        </nav>
    <!-- Navbar End -->


    </div>
</body>
</html>
