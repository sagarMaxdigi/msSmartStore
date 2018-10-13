<?php
	include_once("connection.php");
	
	extract($_POST);
	
	
if($_POST["submit"]=="Save Details")
{
	$q="insert into teachers(teacher_fullname,teacher_lastname,teacher_birthdate,teacher_gender,teacher_addr1,teacher_addr2,teacher_city,teacher_zip,teacher_contact, teacher_email,teacher_edu,teacher_exp,teacher_subjects,teacher_classes,teacher_areas,teacher_passport,teacher_idproof) values('$fullname', '$lastname', '$birthdate', '$gender', '$addr1', '$addr2', '$city', '$zip', '$contact', '$email', '$edu','$exp', '$subjects', '$classes', '$areas', '$passport_filename', '$idproof_filename')";
	
	$res=mysqli_query($con,$q);
	
	if(mysqli_affected_rows($con)>0)
	{
		header("location:teacherresponse.php?saved=true");
	}
	else
	{
		header("location:teacherresponse.php?saved=false&err=5");
	}
}
else
{
	header("location:teacherresponse.php?saved=false&err=0");
}
?>