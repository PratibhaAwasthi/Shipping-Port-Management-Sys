<?php
session_start();
$name = null;
$email = null;
$password = null;

$servername = "us-cdbr-east-03.cleardb.com";
$username = "b474b95ea4f970";
$password = "46b36be7";
$db = "heroku_989d675bc42ca01";
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(!empty($_POST["user_id"]) && !empty($_POST["password"]) && !empty($_POST["email"])) {
        $password = $_POST["password"];
        $user_id = $_POST["user_id"];
        $email = $_POST["email"];

        $sql = "SELECT * from users_180b where user_id = '$user_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();


        if(password_verify($password, $row['password']) && $row['email'] == $email) {

            $_SESSION['country'] =  $row["Country"];
            $_SESSION['name'] = $row["name"];
            header('Location: home.php');
        }
        else {
            header('Location: index.php?status=Invalid Credentials');
        }

    } else {
        header('Location: index.php');
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Shipping Port</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
  </div>
</nav>
        <div>
            <section>
                <form id="login" method="post" action=home.php>


                <div class="row">
                    <div class="col-4 offset-4">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User Id</label>
                            <input id="user_id" name="user_id" type="number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input class="form-control" id="email" name="email" type="text"  aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input  class="form-control" id="password" name="password" type="password" >
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" style="width:100%">Login </button>

                    </div>
                </div>

                    <!-- <label for="user_id">User_ID:</label>
                    <input id="user_id" name="user_id" type="number" required>
                    <label for="email">Email:</label>
                    <input id="email" name="email" type="text" required>
                    <label for="password">Password:</label>
                    <input id="password" name="password" type="password" required>
                    <br />
                    <input type="submit" value="Login"> -->
                </form>
            </section>
        </div>
    </body>
</html>
<?php } ?>
