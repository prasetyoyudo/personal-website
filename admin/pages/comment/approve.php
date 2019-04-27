<?php  

if(isset($_GET['comment-approve'])) {
	$comment_id = $_GET['comment-approve'];
	mysqli_query($conn, "UPDATE comment SET status = '1' WHERE id = '$comment_id'");
	header("location:index.php?comment");

}

?>