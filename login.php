<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login - Project Approval System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/registrationForm.css">
</head>

<body>

  <div class="container">
    <h1 class="text-center">Welcome to Project Approval System</h1>
    <h4 class="text-center">(Made by students of Kashmir University - South Campus)</h4><br /><br />

    <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="loginForm">
      <div class="col-md-6">

        <div class="form-group">
          <label class="col-md-12" for="email">Email</label>
          <div class="col-md-12">
            <input type="text" class="form-control" id="email" placeholder="Enter your email" name="email">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12" for="password">Password</label>
          <div class="col-md-12">
            <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12 text-left">
            <button type="submit" class="btn btn-primary submit pull-left " name="submit" value="submit">Login</button>
          </div>
        </div>
      </div>
    </form>

    <div class="form-group">
      <div class="col-md-12 strong">
        <span class='strong'>New User?</span><button class="btn-link" onClick="registerNow()">Register here</button>
      </div>
      <div class="col-md-12 strong">
        <span class='strong'></span><button class="btn-link" onClick="back_home()">Back To Home Page</button>
      </div>
    </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/formSubmit.js"></script>

  <script>
    function registerNow() {
      window.location.assign("register.php");
    }
  </script>
   <script>
    function back_home() {
      window.location.assign("index.html");
    }
  </script>


</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include 'connect.php';

  if (isset($_POST["email"]) && test_input($_POST["email"]) != '') {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      die("Invalid email format");
    }
  } else {
    die("Enter valid email");
  }

  if (isset($_POST["password"]) && test_input($_POST["password"]) != '') {
    $password = test_input($_POST["password"]);
    $password=md5($password);
  } else {
    die("Enter valid password");
  }
  $sql = "SELECT * FROM users WHERE email= '$email' AND password ='$password'";
  $result = $conn->query($sql);
  if ($result->num_rows != 0) {
    $row = $result->fetch_assoc();
    if ($row["approved"] == 1) {
      header("location: index.php");
    } else {
      die("Attention. Your approval is pending. Try again later.");
    }
  } else {
    die("Invalid username or password");
  }

  $conn->close();

}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function alert($message)
{
  echo '<script>alert("' . $message . '")</script>';
}

?>