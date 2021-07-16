
<?php
	$servername = "us-cdbr-east-03.cleardb.com";
$username = "b474b95ea4f970";
$password = "46b36be7";
$db = "heroku_989d675bc42ca01";
$conn = new mysqli($servername, $username, $password, $db);

$loginusername = $_SESSION['name'];


$startdate = $_POST["startdate"];
$enddate = $_POST["enddate"];

echo "<head>
<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
	<title></title>
	<style>
		.centered {
  position: fixed;
  top: 50%;
  left: 50%;
  margin-top: -50px;
  margin-left: -100px;
}
.hero-image {
  background-image: url(\"/images/shipping.jpeg\");
  background-color: #cccccc;
  height: 180px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
.heading {
    text-align: center;
    background-color: cadetblue;
    padding: 5px;
    margin: 3px;
    color: white;
}
	</style>
</head>";
echo '<body style="overflow-x:none">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">
            Shipping Port
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#">
                  Home 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                
                </a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">
                <?php
                echo "Hi " .$loginusername." ";
                ?>

                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:40px">Shipping Port Management System</h1>
  </div>
</div>';
echo "Start Date: ".$startdate."<br>";
echo "End Date: ".$enddate."<br>";


if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$Id = 3;
$port = 3;

$sql= "select Port_number, coalesce (count(*),0) as Total_ships,coalesce(sum(No_of_Containers),0) as Total_containers
						from SHIPS
						where DATE(Arrival_Date) >=  '".$startdate."' and DATE(Departure_Date) <= '".$enddate."' and Id ='".$Id."'
								and Number in (select Number from SHIPS_Operating_Seq where Operating_Seq like 'AU%')
						group by Port_number;";

 $sql1 ="select Port_number,count(*) as Total_ships,sum(No_of_Containers) as Total_containers
					from SHIPS
					where DATE(Arrival_Date) >= '".$startdate."' and DATE(Departure_Date) <= '".$enddate."'
							and Number in (select Number from SHIPS_Operating_Seq where Operating_Seq like 'AL%') and Id ='".$Id."'
					group by Port_number;";

//$sql = "select * from country";

//$row1 = $result1->fetch_assoc();

// echo $result1;

echo "Export Table"."<br>";
echo "<table border='1' class='table border'>
    <tr>
    <th>Port Number</th>
    <th>Total Ships Export</th>
		<th>Total Containers Export</th>

    </tr>";
    $result1 = mysqli_query($conn, $sql1);
		if($result = mysqli_query($conn, $sql))
         {
             if((mysqli_num_rows($result) > 0)){

                 while( $row = $result->fetch_assoc()) {
						       echo "<tr>";
						      // echo "<td>". $row["Name"] . "</td>";
						       echo "<td>". $row["Port_number"] . "</td>";
						       echo "<td>". $row["Total_ships"] . "</td> " ;
									 echo "<td>". $row["Total_containers"] . "</td> " ;
									 // echo "<td>". $row1["Total_ships"] . "</td> " ;
									 // echo "<td>". $row1["Total_containers"] . "</td> " ;

						       echo "</tr>";
						 }
         }
				 else {
					 echo "<tr>";
					// echo "<td>". $row["Name"] . "</td>";
					 echo "<td>". $port. "</td>";
					 echo "<td>". "0" . "</td> " ;
					 echo "<td>". "0". "</td> " ;
					 // echo "<td>". $row1["Total_ships"] . "</td> " ;
					 // echo "<td>". $row1["Total_containers"] . "</td> " ;
					 echo "</tr>";
				 }
			 }
   else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

echo "</table>"."<br>";

echo "Import Table"."<br>";

echo "<table border='1' class='table bordered'>
    <tr>
    <th>Port Number</th>
		<th>Total Ships Import</th>
		<th>Total Containers Import</th>

    </tr>";
    //$result1 = mysqli_query($conn, $sql1);
		if($result1 = mysqli_query($conn, $sql1))
         {
             if(( mysqli_num_rows($result1) > 0)){

                 while($row1 = $result1->fetch_assoc()) {
									 // echo $row;
						       echo "<tr>";
						       // echo "<td>". $row["Id"] . "</td>";
									 // echo "<td>". $row["Name"] . "</td>";
						       echo "<td>". $row1["Port_number"] . "</td>";
						       // echo "<td>". $row["Total_ships"] . "</td> " ;
									 // echo "<td>". $row["Total_containers"] . "</td> " ;
									 echo "<td>". $row1["Total_ships"] . "</td> " ;
									 echo "<td>". $row1["Total_containers"] . "</td> " ;

						       echo "</tr>";
             }
         }
				 else {
					 echo "<tr>";
					// echo "<td>". $row["Name"] . "</td>";
					 echo "<td>". $port. "</td>";
					 echo "<td>". "0" . "</td> " ;
					 echo "<td>". "0". "</td> " ;
					 // echo "<td>". $row1["Total_ships"] . "</td> " ;
					 // echo "<td>". $row1["Total_containers"] . "</td> " ;
					 echo "</tr>";
				 }

			 }
   else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

echo "</table>";


echo '</body>';
















?>
