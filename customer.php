<?php 
$host="localhost";
$user="root";
$pass="";
$db="my_db";

$con=mysqli_connect($host,$user,$pass,$db);

if(!$con)
{
 die ("Could not connect:".mysqli_connect_error());
}
else{

	$fname=test_input($_POST['fn']);
	$lname=test_input($_POST['ln']);
	$age=test_input($_POST['ag']);
	$hmtwn=test_input($_POST['ht']);
	$jb=test_input($_POST['jb']);
	
$sql="INSERT INTO user(FirstName,LastName,Age,Hometown,Job) VALUES('$fname','$lname','$age','$hmtwn','$jb')";

if(mysqli_query($con,$sql)){
	echo "data entered successfully";
}else{
	echo "Failed to insert!!!";
}

mysqli_close($con);

}


function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

 ?>