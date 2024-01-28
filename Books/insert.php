<?php require '../Components/_nav1.php'; ?>
<?php
$showAlert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../Components/_dbconnect2.php';

    $bookname = $_POST["bookname"];
    $author = $_POST["author"];
        // Check if bookname already exists
    $checkbooknameQuery = "SELECT * FROM `books` WHERE `bookname` = '$bookname'";
    $checkbooknameResult = mysqli_query($con, $checkbooknameQuery);
    if (!empty($author)) {


        $sql = "INSERT INTO `books` (`bookname`, `author`) VALUES ('$bookname', '$author')";

        // SQL query execution for connecting and transferring the data to the database
        $result = mysqli_query($con, $sql);

        if ($result) {
            $showAlert = true;
            header("Location: /Microproject/Books/view.php");
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

<h1 class="text-center">Add Books</h1>

<div class="container my-4">
    <form action="/Microproject/Books/insert.php" method="post">
        <div class="form-group">
            <label for="bookname" class="form-label">Bookname</label>
            <input type="text" class="form-control" id="bookname" name="bookname" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="author" class="form-label">author</label>
            <input type="text" class="form-control" id="author" name="author">
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>

</body>
</html>
