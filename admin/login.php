<?php  
ob_start();
session_start();
if(isset($_SESSION['admin_username'])) header("location:index.php");
include '../includes/config.php';
include '../function/function.php';

// PROSES LOGIN 
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql_login = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

  if(mysqli_num_rows($sql_login)>0){
    $row_admin = mysqli_fetch_array($sql_login);
    $_SESSION['admin_id'] = $row_admin['id'];
    $_SESSION['admin_username'] = $row_admin['username'];
    header("location:index.php");
  }else{
        header("location:login.php?failed");
  }
}

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
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <h5 class="card-header text-center">Silahkan Login</h5>
        <div class="card-body">
          <form method="post">
            <?php if(isset($_GET['failed'])) { ?>
            <div class="alert alert-danger alert-dismissable">
              <button aria-hiden="true" data-dismiss="alert" class="close" type="button"></button>
              Username atau Password Anda Salah. Silakan hubungi Administrator.
            </div>
            <?php } ?>

            <div class="form-group">
              <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control active" name="password" id="password" placeholder="Enter Password" ">

            </div>
            <div class="form-group">
              <i class="fa fa-eye " id="icon"></i> Tampilkan Password
            </div>
            <button type="submit" name="submit" value="login" class="btn btn-primary">Submit</button>
            <a href="lost-password.php">Lupa Password</a>
          </form>
        </div>
          </div>
        </div>
      </div>
      
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery-3.3.1.slim.min.js" ></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      var input = document.getElementById('password');
      var icon = document.getElementById('icon');

   icon.onclick = function () {

     if(input.className == 'form-control active') {
        input.setAttribute('type', 'text');
        icon.className = 'fa fa-eye';
       input.className = 'form-control';

     } else {
        input.setAttribute('type', 'password');
        icon.className = 'fa fa-eye-slash';
       input.className = 'form-control active';
    }

   }
    </script>
  </body>
</html>

<?php  
mysqli_close($conn);
ob_end_flush();


?>