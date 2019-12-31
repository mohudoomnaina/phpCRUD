
<?php
include_once "db.php";

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM crud WHERE crud_id=$id");
	header('location: view.php');
}

?>