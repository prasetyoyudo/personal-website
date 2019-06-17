  <!-- HEADER -->
    <?php

    ob_start();
    include "includes/header.php";
    include 'includes/config.php';
    include 'function/function.php';
    date_default_timezone_set('Asia/Jakarta');

    ?>
    <!-- CONTENT -->
        <div id="loading"></div>
    <?php

    if (isset($_GET['blog']) || isset($_GET['page'])) {
        include 'pages/blog.php';
    }else if (isset($_GET['detail'])) {
        include 'includes/detail.php';
    } else{
      include 'pages/home.php';
    }
    ?>

    <!-- FOOTER  -->
    <?php include 'includes/footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <script type="text/javascript">
      $(window).load(function() { $("#loading").delay(2000).fadeOut("slow"); } )
    </script>
  </body>
</html>

    <?php

    mysqli_close($conn);
    ob_end_flush();
    ?>
