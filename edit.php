<?php 
    include_once "db.php";
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$record = mysqli_query($db, "SELECT * FROM crud WHERE crud_id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
            $email = $n['email'];
            $mno = $n['mno'];
            $gender = $n['gender'];
            $textarea = $n['text_area'];
            $age = $n['age'];
            $checkbox = $n['check_box'];
            $checkbox = $n['check_box'];  
            $checkbox1 = explode(',', $checkbox);
            //var_dump($checkbox);
		}
    }
    
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mno = $_POST['mno'];
        $gender = $_POST['gender'];
        $textarea = $_POST['textarea'];
        $age = $_POST['age'];
        $checkboxx = $_POST['checkbox'];
        $checkboxx1 = implode(',', $checkboxx);
     mysqli_query($db, "UPDATE crud SET `name`='$name', `email`='$email', `mno`='$mno', `gender`='$gender', `text_area`='$textarea', `age`='$age', `check_box`='$checkboxx1' WHERE crud_id=$id");
        header('location: view.php');
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">


  <div  class="container">
    <!-- jumbotron starting -->
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center">Edit</h1>
  </div>
</div>
<br>

      <div>
      <form action="edit.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="form-group">
    <label for="name">Your Name</label>
    <input type="text" class="form-control" name="name"  id="name" value="<?php echo $name; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  name="email" value="<?php echo $email; ?>" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="mobile">Your Mobile Number</label>
    <input type="text"  class="form-control" id="mobile" name="mno" value="<?php echo $mno; ?>">
  </div>

  <label for="gender">Your Gender</label>
  <div class="form-check">
 
  <input class="form-check-input" type="radio" value="Male" <?php if ($gender == 'Male') echo 'checked="checked"'; ?> name="gender" id="gender" value="Male">
  <label class="form-check-label" for="gender">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="Female" <?php if ($gender == 'Female') echo 'checked="checked"'; ?> name="gender" id="gender1" value="Female">
  <label class="form-check-label" for="gender1">
    Female
  </label>
</div>
<br>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Age</label>
  </div>

  

  <select class="custom-select" id="inputGroupSelect01" name="age">
    <option value="<?php echo $n['crud_id']; ?>" <?php if ($id == $n['crud_id']) { echo 'selected'; } ?> ><?php echo $n['age']; ?></option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
  
  
  </select>
</div><br>

<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="tamil" name="checkbox[]" value="Tamil" <?php if(in_array("Tamil",$checkbox1)){echo "checked";}?>>
    <label class="custom-control-label" for="tamil">Tamil</label>
</div>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="english" name="checkbox[]" value="English" <?php if(in_array("English",$checkbox1)){echo "checked";}?>>
    <label class="custom-control-label" for="english">English</label>
</div>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="hindi" name="checkbox[]" value="Hindi" <?php if(in_array("Hindi",$checkbox1)){echo "checked";}?>>
    <label class="custom-control-label" for="hindi">Hindi</label>
</div>

<br>


<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Feedback</span>
  </div>
  <textarea class="form-control" aria-label="With textarea" name="textarea" ><?php echo $n['text_area']; ?></textarea>
</div>
<br>
<br>
<button type="submit" name="update" class="btn btn-primary">Update</button><br>
<br>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

