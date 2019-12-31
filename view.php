
<?php 
include_once "db.php";
$results = mysqli_query($db, "SELECT * FROM crud"); ?>

<!doctype html>
<html lang="en">
  <head>
    <title>View</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div  class="container">
    <!-- jumbotron starting -->
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center">Record Details</h1>
  </div>
</div>
<br>
    <!-- jumbotron ending -->
    <form action="index.php">
<button type="submit" name="add" class="btn btn-secondary">Add</button>
</form>
<br>      

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
    <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Gender</th>
      <th scope="col">Description</th>
      <th scope="col">Age</th>
      <th scope="col">Languages</th>
      <th scope="col">Image Name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>

  <?php while ($row = mysqli_fetch_array($results)) { ?>
  <tbody>
    <tr>
      <td><?php echo $row['crud_id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['mno']; ?></td>
      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['text_area']; ?></td>
      <td><?php echo $row['age']; ?></td>
      <td><?php echo $row['check_box']; ?></td>
      <td><?php echo $row['path']; ?></td>
      <input type="hidden" name="id" value="<?php echo $row['crud_id']; ?>">
      <td><a href="edit.php?edit=<?php echo $row['crud_id']; ?>" class="btn btn-success"">Edit</a></td>
      <td><a href="delete.php?del=<?php echo $row['crud_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
  </tbody>
  <?php } ?>
</table>

</div>
<br><br>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>