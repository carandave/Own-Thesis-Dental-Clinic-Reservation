<?php 
    require_once "connection.php";

    if(isset($_POST['action']) && $_POST['action'] == 'updateTooth'){
        // Nakuha na natin ang Id ni patient iupdate na natin
         $patientIdTeeth = $_POST['patientIdTeeth'];
         $teeth1 = $_POST['inlineCheckbox1'];
         $teeth2 = $_POST['inlineCheckbox2'];
         $teeth3 = $_POST['inlineCheckbox3'];
         $teeth4 = $_POST['inlineCheckbox4'];
         $teeth5 = $_POST['inlineCheckbox5'];
         $teeth6 = $_POST['inlineCheckbox6'];
         $teeth7 = $_POST['inlineCheckbox7'];
         $teeth8 = $_POST['inlineCheckbox8'];
         $teeth9 = $_POST['inlineCheckbox9'];
         $teeth10 = $_POST['inlineCheckbox10'];
         $teeth11 = $_POST['inlineCheckbox11'];
         $teeth12 = $_POST['inlineCheckbox12'];
         $teeth13 = $_POST['inlineCheckbox13'];
         $teeth14 = $_POST['inlineCheckbox14'];
         $teeth15 = $_POST['inlineCheckbox15'];
         $teeth16 = $_POST['inlineCheckbox16'];
         $teeth17 = $_POST['inlineCheckbox17'];
         $teeth18 = $_POST['inlineCheckbox18'];
         $teeth19 = $_POST['inlineCheckbox19'];
         $teeth20 = $_POST['inlineCheckbox20'];
         $teeth21 = $_POST['inlineCheckbox21'];
         $teeth22 = $_POST['inlineCheckbox22'];
         $teeth23 = $_POST['inlineCheckbox23'];
         $teeth24 = $_POST['inlineCheckbox24'];
         $teeth25 = $_POST['inlineCheckbox25'];
         $teeth26 = $_POST['inlineCheckbox26'];
         $teeth27 = $_POST['inlineCheckbox27'];
         $teeth28 = $_POST['inlineCheckbox28'];
         $teeth29 = $_POST['inlineCheckbox29'];
         $teeth30 = $_POST['inlineCheckbox30'];
         $teeth31 = $_POST['inlineCheckbox31'];
         $teeth32 = $_POST['inlineCheckbox32'];

        $sqlu = "UPDATE users SET teeth1='$teeth1', teeth2='$teeth2', teeth3='$teeth3', teeth4='$teeth4', teeth5='$teeth5', teeth6='$teeth6', teeth7='$teeth7', teeth8='$teeth8', teeth9='$teeth9', teeth10='$teeth10', teeth11='$teeth11', teeth12='$teeth12', teeth13='$teeth13', teeth14='$teeth14', teeth15='$teeth15', teeth16='$teeth16',
                                  teeth17='$teeth17', teeth18='$teeth18', teeth19='$teeth19', teeth20='$teeth20', teeth21='$teeth21', teeth22='$teeth22', teeth23='$teeth23', teeth24='$teeth24', teeth25='$teeth25', teeth26='$teeth26', teeth27='$teeth27', teeth28='$teeth28', teeth29='$teeth29', teeth30='$teeth30', teeth31='$teeth31', teeth32='$teeth32' WHERE patientId='$patientIdTeeth'";
        $sqlu_run = mysqli_query($conn, $sqlu);

        if($sqlu_run){

            
            
            // echo '<script>window.location.href("dentistTreatment_view.php")</script>';
        //     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        //     <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //       <span aria-hidden="true">&times;</span>
        //     </button>
        //   </div>';
            // echo '<script>alert("Success Updated")</script>';
            // header("Location: dentistTreatment_view.php");
            // exit;
            // echo '<script>alert("Success Updated")</script>';
        }
        
        // $editprodName = $_POST['editprodName'];
        // $editprodStocks = $_POST['editprodStocks'];

        // $editprodLastUpdated = date("F d, Y");
         

        
        // $edit_query = "UPDATE inventory SET products='$editprodName', stocks='$editprodStocks', last_updated='$editprodLastUpdated' WHERE productId='$editProductId'";             
        // $execute = mysqli_query($conn, $edit_query);

        // if($execute){
            

        //     echo "SuccessEdit";
        // }

        // else{
        //     echo "UnSuccessEdit";
        // }
        
    }

    

?>