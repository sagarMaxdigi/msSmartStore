<?php
	session_start();
	//session_destroy();
	/*Array
	(
	    [recent_products] => Array
	        (
	        )

	    [last_refer] => https://mssmartstore.com/
	    [FBRLH_state] => c5f0abd4293e05a183b69ce51b196476
	    [member_id] => 10
	    [member_fname] => manoj
	    [member_lname] => gawale
	)*/


	unset($_SESSION['last_refer']);
	unset($_SESSION['FBRLH_state']);
	unset($_SESSION['member_id']);
	unset($_SESSION['member_fname']);
	unset($_SESSION['member_lname']);
	
	header("location:index.php");	
?>

