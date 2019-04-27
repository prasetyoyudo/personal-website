<?php 

include '../includes/config.php';

if(isset($_POST['reset'])){
  $id_admin = $_POST['id_admin'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  mysqli_query($conn, "UPDATE admin SET username ='$username', password = '$password'
                      WHERE id = '$id_admin'");
  header('location:login.php');
}
$edit = mysqli_query($conn, "SELECT * FROM admin");
$row_edit = mysqli_fetch_array($edit);


$query =mysqli_query($conn, "SELECT * FROM admin ");
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="../images/favicon.ico" rel="shortcut icon">


    <title>CMS Prasetyo Yudho</title>
  </head>
  <body>
    <div class="container submit">
      <div class="card ">
        <h5 class="card-header text-center">Reset Password</h5>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter username" value="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Enter new password" value="">
            </div>
            <button type="submit" name="reset" value="login" class="btn btn-primary">Reset</button>
            <input type="hidden" name="id_admin" value="<?= $row_edit['id'] ?>">

          </form>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery-3.3.1.slim.min.js" ></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      
    </script>
  </body>
</html>
