
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
    <style>
        .rowdata{
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Php Login System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="rowdata" >
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "login";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if(!$conn) {
	die("Unable to connect");
}
if($_POST) {
	$uname = $_POST["username"];
	$pass = $_POST["password"];
	//Making sure that SQL Injection doesn't work
	$uname = mysqli_real_escape_string($conn, $uname);//test or 1=1
	$pass = mysqli_real_escape_string($conn, $pass);
	$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1) {
        echo "Welcome to Home , ";
        while ($row = mysqli_fetch_row($result)) {
            printf ("%s !",$row[1]);
          }
	} else if(mysqli_num_rows($result) == 0){
		echo "Incorrect Username/Password";
	}
}
?>
</div>

<div class="container mt-4">
<h3>Please Login Here:</h3>
<hr>
<form action method="POST" autocomplete="off">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	<!-- <form action method="POST" autocomplete="off">
		<input type="text" name="username" placeholder="Username" /><br />
		<input type="password" name="password" placeholder="********" /><br />
		<input type="submit" name="login" value="LOGIN" />
	</form> -->
</div>
<div class="rowdata" >

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "login";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if(!$conn) {
	die("Unable to connect");
}
if($_POST) {
	$uname = $_POST["username"];
	$pass = $_POST["password"];
	//Making sure that SQL Injection doesn't work
	$uname = mysqli_real_escape_string($conn, $uname);//test or 1=1
	$pass = mysqli_real_escape_string($conn, $pass);
	$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 1) {
        while ($row = mysqli_fetch_row($result)) {
            printf("username : ");
            printf ("\n %s ",$row[1]);
            echo "<br>";
            printf("password : ");
            printf ("\n %s ",$row[2]);
            echo "<br>";
            echo "<br>";
          }
    }
}
?>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>