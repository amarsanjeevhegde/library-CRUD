<?php 
session_start();
include 'connect.php';
// initialize variables
$author = "";
$title = "";
$genre = "";
$date = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) 
{
$author = $_POST['author'];
$title = $_POST['title'];
$genre = $_POST['genre'];
$date = $_POST['date'];

$temp = mysqli_query($db, "INSERT INTO books (author, title, genre, date) VALUES ('$author', '$title', '$genre', '$date')"); 
$_SESSION['message'] = "The book details are saved"; 
#echo mysqli_error($db);
header('location: menu.php');
}


if (isset($_POST['update'])) 
{
$id = $_POST['id'];
$author = $_POST['author'];
$title = $_POST['title'];
$genre = $_POST['genre'];
$date = $_POST['date'];

mysqli_query($db, "UPDATE books SET author='$author', title='$title', genre='$genre', date='$date' WHERE id=$id");
$_SESSION['message'] = "The book details are updated!"; 
#echo mysqli_error($db);
header('location: menu.php');
}

if (isset($_GET['del'])) 
{
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM books WHERE id=".$id);
    $_SESSION['message'] = "The book was deleted"; 
	#echo mysqli_error($db);
    header('location: menu.php');
}

?>
