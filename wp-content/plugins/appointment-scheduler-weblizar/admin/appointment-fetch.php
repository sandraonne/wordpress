<?phpglobal $wpdb;if(isset($_REQUEST['appoint_info'])) {	$fetch_var=$_REQUEST['appoint_info'];	$ap_appoint_fecthes=$wpdb->get_row("select * from $wpdb->prefix"."apt_appointments WHERE id = $fetch_var ");   	$appointment_staff_details = $wpdb->get_results( "select * from $wpdb->prefix"."apt_staff");	$appointment_category_details = $wpdb->get_results( "SELECT * from $wpdb->prefix"."apt_category");	$appointment_client_details = $wpdb->get_results( "SELECT * from $wpdb->prefix"."apt_clients");}?><div class="col-md-12 col-sm-12 col-xs-12 modal-body" >	<div class="form-group">		<form action="" method="post" id="update_appoint_form">			<div class="row cus-reg">				<label><?php _e("Service Name:",WL_A_P_SYSTEM );?> </label>				<select class="a-services form-control" name="u_service_name" id="u_service_name">					<option value="0"><?php _e("-- Select a service --",WL_A_P_SYSTEM );?></option>					<?php foreach($appointment_category_details as $appointment_category_single_detail){ ?>						<optgroup label="<?php echo $appointment_category_single_detail->name;?>">							<?php $service_table=	$wpdb->prefix."apt_services";							$appointment_details = $wpdb->get_results( "SELECT * from $service_table where category= '$appointment_category_single_detail->id'");  							foreach($appointment_details as $appointment_single_detail){ ?>							<option value="<?php echo $appointment_single_detail->name ?>" <?php selected($ap_appoint_fecthes->service_type,$appointment_single_detail->name);?>><?php echo $appointment_single_detail->name ?></option>							<?php } ?>						</optgroup>					<?php } ?>				</select>				<span class="validation_alert" id="u_service_name_alert"><?php _e("Please select one",WL_A_P_SYSTEM ); ?></span>			</div>						<div class="row cus-reg">				<label><?php _e("Date:",WL_A_P_SYSTEM );?> </label>				<input type="text" class="a_date" id="u_datepicker" name="u_datepicker" value="<?php echo $ap_appoint_fecthes->booking_date ?>">				<span class="validation_alert" id="u_datepicker_alert"><?php _e("This field is required",WL_A_P_SYSTEM ); ?></span>			</div>						<div class="row cus-reg">				<label><?php _e("Start Period:",WL_A_P_SYSTEM );?> </label>				<div class="col-md-12 input-group clockpicker off_use_time" data-placement="left" data-align="top" data-autoclose="true">					<input type="text" name="u_start_period" id="u_start_period" class="time form-control " placeholder="Time" value="<?php echo $ap_appoint_fecthes->start_time?>"   >				</div>				<span  class="validation_alert" id="u_start_period_alert"><?php _e("This field is required",WL_A_P_SYSTEM ); ?></span>				<label><?php _e("End Period:",WL_A_P_SYSTEM );?> </label>				<div class="col-md-12 input-group clockpicker off_use_time" data-placement="left" data-align="top" data-autoclose="true">					<input type="text" name="u_end_period" id="u_end_period" class="time form-control " placeholder="Time" value="<?php echo $ap_appoint_fecthes->end_time?>"   >				</div>				<span class="validation_alert" id="u_end_period_alert"><?php _e("This field is required",WL_A_P_SYSTEM ); ?></span>			</div>						<div class="row cus-reg">				<label><?php _e("Customer:",WL_A_P_SYSTEM );?> </label>				<select name="u_a_customer" id="u_a_customer" class="form-control">					<option value="0"><?php _e("--- Select Customer ---",WL_A_P_SYSTEM );?></option>					<?php foreach($appointment_client_details as $appointment_client_single_detail){					$n = $appointment_client_single_detail->first_name.' '.$appointment_client_single_detail->last_name;?>					<option value="<?php echo $n;?>" <?php selected($ap_appoint_fecthes->client_name,$n);?>><?php echo $n;?></option>					<?php } ?>				</select>				<span class="validation_alert" id="u_a_customer_name_alert"><?php _e("Please select one",WL_A_P_SYSTEM ); ?></span>			</div>						<div class="row cus-reg">				<label><?php _e("Contact No.:",WL_A_P_SYSTEM );?> </label>				<input type="tel"  value="<?php echo $ap_appoint_fecthes->contact ?>" name="u_contact_no" id="u_contact_no" class="form-control phone">				<span class="validation_alert" id="u_contact_no_alert"><?php _e("This field is required",WL_A_P_SYSTEM ); ?></span>				<span class="validation_alert" id="u_number_contact_alert"><?php _e("This field is required number",WL_A_P_SYSTEM ); ?></span>																		</div>						<div class="row cus-reg">				<label><?php _e("Status:",WL_A_P_SYSTEM );?> </label>				<select name="u_status"  id="u_status" class="form-control">					<option value="0"><?php _e("--- Select Status ---",WL_A_P_SYSTEM );?></option>					<option value="approved" <?php selected($ap_appoint_fecthes->status,"approved");?>><?php _e("Approved",WL_A_P_SYSTEM );?></option>					<option value="pending" <?php  selected($ap_appoint_fecthes->status,"pending");?>><?php _e("Pending",WL_A_P_SYSTEM );?></option>					<option value="cancel" <?php   selected($ap_appoint_fecthes->status,"cancel");?>><?php _e("Cancel",WL_A_P_SYSTEM );?></option>					<option value="completed" <?php selected($ap_appoint_fecthes->status,"completed");?>><?php _e("Completed",WL_A_P_SYSTEM );?></option>				</select>				<span class="validation_alert" id="u_status_alert"><?php _e("Please select one",WL_A_P_SYSTEM ); ?></span>			</div>			<input type="hidden" name="id_appoint" id="id_appoint" value="<?php echo $ap_appoint_fecthes->id ?>">			<div style="display: none;" class="row cus-reg">				<label><?php _e("Payment Status:",WL_A_P_SYSTEM );?> </label>				<select name="u_payment_status"  id="u_payment_status" class="form-control">					<option value="approved" <?php selected($ap_appoint_fecthes->payment_status,"approved");?>><?php _e("Approved",WL_A_P_SYSTEM );?></option>					<option value="pending" <?php  selected($ap_appoint_fecthes->payment_status,"pending");?>><?php _e("Pending",WL_A_P_SYSTEM );?></option>				</select>				<span class="validation_alert" id="u_p_status_alert"><?php _e("Please select one",WL_A_P_SYSTEM ); ?></span>			</div>		</form>	</div>	</div><div class="modal-footer">	<button type="button" class="btn btn-info" id='update_appointment_details' onclick="return update_appointment();"><?php _e("Update",WL_A_P_SYSTEM );?></button>	<a class="btn btn-info" href="<?php echo plugins_url('appointment-csv.php?id='.$ap_appoint_fecthes->id.'&client_name='.$ap_appoint_fecthes->client_name.'', __FILE__ ); ?>"><?php _e("Print",WL_A_P_SYSTEM );?></a>	<button type="button" class="btn btn-default" data-dismiss="modal"><?php _e("Cancel",WL_A_P_SYSTEM );?></button></div>