<?phpif(isset($_REQUEST['id'],$_REQUEST['client_name'])) {	$z = $_REQUEST['id'];	$s = $_REQUEST['client_name'];	require_once '../../../../wp-load.php';	header('Content-Type: text/csv');	header('Content-Disposition: inline; filename="'.$s.' Appointment-'.date('Y-m-d-H-i-s').'.csv"');	$results = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix ."apt_appointments WHERE id =$z");	echo "Booking Id,Appoinment Date,Start Time,End Time,Employee,Customer Name,Service,Status,Contact No\r\n";   	if (count($results)) {		foreach($results as $result) {			echo $result->id.",".$result->booking_date .",".$result->start_time .",".$result->end_time .", ".$result->staff_member .",".$result->client_name .",".$result->service_type .",".$result->status .", ".$result->payment_status .",".$result->contact ."\r\n";		}	}}