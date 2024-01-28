<?php

require_once('../Components/_dbconnect2.php');
$query = "select * from books";
$result = mysqli_query($con,$query);

?>

<!doctype html>
<?php include '../Components/_nav1.php'; ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body>

  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col">
        <div class="card mt-2">
          <div class="card-header bg-dark text-white">
            <h2 class="display-6 text-center">Library Database</h2>
          </div>
          <div class="card-body text-center bg-dark text-white">
            <table class="table table-bordered">
              <tr style="font-weight:bold;">
                <td style="width: 110px;">Sr.No</td>
                <td>Book Name</td>
                <td>Author</td>
                <td>Date</td>
              </tr>
              <tr>

                <?php

                while ($row = mysqli_fetch_assoc($result)) 
               {

                ?>
                      
              <td> <?php echo $row['Sr']; ?> </td>
              <td> <?php echo $row['bookname']; ?> </td>
              <td> <?php echo $row['author']; ?> </td>
              <td> <?php echo $row['dt']; ?> </td>

               </tr>
                 <?php
               }

                ?>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>


</body>

</html>