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

//Insert Query
$qrys=mysqli_query($conn, "INSERT INTO tbl_rider VALUES('','$rider_firstname','$rider_lastname',
'$rider_email','$rider_password','$rider_address','$rider_mobile','0','0','tokens','thumb','picture2')");



?>
