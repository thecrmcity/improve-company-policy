<?php
if(isset($_GET['case']))
{
	$case = $_GET['case'];
	switch($case)
	{
		case "ccrdwnld":
		if(isset($_GET['ids']))
		{
			$ids = $_GET['ids'];
			$table = "pslv_ccrmdata";
			$cond = array(
				'pslv_srno' => $ids,
				'pslv_status' => '1'
			);
			$ret = $crmod->getOnerowdata($table,$cond);
			header('Content-type:application/vnd-ms-words');
			$filename = $ret['pslv_ccrno']."_ccrm.doc";
			header("Content-Disposition:attachment;filename=\"$filename\"");
			?>
			
			<table border='1' style="width:100%">
			<tr>
				<th>Priority</th>
				<th>CCR Number</th>
				<th>CCR Date & Time</th>
				<th>Type of Change</th>
				
			</tr>
			
			<tr>
				<td><?php echo $ret['pslv_priority'];?></td>
				<td><?php echo $ret['pslv_ccrno'];?></td>
				<td><?php echo $ret['pslv_ccrdate'];?></td>
				<td><?php echo $ret['pslv_typeofchange'];?></td>
				

			</tr>
			</table>
			<br>
		
			<table style="width:100%" border="1">
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Location</td>
					<td><?php echo $ret['pslv_location'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Description of Change</td>
					<td><?php echo $ret['pslv_description'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Nature of Change</td>
					<td><?php echo $ret['pslv_natureofchange'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Start Date & Time</td>
					<td><?php echo $ret['pslv_startdate'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Expected Date & Time</td>
					<td><?php echo $ret['pslv_expectedate'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Information Security Impact</td>
					<td><?php echo $ret['pslv_ismsimpact'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Possible Impact Detail</td>
					<td><?php echo $ret['pslv_possibleimpact'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Security Impact Approved By</td>
					<td><?php echo $ret['pslv_ismsapprove'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Purpose for the changes</td>
					<td><?php echo $ret['pslv_purposechange'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Process Owner</td>
					<td><?php echo $ret['pslv_processowner'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Owner</td>
					<td><?php echo $ret['pslv_owner'];?></td>
				</tr>
			</table>
			<br>

			<table style="width:100%">
				<tr style="padding:2px 0px 2px 2px;">
					<td><?php echo $ret['pslv_fulldetails'];?></td>
				</tr>
			</table>
			<br>
			<table style="width:100%" border="1">
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Will this change cause an outage to customer/business?</td>
					<td><?php echo $ret['pslv_custmbusiness'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Regression procedure (In case of failure due to changes made)</td>
					<td><?php echo $ret['pslv_regression'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Required time to back out</td>
					<td><?php echo $ret['pslv_backout'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Potential Impact if the change fails</td>
					<td><?php echo $ret['pslv_potenial'];?></td>
				</tr>
				<tr style="padding:2px 0px 2px 2px;">
					<td style="font-weight:bold">Proposed change conflicting with any other planned change for the same day</td>
					<td><?php echo $ret['pslv_conflicting'];?></td>
				</tr>
			</table>
			<br>
			<hr>
			<table style="width:100%">
					<tr style="text-align:center">
					<td>Silaris Informations Pvt Ltd</td>
					
				</tr>
				<tr style="text-align:center">
					<td>14/3, Naraina Industrial Area Phase-II, Naraina New Delhi-110028</td>
				</tr>	
			</table>
			
				<?php
			}
										
		break;
	}
}

?>
