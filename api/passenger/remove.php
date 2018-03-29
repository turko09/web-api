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
	
$id=$vals->id;
//delete query
$deletequery=mysqli_query($conn, "DELETE FROM passenger WHERE id = $id LIMIT 1");

	if(!$deletequery)
	{
		header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('message' => 'Query Error'));
		
	}
	else
	{
	header('HTTP/1.1 201 Created');
    echo json_encode(array('message' => 'Successfully deleted the account', 'passengerId' => $passenger->id));
	}
}
}
}

?>
