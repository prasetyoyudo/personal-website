<?php  
if(isset($_GET['post-delete'])){
	$id_post = $_GET['post-delete'];
	mysqli_query($conn,"DELETE FROM post WHERE id = '$id_post'");
	header('location:index.php?post');
}


?>