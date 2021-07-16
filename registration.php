<!DOCTYPE html>
<html>
<head>
<style>
		.centered {
  transform: translate(65%, 90%);
}
body {
  background: url(images/home.jpeg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
	</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
<form method = "post" action = "database.php">
   <div class="row centered">
      <div class="col-4">
         <div class="mb-3">
               <input id="name" name="name" type="text" class="form-control" placeholder="Enter Name">
         </div>
				 <div class="mb-3">
               <input id="cname" name="cname" type="text" class="form-control" placeholder="Enter Country Name">
         </div>
         <div class="mb-3">
               <input class="form-control" id="email" name="email" type="text"  aria-describedby="emailHelp" placeholder="Enter Email">
         </div>
         <div class="mb-3">
               <input  class="form-control" id="password" name="password" type="password" placeholder="Enter Password">
         </div>
         <input name = "update" type = "submit" id = "update" value = "Register" class="btn btn-primary btn-block" style="width:100%">
         <label>Already have an account? Click <a href="index.php">Here</a> to login</label>
      </div>
   </div>
               </form>

</body>
</html>
