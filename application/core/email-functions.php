<?php
require_once'./setemail.php';

$getid = $_GET['mid'];
switch($getid)
{
	case "ccrEmail":
	$mail->addAddress($samarth, 'Samarth Jain');
	$mail->addAddress($pinaki, 'Pinaki Narendra');
	$mail->addAddress($rajesh, 'Rajesh Bisht');
	$mail->addAddress($isms, 'Tanay Dobhal');
	$mail->addCC($fuemail,$funame);
	$mail->Subject = 'Change Control Request Form';
	$mail->Body.= 'Hi, <br>This is email auto generated by ISMS CRM. for reply goto http://isms.silaris.in/ <br><br>';
	$mail->Body.='<table style="width:100%">';

	$mail->Body.='<tr style="background-color:#f5d9af;padding:5px;border:5px solid black;text-align:center;">
	<h2 style="color:#000;font-family:arial;">Change Control Request Form</h2>
	</tr>';

	$mail->Body.='<table border="1" style="width:100%">
		<tr>
			<th>Priority</th>
			<th>CCR Number</th>
			<th>CCR Date & Time</th>
			<th>Type of Change</th>
			
		</tr>
		<tr>
			<td>'.$priority.'</td>
			<td>'.$ccrmno.'</td>
			<td>'.$raisedate.'</td>
			<td>'.$typechange.'</td>
		</tr>
	</table>';

	$mail->Body.='<br>

	<table style="width:100%" border="1">
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Location</td>
			<td>'.$location.'</td>
		</tr>
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Description of Change</td>
			<td>'.$descripchange.'</td>
		</tr>
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Nature of Change</td>
			<td>'.$nature.'</td>
		</tr>
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Start Date & Time</td>
			<td>'.$startdate.'</td>
		</tr>
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Expected Date & Time</td>
			<td>'.$expectdate.'</td>
		</tr>
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Information Security Impact</td>
			<td>'.$ismsimpact.'</td>
		</tr>
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Possible Impact Detail</td>
			<td>'.$possiblmpact.'</td>
		</tr>
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Security Impact Approved By</td>
			<td style="color:#fff">'.$approveby.'</td>
		</tr>
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Purpose for the changes</td>
			<td>'.$purpose.'</td>
		</tr>
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Process Owner</td>
			<td>'.$process.'</td>
		</tr>
		<tr style="padding:2px 0px 2px 2px;">
			<td style="font-weight:bold">Owner</td>
			<td>'.$owner.'</td>
		</tr>
	</table>
	<br>';

	$mail->Body.='<table style="width:100%">
	<tr style="padding:2px 0px 2px 2px;">
		<td>'.$message.'</td>
	</tr>
	</table>
	<br>';
	$mail->Body.='<table style="width:100%" border="1">
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Will this change cause an outage to customer/business?</td>
		<td>'.$willchange.'</td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Regression procedure (In case of failure due to changes made)</td>
		<td>'.$regression.'</td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Required time to back out</td>
		<td>'.$backout.'</td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Potential Impact if the change fails</td>
		<td>'.$changefails.'</td>
	</tr>
	<tr style="padding:2px 0px 2px 2px;">
		<td style="font-weight:bold">Proposed change conflicting with any other planned change for the same day</td>
		<td>'.$conflicting.'</td>
	</tr>
	</table>
	<br>
	<br>
	<br>
	<hr>
	<table style="width:100%">
		<tr style="text-align:center">
		<h3>Silaris Informations Pvt Ltd</h3>
		
	</tr>
	<tr style="text-align:center">
		<td>14/3, Naraina Industrial Area Phase-II, Naraina New Delhi-110028</td>
	</tr>	
	</table>';


	$mail->send();
	break;
	case "emailCreate":
	$mail->addAddress('aarti.dogra@silaris.in', 'Aarti Dogra');
	$mail->addCC($fuemail,$funame);
	$mail->Subject = 'Email ID Creation Request';
	$mail->Body.= 'Hi HR Team, <br>Kindly login in http://isms.silaris.in & confirm the status of below mention employee to approve.<br><br>';
	$mail->Body.='<table border="1">';
	$mail->Body.='<tr>';
	$mail->Body.='<th>Employee Name</th>';
	$mail->Body.='<th>Employee ID</th>';
	$mail->Body.='<th>Process</th>';
	$mail->Body.='<th>Designation</th>';
	$mail->Body.='<th>Reporting</th>';
	$mail->Body.='</tr>';
	$mail->Body.='<tr>';
	$mail->Body.='<td>'.$empname.'</td>';
	$mail->Body.='<td>'.$idprefix.$empid.'</td>';
	$mail->Body.='<td>'.$depart.'</td>';
	$mail->Body.='<td>'.$design.'</td>';
	$mail->Body.='<td>'.$manager.'</td>';
	$mail->Body.='</tr>';
	$mail->Body.='</table>';
	$mail->Body.='<br><br>';
	$mail->Body.='Please confirm, does mentioned employee exist or not';
	$mail->Body.='<br><br>';
	$mail->Body.='Thank you!';
	$mail->send();
	break;
	case "emailAccess":
	$mail->addAddress('email.support@silaris.in', 'Arun Dogra');
	$mail->addCC($ademail,$adname);
	$mail->Subject = 'Exist Email Access';
	$mail->Body.= 'Hi Email Support Team, <br> Employee has send request for email access, please give previous access detail of below mention email ID . for reply goto http://isms.silaris.in/ <br><br>';
	$mail->Body.='<table border="1">';
	$mail->Body.='<tr>';
	$mail->Body.='<th>Employee Name</th>';
	$mail->Body.='<th>Employee ID</th>';
	$mail->Body.='<th>Email ID</th>';
	$mail->Body.='<th>Process</th>';
	$mail->Body.='<th>Designation</th>';
	$mail->Body.='<th>Reporting</th>';
	$mail->Body.='<th>Email Accesses</th>';
	$mail->Body.='<th>Previous accesses</th>';
	$mail->Body.='</tr>';
	$mail->Body.='<tr>';
	$mail->Body.='<td>'.$empname.'</td>';
	$mail->Body.='<td>'.$empid.'</td>';
	$mail->Body.='<td>'.$empemail.'</td>';
	$mail->Body.='<td>'.$process.'</td>';
	$mail->Body.='<td>'.$desigtn.'</td>';
	$mail->Body.='<td>'.$reporting.'</td>';
	$mail->Body.='<td>'.html_entity_decode($opids).html_entity_decode($itismsids).html_entity_decode($adminids).html_entity_decode($tainerids).html_entity_decode($externalids).'</td>';
	$mail->Body.='<td>To be filled by IT Dept:</td>';
	$mail->Body.='</tr>';
	$mail->Body.='</table>';
	$mail->Body.='<br><br>';
	$mail->Body.='<br><br>';
	$mail->Body.='Thank you!';
	break;


}
$type = $_GET['type'];
switch($type)
{
	case "aarti.dogra@silaris.in":
	$mail->addAddress('isms@silaris.in', 'Tanay Dobhal');
	$mail->addCC($fuemail,$funame);
	$mail->addCC($semail,$suser);
	$mail->Subject = 'Email ID Creation Request';
	$mail->Body.= 'Hi, <br>Kindly login in http://isms.silaris.in & confirm the status of below mention employee to approve.<br><br>';
	$mail->Body.='<table border="1">';
	$mail->Body.='<tr>';
	$mail->Body.='<th>Employee_Name</th>';
	$mail->Body.='<th>Employee_ID</th>';
	$mail->Body.='<th>Process</th>';
	$mail->Body.='<th>Designation</th>';
	$mail->Body.='<th>Reporting</th>';
	$mail->Body.='<th>Suggested_Email</th>';
	$mail->Body.='</tr>';
	$mail->Body.='<tr>';
	$mail->Body.='<td>'.$empname.'</td>';
	$mail->Body.='<td>'.$empid.'</td>';
	$mail->Body.='<td>'.$depart.'</td>';
	$mail->Body.='<td>'.$design.'</td>';
	$mail->Body.='<td>'.$manager.'</td>';
	$mail->Body.='<td>'.$suggestemail.'</td>';
	$mail->Body.='</tr>';
	$mail->Body.='</table>';
	$mail->Body.='<br><br>';
	$mail->Body.= $comment;
	$mail->Body.='<br><br>';
	$mail->Body.='Thank you!';
	$mail->send();
	break;
	case "isms@silaris.in":
	$mail->addAddress('email.support@silaris.in', 'Email Support');
	$mail->addCC($fuemail,$funame);
	$mail->addCC($semail,$suser);
	$mail->Subject = 'Email ID Creation Request';
	$mail->Body.= 'Hi, <br>Kindly login in http://isms.silaris.in & confirm the status of below mention employee to approve.<br><br>';
	$mail->Body.='<table border="1">';
	$mail->Body.='<tr>';
	$mail->Body.='<th>Employee_Name</th>';
	$mail->Body.='<th>Employee_ID</th>';
	$mail->Body.='<th>Process</th>';
	$mail->Body.='<th>Designation</th>';
	$mail->Body.='<th>Reporting</th>';
	$mail->Body.='<th>Suggested_Email</th>';
	$mail->Body.='</tr>';
	$mail->Body.='<tr>';
	$mail->Body.='<td>'.$empname.'</td>';
	$mail->Body.='<td>'.$empid.'</td>';
	$mail->Body.='<td>'.$depart.'</td>';
	$mail->Body.='<td>'.$design.'</td>';
	$mail->Body.='<td>'.$manager.'</td>';
	$mail->Body.='<td>'.$suggestemail.'</td>';
	$mail->Body.='</tr>';
	$mail->Body.='</table>';
	$mail->Body.='<br><br>';
	$mail->Body.= $comment;
	$mail->Body.='<br><br>';
	$mail->Body.='Thank you!';
	$mail->send();
	break;
	case "email.support@silaris.in":
	$mail->addAddress($semail, $suser);
	$mail->addCC($fuemail,$funame);
	$mail->Subject = 'Email ID Creation Request';
	$mail->Body.= 'Hi, <br>Kindly login in http://isms.silaris.in & confirm the status of below mention employee to approve.<br><br>';
	$mail->Body.='<table border="1">';
	$mail->Body.='<tr>';
	$mail->Body.='<th>Employee_Name</th>';
	$mail->Body.='<th>Employee_ID</th>';
	$mail->Body.='<th>Process</th>';
	$mail->Body.='<th>Designation</th>';
	$mail->Body.='<th>Reporting</th>';
	$mail->Body.='<th>Suggested_Email</th>';
	$mail->Body.='</tr>';
	$mail->Body.='<tr>';
	$mail->Body.='<td>'.$empname.'</td>';
	$mail->Body.='<td>'.$empid.'</td>';
	$mail->Body.='<td>'.$depart.'</td>';
	$mail->Body.='<td>'.$design.'</td>';
	$mail->Body.='<td>'.$manager.'</td>';
	$mail->Body.='<td>'.$suggestemail.'</td>';
	$mail->Body.='</tr>';
	$mail->Body.='</table>';
	$mail->Body.='<br><br>';
	$mail->Body.= $comment;
	$mail->Body.='<br><br>';
	$mail->Body.= 'Email ID Creation Successfully!';
	$mail->Body.='<br><br>';
	$mail->Body.='Thank you!';
	$mail->send();
	break;
}
