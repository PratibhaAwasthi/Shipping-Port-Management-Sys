<?php
session_start();
$username = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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
  background-image: url("/images/shipping.jpeg");
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
</head>
<body>
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
                echo "Hi " .$username." ";
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
</div>
<div class="row">
   <div class="col-12 heading">
      <h4>Report</h4>
   </div>
   <div class="col-12 offset-4  mt-2">
   <form method = "post" action= redirect.php>
                  <table width = "400" border =" 0" cellspacing = "1"
                     cellpadding = "2">


                     <tr>
                        <td width = "100">Start Date</td>
                        <td><input name = "startdate" type = "Date" class="form-control"
                           id = "startdate"></td>
                     </tr>

                     <tr>
                        <td width = "100">End Date</td>
                        <td><input name = "enddate" type = "Date" class="form-control"
                           id = "enddate"></td>
                     </tr>
                
               <tr>
               <td width = "100">Report Type</td>
                <td><select name ="report_type" width = "100" class="form-control" >
                  <option value="Select">Select</option>
                  <option value="report_export_import">Export/Import Report</option>
                  <option value="report_tariff">Tariff Report</option>
                </select></td>
              </tr>
               <tr>
                  <td width = "100"> </td>
                  <td>
                     <button name = "submit" type = "submit" class="btn btn-primary"
                        id = "submit" >Submit</button>
                  </td>
               </tr>
            </table>
     </form>
   </div>
</div>

</body>
</html>
