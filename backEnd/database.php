<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

    <a href="index.php">Home</a>
    <br>
    <br>

    <?php

    include 'test.php';
    include 'port_status.php';

    $servername = "us-cdbr-east-03.cleardb.com";
    $username = "b474b95ea4f970";
    $password = "46b36be7";
    $db = "heroku_989d675bc42ca01";
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error){
       die("Connection failed: ". $conn->connect_error);
   }

   if(isset($_POST['update']))
   {
    //$user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
		$cname = mysqli_real_escape_string($conn, $_REQUEST['cname']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $hash = password_hash($password, PASSWORD_DEFAULT);

    if($name != NULL and $email != NULL and $password != NULL)
    {
        $sql = "INSERT INTO users_180b (name, email, password,Country) VALUES
                ('$name', '$email', '$hash', '$cname')";

        if(mysqli_query($conn, $sql))
        {
            $sql = "select user_id from users_180b where (name='$name' and email='$email' and password='$hash')";

            if($result = mysqli_query($conn, $sql))
            {
                $id;
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        // Store the from country Id
                        $id = $row[0];
                    }
                }

                echo $name." with user id ".$id." added successfully\n";
            }
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else
    {
        echo "Please fill all the details!!!";
    }


}


else if(isset($_POST['submit']))
{
    $from = mysqli_real_escape_string($conn, $_REQUEST['from']);
    $to = mysqli_real_escape_string($conn, $_REQUEST['to']);
    $shipno = mysqli_real_escape_string($conn, $_REQUEST['shipno']);
    $ship_name = mysqli_real_escape_string($conn, $_REQUEST['shipname']);
    $arr_date = mysqli_real_escape_string($conn, $_REQUEST['arrdate']);
    $dep_date = mysqli_real_escape_string($conn, $_REQUEST['depdate']);
    $trade = mysqli_real_escape_string($conn, $_REQUEST['trade']);
    $exp_code = mysqli_real_escape_string($conn, $_REQUEST['expcode']);
    $imp_code = mysqli_real_escape_string($conn, $_REQUEST['impcode']);

    $exp_array = explode(",",str_replace(" ", "", $exp_code));
    $imp_array = explode(",",str_replace(" ", "", $imp_code));



    // print_r($exp_array);
    // print_r($imp_array);

    $sql = "select Id from country where (Name='$from')";
    $send;
    $port_no;
    $receive;

    function insertShipDetails()
    {
        global $send, $assign_port, $imp_array, $exp_array,$trade, $shipno,$arr_date,$dep_date,$ship_name,$conn,$port_no;
        if($trade == 'import')
        {
            $noc = count($imp_array);
            $sql = "insert into ships values ('$shipno','$arr_date','$dep_date','AU','$ship_name','$noc',
            '$send', '$port_no')";

           if(mysqli_query($conn, $sql))
                {
                    $sql = "insert into ships_operating_seq values ('AU-PU-PL-DL-Done', '$shipno', '$send')";

                    if(mysqli_query($conn, $sql))
                    {
                        echo "<br>"."Ship (import) details updated successfully";
                    }
                    else
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }


        }
        else if($trade == 'export')
        {
            $noc = count($exp_array);
            $sql = "insert into ships values ('$shipno','$arr_date','$dep_date','AL','$ship_name','$noc',
            '$send', '$port_no')";

           if(mysqli_query($conn, $sql))
                {
                    $sql = "insert into ships_operating_seq values ('AL-PL-PU-DU-Done', '$shipno', '$send')";

                    if(mysqli_query($conn, $sql))
                    {
                        echo "<br>"."Ship (export) details updated successfully";
                    }
                    else
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }


        }

        else
        {
            $noc_imp = count($imp_array);
            $noc_exp = count($exp_array);
            $sql = "insert into ships values ('$shipno','$arr_date','$dep_date','AL','$ship_name','$noc_exp',
            '$send', '$port_no')";

            if(mysqli_query($conn, $sql))
                {
                    $sql = "insert into ships_operating_seq values ('AU-PU-PL-DL-Done', '$shipno', '$send')";

                    if(mysqli_query($conn, $sql))
                    {
                        echo "<br>"."Ship (import) details updated successfully";
                    }
                    else
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $sql = "insert into ships_operating_seq values ('AL-PL-PU-DU-Done', '$shipno', '$send')";

                    if(mysqli_query($conn, $sql))
                    {
                        echo "<br>"."Ship (export) details updated successfully";
                    }
                    else
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
    }

    function insertReq()
    {
        global $from, $to, $shipno, $arr_date, $dep_date, $trade, $exp_code, $imp_code, $conn, $imp_array, $assign_port;

        $req_sts = True;

        if($trade == 'import')
        {
            foreach($imp_array as $value)
            {
                $sql = "select * from container where (Transit_code = '$value')";

                $result = $conn->query($sql);

                if ($result->num_rows > 0)
                {

                }
                else
                {
                    echo "<br>"."Please Porvide Correct Import Code";
                    $req_sts = False;
                    break;
                }
            }

            if($req_sts)
            {
                $sql = "insert into request (From_Country, To_Country, Ship_Number, Arrival_Date, Departure_Date,
                                            Trade_Type, Status)
                        values ('$from','$to','$shipno','$arr_date','$dep_date','$trade', 'New')";

                    if(mysqli_query($conn, $sql))
                    {
                        echo "Request Accepted Successfully\n";

                        insertShipDetails();
                    }
                    else
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
            }

        }
        else if($trade == 'both')
        {

            foreach($imp_array as $value)
            {
                $sql = "select * from container where (Transit_code = '$value')";

                $result = $conn->query($sql);

                if ($result->num_rows > 0)
                {

                }
                else
                {
                    echo "<br>"."Please Porvide Correct Import Code";
                    $req_sts = False;
                    break;
                }
            }

            if($req_sts)
            {
                $sql = "insert into request (From_Country, To_Country, Ship_Number, Arrival_Date, Departure_Date,
                                            Trade_Type, Status)
                        values ('$from','$to','$shipno','$arr_date','$dep_date','$trade', 'New')";

                    if(mysqli_query($conn, $sql))
                    {
                        echo "Request Accepted Successfully\n";

                        insertShipDetails();
                    }
                    else
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
            }

        }

        else
        {
            $sql = "insert into request (From_Country, To_Country, Ship_Number, Arrival_Date, Departure_Date,
                                            Trade_Type, Export_Code, Status)
                        values ('$from','$to','$shipno','$arr_date','$dep_date','$trade','$exp_code','New')";

            if(mysqli_query($conn, $sql))
            {
                echo "Request Accepted Successfully\n";

                insertShipDetails();
            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

    }

    // Search for 'from' country Id
    if($result = mysqli_query($conn, $sql))
    {
        if(mysqli_num_rows($result) > 0)
        {

            while($row = mysqli_fetch_array($result))
            {
                // Store the from country Id
                $send = $row['Id'];
            }

            $sql = "select Id from country where (Name='$to')";

            //Search for 'to' country Id
            if($result = mysqli_query($conn, $sql))
            {
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        //Store the 'to' country Id
                        $receive = $row['Id'];
                    }

                    $sql = "select * from trade where ((Id_1='$send' and TRADEId_2='$receive') or (Id_1='$receive' and TRADEId_2='$send'))";

                    //Check for trade agreement
                    if($result = mysqli_query($conn, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                            //Trade Deal Exists

                           $sql = "select Port_Number from ports where (Id='$send')";

                           //Check wheter 'from' country owns a port or not
                           if($result = mysqli_query($conn, $sql))
                           {
                               if(mysqli_num_rows($result) > 0)
                                {
                                    //Owner Country
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $port_no = $row['Port_Number'];
                                    }

                                    updatePortStatus($port_no);

                                    $sql = "select Status from ports where (Port_Number ='$port_no')";

                                    $status;

                                    //Check port status
                                    if($result = mysqli_query($conn, $sql))
                                    {
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $status = $row['Status'];
                                            }

                                            if($status == 'AV')
                                            {
                                                insertReq();
                                            }

                                            else if($status == 'NA')
                                            {
                                                if(sharesPort($send))
                                                {
                                                    if(checksharedPort($send) == 'AV')
                                                    {
                                                        echo "own port NA but shared port AV";
                                                    }
                                                    else
                                                    {
                                                        echo "own port NA and shared port also NA";
                                                    }
                                                }
                                                else
                                                {
                                                    echo "own port NA and doesn't share port";
                                                }
                                            }

                                            else
                                            {
                                                echo "trade ".$trade;
                                                if($trade == 'import')
                                                {
                                                    insertReq();
                                                }
                                                else
                                                {
                                                    if(sharesPort($send))
                                                    {
                                                        if(checksharedPort($send) == 'AV')
                                                        {
                                                            echo "own port AS but shared port AV";
                                                        }
                                                        else if(checksharedPort($send) == 'AS')
                                                        {
                                                            echo "own port AS and shared port also AS";
                                                        }
                                                        else
                                                        {
                                                            echo "own port AS and shared port NA";
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "own port AS and doesn't share port";
                                                    }
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }
                                    }

                                    else
                                    {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                }

                                else
                                {

                                    if(sharesPort($send))
                                    {
                                        if(checksharedPort($send) == 'AV')
                                        {
                                            echo "Shared port Available";
                                        }
                                        else{
                                            echo "Shared port not available";
                                        }
                                    }
                                    else
                                    {
                                        echo "Country doesn't share port";
                                    }
                                }
                            }

                            else
                            {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }

                       else
                        {
                            echo "No Trade Agreement- Request Rejected";
                        }
                    }
                    else
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                else
                {
                    echo "Invalid 'to' country name";
                }

            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        else
        {
            echo "Invalid 'from' Country Name";
        }
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>

</body>
</html>
