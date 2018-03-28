<?php
$conn=mysqli_connect("localhost","root","");
$db=mysqli_db("cmsc_team_alpha");


$url = 'php://input'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$vals = json_decode($data); // decode the JSON feed

if(is_null($vals))
{
	 header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('message' => 'No contents to process'));
	
}
else{
$firstname=$vals->firstname;
$lastname=$vals->lastname;
$email=$vals->email;
$password=$vals->password;
$address=$vals->address;
$mobile=$vals->mobile;
$pmobile=$vals->panicmobile;
$datecreated=date("Y-m-d H:i:s");

$checkexisting=mysqli_query($conn, "SELECT email,mobile,panicmobile FROM tbl_rider WHERE email LIKE '$email'
|| email LIKE '$mobile' || panicmobile LIKE '$pmobile'");
if(mysqli_num_rows($checkexisting)>0)
{
	 header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('message' => 'Email Or mobile used is currently registered try using another.'));
}
else{

if(count(json_decode($data,1))==0) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('message' => 'Passenger details are empty.'));
}
else{
//Insert Query
$qrys=mysqli_query($conn, "INSERT INTO tbl_rider VALUES('','$firstname','$lastname',
'$email','$password','$address','$mobile','$panicmobile',
'0','0','0','tokens',
,'picture2','$datecreated','')");

	if($qrys)
	{
		header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('message' => 'Query Error'));
		
	}
	else
	{
	header('HTTP/1.1 201 Created');
    header('Location: /api/passenger/get.php?id=' . $passenger->id);
    echo json_encode(array('message' => 'Passenger record created.', 'passengerId' => $passenger->id));
	}
}
}
}

?>
