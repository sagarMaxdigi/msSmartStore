<?php
	//include_once("checksession.php");
	include_once("../connection.php");
	//include_once("../functions.php");
	if(isset($_POST))
	{
		extract($_POST);
		//{type: "year", fromDate: "2018-09-07", table: "store", month: "09", year: "2018", …}
		if($table == 'store')
		{
			$rep = mysqli_query($con,"CALL report('".$type."','".$fromDate."','".$toDate."','".$month."','".$year."')");
			$data = array();
			while ($row = mysqli_fetch_assoc($rep)) {
			$data[] = $row;
			}
		}
		else
		{
			$rep = mysqli_query($con,"CALL reportEnq('".$type."','".$fromDate."','".$toDate."','".$month."','".$year."','".$_POST['sid']."')");
			$data = array();
			while ($row = mysqli_fetch_assoc($rep)) {
			$data[] = $row;
			}
		}
		
		

		

	    echo json_encode($data);
	}
	
?>