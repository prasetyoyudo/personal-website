<?php  
if(isset($_GET['comment-delete'])){
	$id_comment = $_GET['comment-delete'];
	mysqli_query($conn,"DELETE FROM comment WHERE id = '$id_comment'");
	header('location:index.php?comment');
}


?>