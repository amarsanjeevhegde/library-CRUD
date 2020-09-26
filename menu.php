<?php  include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Preston Library</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Preston Library</h1>
<?php
session_start();

  if (!isset($_SESSION['username'])) 
  {
 	$_SESSION['comment'] = "login to the account to access the application ";
  	header('location: login.php');
  }
    
  if (isset($_GET['logout'])) 
  {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  
?>

<?php 
if (isset($_SESSION['message'])):
 ?>
<div class="msg">
<?php 
echo $_SESSION['message']; 
unset($_SESSION['message']);
?>
</div>
<?php
 endif
 ?>

<?php

$results = mysqli_query($db, "SELECT * FROM books"); 
$update = false;
$author = ""; #the false, ensures that the data displayed and stored changes when entered
$title = "";
$genre = "";
$date = "";
if (isset($_GET['edit'])) 
{
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM books WHERE id=$id");
		$record_name = mysqli_fetch_array($record);
		$author = $record_name['author'];
		$title = $record_name['title'];
		$genre = $record_name['genre']; #displayes the CRUD, allows the user to manupilate the data.
		$date = $record_name['date'];
}
 
?>

<table>
<thead>
<tr>
<th>Author</th>
<th>Title</th>
<th>Genre</th>
<th>Published date</th>
<th colspan="2">Action</th>
</tr>
</thead>
	
<?php while ($row = mysqli_fetch_array($results)) { ?>
<tr>
<td><?php echo $row['author']; ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['genre']; ?></td> 
<td><?php echo $row['date']; ?></td>
<td>
<a href="menu.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
</td>
<td>
<a href="function.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
</td>
</tr>
<?php } ?>
</table>

<form action="function.php" method="POST" >

<div class="input_group" style="background-color:#5AFFAD">
<input type="hidden" id ="id" name="id" value="<?php echo $id; ?>">
</div>

<div class="input_group" style="background-color:#5AFFAD">
<label for="au">Author</label>
<input type ="text" id ="author" name ="author" value="<?php echo $author; ?>" required />  
</div>

<div class="input_group" style="background-color:#5AFFAD">
<label for="au">Book title</label>
<input type ="text" id ="title" name ="title" value="<?php echo $title; ?> " required />  
</div>

<div class="input_group" style="background-color:#5AFFAD">
<label for="au">Genre</label>
<input type ="text" id ="genre" name ="genre" value="<?php echo $genre; ?>" required /> 
</div>

<div class="input_group" style="background-color:#5AFFAD">
<label for="au">Published date</label>
<input type ="date" id ="date" name ="date" value="<?php echo $date; ?>" required /> 
</div>

<?php if ($update == true): ?>
<div class="input_group" style="background-color:#5AFFAD">
<button type ="submit" name ="update" class="btn">Update</button>
</div>

<?php else: ?>

<div class="input_group" style="background-color:#5AFFAD">
<button type ="submit" name ="save" class="btn">Save</button>
</div>

<div class="input_group" style="background-color:#5AFFAD">
<a href="menu.php?logout=true">Logout</a>
</div>
<?php endif ?>

</form>
</body>
</html>