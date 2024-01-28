<!doctype html>
<?php include '../Components/_nav1.php'; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5"> 
        <div class="row">
          <div class="col">
            <div class="card bg-dark text-white">
              <div class="card-body">
                <h5 class="card-title">Delete Data of book</h5>
                <p class="card-text">If admin wants to Delete books from the database, Admin can access this place and delete books  </p>
                <a href="delete.php" class="btn btn-primary">Delete Books</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card bg-dark text-white">
              <div class="card-body">
                <h5 class="card-title">Add Books</h5>
                <p class="card-text">If admin wants to add books to the database, Admin can access this place and add books to the database</p>
                <a href="insert.php" class="btn btn-primary">Add Books</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4"> 
          <div class="col">
            <div class="card bg-dark text-white">
              <div class="card-body">
                <h5 class="card-title">View all database</h5>
                <p class="card-text">To view all the data base contain admin can visit this card and will get redirected to the final page.
                From this Admin can see the name of books last entry of the book.
                Name of the book and the author.
              </p>
                <a href="view.php" class="btn btn-primary">View Database</a>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
