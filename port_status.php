<?php

function sharesPort($country_id)
{
    $servername = "us-cdbr-east-03.cleardb.com";
 	$username = "b474b95ea4f970";
 	$password = "46b36be7";
 	$db = "heroku_989d675bc42ca01";
 	$conn = new mysqli($servername, $username, $password, $db);

 	if ($conn->connect_error){
 		die("Connection failed: ". $conn->connect_error);
 	}

 	//Check for shared port
     $sql = "select * from shares where (Id='$country_id')";

     if($result = mysqli_query($conn, $sql))
     {
        if(mysqli_num_rows($result) > 0)
        {
            return True;
        }
        else return False;
     }
     else
     {
        echo "Error: " . $sql . "<br>" . $conn->error;
     }
}

function checksharedPort($country_id)
 {
 	$servername = "us-cdbr-east-03.cleardb.com";
 	$username = "b474b95ea4f970";
 	$password = "46b36be7";
 	$db = "heroku_989d675bc42ca01";
 	$conn = new mysqli($servername, $username, $password, $db);

 	if ($conn->connect_error){
 		die("Connection failed: ". $conn->connect_error);
 	}

 	//Check for shared port
     $sql = "select * from shares where (Id='$country_id')";
     $sts;

     $result = $conn->query($sql);

        if($result->num_rows > 0)
         {
             //echo "Country shares port ".$result;
             //Country shares other port

             $pn;

             while($row = mysqli_fetch_array($result))
             {

                 $pn = $row['Port_Number'];
             }

             $sql = "select * from ports where (Port_Number = '$pn')";

             if($result = mysqli_query($conn, $sql))
             {
                 //Shared port available
                 while($row = mysqli_fetch_array($result))
                 {
                     $sts = $row['Status'];
                 }

                 return $sts;
             }
         }

         else
         {
            echo "Error: " . $sql . "<br>" . $conn->error;
         }

 }

?>
