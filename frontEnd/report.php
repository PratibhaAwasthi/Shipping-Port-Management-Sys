<style>
table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50 !important;
  color: white;
}
</style>


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
echo "<h4> Start Date: ".$startdate." </h4>";
echo "<h4> End Date: ".$enddate."</h4>";


if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}


$sql = "select c.Id as Id,c.Name as Name,Port_Number,count(*) as Total_ships,sum(No_of_Containers) as Total_containers
            from SHIPS s
						join COUNTRY c on
						s.Id =c.Id
            where DATE(Arrival_Date) >= '".$startdate."' and DATE(Departure_Date) <= '".$enddate."'
            group by c.Id,c.Name,Port_number; ";


echo "<h4> Port Report </h4>";
//$sql = "select * from country";

echo "<table border='1' class='table'>
    <tr>
    <th>Country ID</th>
		<th>Ship Owner</th>
    <th>Port Number</th>
    <th>Total Ships</th>
		<th>Total Containers</th>
    </tr>";

		if($result = mysqli_query($conn, $sql))
         {
             if(mysqli_num_rows($result) > 0){

                 while($row = $result->fetch_assoc()) {
						       echo "<tr>";
						       echo "<td>". $row["Id"] . "</td>";
									 echo "<td>". $row["Name"] . "</td>";
						       echo "<td>". $row["Port_Number"] . "</td>";
						       echo "<td>". $row["Total_ships"] . "</td> " ;
									 echo "<td>". $row["Total_containers"] . "</td> " ;
						       echo "</tr>";
             }
         }
			 }
   else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

echo "</table>";

echo '</body>';
?>
