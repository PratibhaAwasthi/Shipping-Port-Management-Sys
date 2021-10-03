<?php
session_start();
$servername = "us-cdbr-east-03.cleardb.com";
$username = "b474b95ea4f970";
$password = "46b36be7";
$db = "heroku_989d675bc42ca01";
$conn = new mysqli($servername, $username, $password, $db);

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
						<h1 style="font-size:40px">Export/Import Report</h1>
					  </div>
					</div>';


if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$c_id =$_SESSION['country'] ;
//echo $c_id;
$ship_no = $_POST['shipnumber'];
//echo $ship_no ;
$sql_c= " select Id from COUNTRY where Name = '".$c_id."'";
$id_res = mysqli_query($conn, $sql_c);
$r = $id_res->fetch_assoc();

$Id=$r["Id"];

//echo $Id;
$sql_p= "select Curr_Status,Name from SHIPS where Id = '".$Id."' and Number = '".$ship_no."' ";
$p_res = mysqli_query($conn, $sql_p);
$p = $p_res->fetch_assoc();
$status=$p["Curr_Status"];
$shipname=$p["Name"];


if ($status == "AL"){
	echo "<br>"."<br>"." The ship  ".$shipname." current status is - Arrived Loaded ";
}
else if ($status == "AU"){
	echo "<br>"."<br>"." The ship  ".$shipname." current status is - Arrived Unloaded ";
}
else if ($status == "DL"){
	echo "<br>"."<br>"." The ship  ".$shipname." current status is - Departed Loaded ";
}
else if ($status == "DU"){
	echo "<br>"."<br>"." The ship  ".$shipname." current status is - Departed Unloaded ";
}
else if ($status == "PL"){
	echo "<br>"."<br>"." The ship  ".$shipname." current status is - Present Loaded ";
}
else if ($status == "PU"){
	echo "<br>"."<br>"." The ship  ".$shipname." current status is - Present Unloaded ";
}
else if ($status == "Done"){
	echo "<br>"."<br>"." The ship  ".$shipname." current status is - Done ";
}

else  {
	echo "<br>"."<br>"." Please check ship number ";
}




?>
