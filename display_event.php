<?php                
require 'database_connection.php'; 

// $display_query = "SELECT reqId, patientId, appointment_date, appointment_time, status from request_appointment";   
$display_query = "SELECT a.reqId, a.patientId, a.dentistId, a.appointment_date, a.status, u.first_name , u.last_name, u.patientId, d.dentistId, d.fullname FROM request_appointment a INNER JOIN users u ON a.patientId = u.patientId INNER JOIN dentist d ON a.dentistId = d.dentistId";
$results = mysqli_query($con,$display_query);   
$count = mysqli_num_rows($results);  
if($count>0) 
{
	$data_arr=array();
    $i=1;
	while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
	{	
	$data_arr[$i]['event_id'] = $data_row['reqId'];
	$data_arr[$i]['title'] = $data_row['last_name'];
	$data_arr[$i]['title_firstname'] = $data_row['first_name'];
	$data_arr[$i]['dentist_fullname'] = $data_row['fullname'];
	$data_arr[$i]['start'] = date("Y-m-d", strtotime($data_row['appointment_date']));
	// $data_arr[$i]['end_time'] = $data_row['appointment_time'];
	$data_arr[$i]['patStatus'] = $data_row['status'];

	if($data_row['status'] == "Pending"){
		$data_arr[$i]['color'] = '#F05E16'; 
	}

	if($data_row['status'] == "Confirmed"){
		$data_arr[$i]['color'] = '#059142'; 
	}

	if($data_row['status'] == "Treated"){
		$data_arr[$i]['color'] = '#03254c'; 
	}

	if($data_row['status'] == "Cancelled"){
		$data_arr[$i]['color'] = '#A42821'; 
	}

	if($data_row['status'] == "No Show"){
		$data_arr[$i]['color'] = '#060D0D'; 
	}

	$i++;
	}
	
	$data = array(
                'status' => true,
                'msg' => 'successfully!',
				'data' => $data_arr
            );
}
else
{
	$data = array(
                'status' => false,
                'msg' => 'Error!'				
            );
}
echo json_encode($data);


?>