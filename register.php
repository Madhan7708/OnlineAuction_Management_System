<?php
include("db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Auction Management Systems</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
  <link href="style.css" rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
    integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD"
    crossorigin="anonymous" />
  <style>
    .container {
      margin-left: 50px;
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <div class="container">
    <form method="post" action="register.php" class="forms">
      <h1 class="text-white">User Signup Page</h1>
      <div class="mb-3">
        <i class="bi bi-person-square bg-white"></i>
        <label for="name" class="text-white">Name</label><br />
        <input type="text" name="name" placeholder=" Enter your name" />
      </div>

      <div class="mb-3">
        <i class=" bi bi-envelope bg-white"></i>
        <label for="mail" class="text-white">Mail</label><br />
        <input type="mail" name="mail" placeholder=" Enter your Mail" />
      </div>

      <div class="mb-3">
        <i class="bi bi-person-circle bg-white"></i>
        <label for="username" class="text-white">Username</label><br />
        <input
          type="text"
          name="username"
          placeholder=" Enter your Username" />
      </div>
      <div class="mb-3">
        <i class="bi bi-file-lock-fill bg-white"></i>
        <label for="pass" class="text-white">Password</label><br />
        <input
          type="password"
          name="pass"
          placeholder="Enter your Password" />
      </div>

      <button type="submit" class="bg-primary text-white">Login</button>
      <h4 id="one"><a href="index.php">Back to Login </a></h4>

    </form>
  </div>
</body>
<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
  crossorigin="anonymous"></script>
<script
  src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
  crossorigin="anonymous"></script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
  crossorigin="anonymous"></script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['username']) &&  isset($_POST['pass'])) {   // to declared the value of its each data items
    $name = $_POST['name'];  // assign values
    $mail = $_POST['mail'];  // assign value
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $names = mysqli_real_escape_string($conn, $name);  // to prevent the sql injection
    $email = mysqli_real_escape_string($conn, $mail);   // to prevent sql injection
    $users = mysqli_real_escape_string($conn, $user);
    $password = mysqli_real_escape_string($conn, $pass);
    if (empty($names) && empty($email) && empty($users) && empty($password)) {
      echo "missing user creditnals";
    } else {
      $sql = "INSERT INTO login (name,mail,username,password) VALUES ('$names','$email','$users','$password')";
      $result = mysqli_query($conn, $sql);
      if ($result == TRUE) {
        echo "Register Success";
      } else {
        echo "invalid register";
      }
    }
  }
}
?>


</html>