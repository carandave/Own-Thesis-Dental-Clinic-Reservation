<style>
    ul li{
        width: 80%;
        margin: 0 auto;
        
    }

    .img-fluid{
        border-radius: 50px;
        background: white;
        margin-right: 15px;
        margin-bottom: 15px;
        outline: 8px solid gray;
    }
</style>

<div class="sidebar pb-5" style="min-height: 100%; width: 100%; background-color: #002c42 !important;">
    <ul class="nav nav-primary" style="min-height: 100%;">

        <li class="nav-item d-flex justify-content-center align-items-center mt-3 mb-2" style="border-bottom: 1px solid white;">
           
                <img src="./img/Logo.png" class="img-fluid" alt="..." style="height: 60px; width: 60px ">
                <h6 class="text-white mb-3">Hello! <?php echo $_SESSION['position']; ?> 
                <?php if($_SESSION['position'] == "Dentist") {?>
                    <?php echo $_SESSION['fullname']; ?>
                <?php }?>

                <?php if($_SESSION['position'] == "Patient") {?>
                    <?php echo $_SESSION['email']; ?>
                <?php }?>
                </h6>
                
        </li>

        <?php if(isset($_SESSION['email']) && $_SESSION['position']=='Dentist'): ?>
            <!-- <div> -->
            <li class="nav-item mt-3">
            <a href="dashAdmin.php" >
                <i class="fas fa-home"></i>
                <p class="text-white">Dashboard</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="patient_view.php">
                <i class="icon-people"></i>
                <p class="text-white">Patients</p>
            </a>
        </li>

        <li class="nav-item ">
            <a href="dentistAppointmentList.php">
                <i class="icon-docs"></i>
                <p class="text-white">Appointment List</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="dentistPrescription_view.php">
                <i class="icon-doc"></i>
                <p class="text-white">Prescription</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="dentistTreatment_view.php">
                <i class="icon-layers"></i>
                <p class="text-white">Treatment</p>
            </a>
        </li>

        <!-- <li class="nav-item">
            <a href="inventory_view.php">
                <i class="icon-layers"></i>
                <p class="text-white">Inventory</p>
            </a>
        </li> -->

        <li class="nav-item">
            <a href="patientmessage_view.php">
                <i class="icon-layers"></i>
                <p class="text-white">Query Messages</p>
            </a>
        </li>
            <!-- </div> -->
        

        <?php endif ?>

        <?php if(isset($_SESSION['email']) && $_SESSION['position']=='Admin'): ?>
        <li class="nav-item mt-3">
            <a href="dashAdmin.php" >
                <i class="fas fa-home"></i>
                <p class="text-white">Dashboard</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="patient_view.php">
                <i class="icon-people"></i>
                <p class="text-white">Patients</p>
            </a>
        </li>

        <li class="nav-item ">
            <a href="staffAppointmentList.php">
                <i class="icon-docs"></i>
                <p class="text-white">Appointment List</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="admin_view.php">
                <p class="text-white">Admin</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="dentist_view.php">
                <p class="text-white">Dentist</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="staff_view.php">
                <i class="fas fa-user-tie"></i>
                <p class="text-white">Staff</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="services_view.php">
                <i class="icon-layers"></i>
                <p class="text-white">Services</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="patientmessage_view.php">
                <i class="icon-layers"></i>
                <p class="text-white">Query Messages</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="adminPrescriptionReports_view.php">
                <i class="icon-doc"></i>
                <p class="text-white">Prescription Reports</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="adminTreatmentReports_view.php">
                <i class="icon-layers"></i>
                <p class="text-white">Treatment Reports</p>
            </a>
        </li>

        <!-- <li class="nav-item">
            <a href="adminInventoryReports_view.php">
                <i class="icon-layers"></i>
                <p class="text-white">Inventory Reports</p>
            </a>
        </li> -->

        <li class="nav-item">
            <a href="adminSalesReports_view.php">
                <i class="icon-layers"></i>
                <p class="text-white">Revenue Report</p>
            </a>
        </li>
    
        <!-- <li class="nav-item">
            <a href="resident_certification.php">
                <i class="icon-badge"></i>
                <p class="text-white">Schedule</p>
            </a>
        </li> -->
        
        

        

        <?php endif ?>

        <?php if(isset($_SESSION['email']) && $_SESSION['position']=='Staff'): ?>
        <li class="nav-item mt-3">
            <a href="dashStaff.php" >
                <i class="fas fa-home"></i>
                <p class="text-white">Dashboard</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="patient_view.php">
                <i class="icon-people"></i>
                <p class="text-white">Patients</p>
            </a>
        </li>

        <li class="nav-item ">
            <a href="staffAppointmentList.php">
                <i class="icon-docs"></i>
                <p class="text-white">Appointment List</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="patientmessage_view.php">
                <i class="icon-layers"></i>
                <p class="text-white">Query Messages</p>
            </a>
        </li>

        <!-- <li class="nav-item">
            <a href="inventory_view.php">
                <i class="icon-layers"></i>
                <p class="text-white">Inventory</p>
            </a>
        </li> -->

        

        <?php endif ?>


        
        
        

        <?php if(isset($_SESSION['email']) && $_SESSION['position']=='Patient'): ?>
            <li class="nav-item">
                <a href="dashPatient.php">
                    <i class="icon-layers"></i>
                    <p class="text-white">Dashboard</p>
                </a>
            </li>
        <?php endif ?>
        
        
            
		
    </ul>
</div>
            
