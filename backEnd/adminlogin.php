<?php
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

        $sql = "SELECT * from 180b_users where user_id = '$user_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password']) && $row['email'] == $email) {
            echo "Logged in";
        }
        else {
            header('Location: authenticate.php');
        }

    } else {
        header('Location: authenticate.php');
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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
    </head>
    <body>
        <div class="centered">
            <section>
                <form id="login" action="adminhome.php" method="post">


                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <input id="user_id" name="user_id" type="number" class="form-control" placeholder="Enter AdminID">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" id="email" name="email" type="text" placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <input  class="form-control" id="password" name="password" type="password" placeholder="Enter Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" style="width:100%">Login </button>
                        <!-- <label>Don't have an account? Click <a href="registration.php">Here</a> to signup</label> -->

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
