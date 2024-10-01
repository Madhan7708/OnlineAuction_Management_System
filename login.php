<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Auction Management Systems</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="post" action="login.php" class="forms">
            <h1 class="text-white">Login Page</h1>
            <div class="mb-3">
                <i class="bi bi-person-circle bg-white"></i>
                <label for="username" class="text-white">Username</label><br>
                <input type="text" name="username" placeholder="Enter your Username">
            </div>
            <div class="mb-3">
                <i class="bi bi-file-lock-fill bg-white"></i>
                <label for="password" class="text-white">Password</label><br>
                <input type="password" name="password" placeholder="Enter your Password">
            </div>
            <h4><a href="#">Forgot Password ?</a></h4>
            <button type="submit" class="bg-primary text-white">Login</button>
            <h4 id="one"><a href="register.php">Are you a New User?</a></h4>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username']; //assign to user
        $pass = $_POST['password'];  //assign to password
        
        // Prevent SQL injection
        $users = mysqli_real_escape_string($conn, $user);  
        $password = mysqli_real_escape_string($conn, $pass);

        // Check if either field is empty
        if (empty($users) || empty($password)) {
            echo "Missing user credentials.";
        } 
        else {
            // Execute SQL query
            $sql = "SELECT * FROM login WHERE username='$users' AND password='$password' AND status ='2'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);

            // Check if user exists
            if ($count > 0) {
            ?>
                <script>
                     alert("Login Success");
                </script>
            <?php    
            } else {
                ?>
                <script>
                    alert("Invalid user or password");
                </script>
                <?php
            }
        }
    } 
    else {
        // Handle case when fields are not set
        ?>
        <script>
             alert("Provide username and password")
        </script>
        <?php
    }
}
?>

</html>
