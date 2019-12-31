<?php


    include_once "db.php";

    $name = $email = $gender = $mno = $textarea = "";
    //if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mno = $_POST['mno'];
        $gender = $_POST['gender'];
        $textarea = $_POST['textarea'];
        $age = $_POST['age'];
         $checkbox = $_POST['checkbox'];
          $path = $_FILES["fileToUpload"]["name"];
          $checkbox1 = implode(',', $checkbox);

      $sql = "INSERT INTO `crud` (`crud_id`, `name`, `email`, `mno`, `gender`, `text_area`, `age`, `check_box`, `path`) VALUES (NULL, '$name', '$email', '$mno', '$gender', '$textarea', '$age', '$checkbox1', '$path')";
       mysqli_query($db, $sql);
        //header("location: view.php");
       
    }

    
$thispage = htmlspecialchars($_SERVER["PHP_SELF"]);
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Simple CRUD Database</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
            <!-- jumbotron starting -->

            <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-center">Simple Crud Database</h1>
  </div>
</div>

        <!-- jumbotron ending -->

      <!-- Forms Starting -->
	<br>
    
     <br>
     <form action="view.php">
<button type="submit" name="add" class="btn btn-secondary">View</button>
</form><br><br>
      <div>
      <form action="<?= $thispage ?>" method="post" enctype="multipart/form-data" required>
      <div class="form-group">
    <label for="name">Enter Your Name</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="mobile">Enter Your Mobile Number</label>
    <input type="text" class="form-control" id="mobile" name="mno">
  </div>

  <label for="gender">Enter Your Gender</label>
  <div class="form-check">
 
  <input class="form-check-input" type="radio" name="gender" id="gender" value="Male">
  <label class="form-check-label" for="gender">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="gender1" value="Female">
  <label class="form-check-label" for="gender1">
    Female
  </label>
</div><br>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Age</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01" name="age">
    <option value=""></option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
  </select>
</div><br>

<label for="gender">Languages Known</label>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="tamil" name="checkbox[]" value="Tamil">
    <label class="custom-control-label" for="tamil">Tamil</label>
</div>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="english" name="checkbox[]" value="English">
    <label class="custom-control-label" for="english">English</label>
</div>
<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="hindi" name="checkbox[]" value="Hindi">
    <label class="custom-control-label" for="hindi">Hindi</label>
</div>
<div><br>
<label for="fileToUpload">Select image to upload:</label><br>
<input type="file" name="fileToUpload" id="fileToUpload">
</div>
<br>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Feedback</span>
  </div>
  <textarea class="form-control" aria-label="With textarea" name="textarea"></textarea>
</div><br>

<br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

</div>
      <!-- Forms Ending -->


</div>

<br><br>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadmessage = "";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      $uploadmessage =  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      $uploadmessage =  $uploadmessage."File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
  $uploadmessage = $uploadmessage."Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $uploadmessage = $uploadmessage."Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !="jpeg" && $imageFileType != "gif" ) {
  $uploadmessage = $uploadmessage."Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $uploadmessage =  $uploadmessage."Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $uploadmessage = $uploadmessage."The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
      $uploadmessage =  $uploadmessage."Sorry, there was an error uploading your file.";
    }
}

?>
<?php
if(isset($_POST["submit"])){
echo "<p style='margin-top: 50px;'>";
if($upload==1)
  echo "<script type='text/javascript'>alert('$uploadmessage')</script>";
    else
    echo "<script type='text/javascript'>alert('$uploadmessage')</script>";
    
    //echo $uploadmessage; 

}
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>