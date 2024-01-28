<?php require 'Components/_nav.php'; ?>
<?php
$showAlert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'Components/_dbconnect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

        // Check if username already exists
    $checkUsernameQuery = "SELECT * FROM `users` WHERE `username` = '$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
    if (!empty($password) && !empty($cpassword) && $password == $cpassword ) {


        $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";

        // SQL query execution for connecting and transferring the data to the database
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $showAlert = true;
            header("Location: /Microproject/signup.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Something is Wrong.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>

<?php
if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> User registered successfully. You may now login.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>

<h1 class="text-center">SignUp To The Website</h1>

<div class="container my-4">
    <form action="/Microproject/signup.php" method="post">
        <div class="form-group">
            <label for="username" class="form-label">User Name</label>
            <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <div id="emailHelp" class="form-text">Make sure to type the same Password</div>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>

</body>
</html>
