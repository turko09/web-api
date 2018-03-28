<?php
$conn=mysqli_connect("localhost","root","");
$db=mysqli_db("cmsc_team_alpha");


$url = 'spill.json'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$vals = json_decode($data); // decode the JSON feed

$rider_firstname=$vals[0]->rider_firstname;
$rider_lastname=$vals[0]->rider_lastname;
$rider_email=$vals[0]->rider_email;
$rider_password=$vals[0]->rider_password;
$rider_address=$vals[0]->rider_address;
$rider_mobile=$vals[0]->rider_mobile;
$rider_pmobile=$vals[0]->rider_mobile;
$datecreated=date("Y-m-d H:i:s");

$checkexisting=mysqli_query($conn, "SELECT email,mobile,panicmobile FROM tbl_rider WHERE email LIKE '$rider_email'
|| email LIKE '$rider_mobile' || panicmobile LIKE '$rider_pmobile'");
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
$qrys=mysqli_query($conn, "INSERT INTO tbl_rider VALUES('','$rider_firstname','$rider_lastname',
'$rider_email','$rider_password','$rider_address','$rider_mobile','$rider_panicmobile',
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

?>
