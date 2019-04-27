<?php  
ob_start();
session_start();
if(!isset($_SESSION['admin_id'])) header('location:login.php');
include '../includes/config.php';
include '../function/function.php';
?>




<?php  
include 'include/header.php';
include 'include/menu.php';
?>
  
  <body>

  <?php  
  if(isset($_GET['administrator'])){
    include 'pages/administrator/index.php';
  }elseif(isset($_GET['administrator-update'])){
    include 'pages/administrator/update.php';
  }elseif(isset($_GET['administrator-delete'])){
    include 'pages/administrator/delete.php';
  }elseif(isset($_GET['post'])){
    include 'pages/post/index.php';
  }elseif(isset($_GET['post-update'])){
    include 'pages/post/update.php';
  }elseif(isset($_GET['post-delete'])){
    include 'pages/post/delete.php';
  }elseif (isset($_GET['comment'])) {
    include 'pages/comment/index.php';
  }elseif (isset($_GET['comment-delete'])) {
    include 'pages/comment/delete.php';
  }elseif (isset($_GET['comment-approve'])) {
    include 'pages/comment/approve.php';
  }else{
    include 'pages/home.php';
  }

  ?>    
    
  <?php  

  include 'include/footer.php';

  ?>

  </body>
</html>

<?php  
mysqli_close($conn);
ob_end_flush();


?>