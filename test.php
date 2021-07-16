 <?php

function updatePortStatus($port_no)
 {
 	$servername = "us-cdbr-east-03.cleardb.com";
 	$username = "b474b95ea4f970";
 	$password = "46b36be7";
 	$db = "heroku_989d675bc42ca01";
 	$conn = new mysqli($servername, $username, $password, $db);

 	if ($conn->connect_error){
 		die("Connection failed: ". $conn->connect_error);
 	}
    
 	$sql = "select count(*) from ships where (Port_Number = '$port_no')";

 	$ships;
 	$containers;

 	if($result = mysqli_query($conn, $sql))
 	{
 		if(mysqli_num_rows($result) > 0)
 		{
 			while($row = mysqli_fetch_array($result))
 			{
 				//Number of ships present
 				$ships = $row[0];
 			}

 		}
 	}

 	$sql = "select count(*) from container where (Port_Number = '$port_no')";

 	if($result = mysqli_query($conn, $sql))
 	{
 		if(mysqli_num_rows($result) > 0)
 		{
 			while($row = mysqli_fetch_array($result))
 			{
 				//Number of ships present
 				$containers = $row[0];
 			}

 		}
 	}

 	$sql = "select * from ports where (Port_Number = '$port_no')";

 	$max_cont;
 	$max_ships;

 	if($result = mysqli_query($conn, $sql))
 	{
 		if(mysqli_num_rows($result) > 0)
 		{
 			while($row = mysqli_fetch_array($result))
 			{
 				//Number of ships present
 				$max_cont = $row['Max_Container_Capacity'];
 				$max_ships = $row['Max_No_of_Ships'];
 			}

 		}
 	}

 	echo "ships: ".$ships."<br>"." Containers: ".$containers;

	 if($ships >= $max_ships)
 	{
 		$sql = "UPDATE ports SET Status = 'NA' WHERE Port_Number = '$port_no'";
 	}

 	else if($containers >= $max_cont)
 	{
 		$sql = "UPDATE ports SET Status = 'AS' WHERE Port_Number = '$port_no'";
 	}

 	else
 	{
 		$sql = "UPDATE ports SET Status = 'AV' WHERE Port_Number = '$port_no'";
 	}




 	// if($containers < $max_cont and $ships < $max_ships)
 	// {
 	// 	$sql = "UPDATE ports SET Status = 'AV' WHERE Port_Number = '$port_no'";
 	// }

 	// else if($containers >= $max_cont and $ships >= $max_ships)
 	// {
 	// 	$sql = "UPDATE ports SET Status = 'NA' WHERE Port_Number = '$port_no'";
 	// }

 	// else if($ships < $max_ships)
 	// {
 	// 	$sql = "UPDATE ports SET Status = 'AS' WHERE Port_Number = '$port_no'";
 	// }

 	if(mysqli_query($conn, $sql))
    {
       echo "Status Updated Successfully\n";
	}
   
   else
   {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }

 }

// $port = 3;

// updatePortStatus($port);

?>