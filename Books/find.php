<?php include '../Components/_nav1.php'; ?>
<?php
$login = false;
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../Components/_dbconnect2.php';

    $bookname = $_POST["bookname"];
    $author = $_POST["author"];

    $sql = "SELECT * FROM books WHERE bookname ='$bookname' AND author='$author'";
    $result = mysqli_query($con, $sql);

    $num = mysqli_num_rows($result);
     if ($result) {
            $num = mysqli_num_rows($result);

            if ($num == 1) {
                
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['bookname'] = $bookname;
                $login = true;
            } else {
                $error = true;
            }
        } else {
            echo "Error: " . mysqli_error($con);
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
if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Book is Available</strong> You may ask and take it
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
if ($error) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Book Not Availiable</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>
<div style="margin-top: 25px;" class="container">
<h1 class="text-center" >Find Book</h1>

<div class="container my-4">
    <form action="/Microproject/Books/insert.php" method="post">
        <div class="form-group">
            <label for="bookname" class="form-label">Book Name</label>
            <input type="text" class="form-control" id="bookname" name="bookname" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author">
        </div>
        
        <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
</div>
</body>
</html>
