<!-- ============HEADER================ -->
      <div class="container-fluid parallax-blog pb-5">
        <div class="container text-center text-white">
          <div class="row py-5">
            <div class="col-md-12 my-3">
              <h3 class=" m-2">Hello, There Again</h3>
              <h2 class="sub-judul ">Welcome To My Blog </h2>
              <a href="https://www.facebook.com/prasetyoyudho18"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>
      </div>

<!-- ============POST================ -->

    <?php
      //INPUT COMMENT
      if(isset($_POST['submit'])){
        $post_id = $_POST['post_id'];
        $name = $_POST['name'];
        $work = $_POST['work'];
        $reply = $_POST['reply'];
        $date = date('Y-m-d H:i:s');
        mysqli_query($conn, "INSERT INTO comment VALUES('', '$post_id', '$name', '$work', '$reply','0', '$date')");
        header("location:index.php?detail=$post_id&success-comment#success");
      } 

      // TAMPILKAN DATA DETAIL
      $detail_id = $_GET['detail'];
      $query = mysqli_query($conn, "SELECT * FROM post WHERE post.id =  '$detail_id'");
      if (mysqli_num_rows($query)== 0) header('location:index.php');
      $row_detail = mysqli_fetch_array($query);

      // TAMPILKAN DATA COMMENT
      $comment = mysqli_query($conn, "SELECT * FROM comment WHERE post_id = '$detail_id'
                                      AND STATUS = '1' ORDER BY id DESC LIMIT 5");
      $data = mysqli_num_rows($comment);
    ?>
    <div class="container detail-post">
      <div class="row  justify-content-center">
        <div class="col-md-8 post">
          <div class="meta">
            <li>
              <i class="fas fa-users"></i><i> Author : <?= $row_detail['author'] ?> </i>
            </li>
            <li>
              <i class="fas fa-clock"></i><i> Date : <?= tgl_indonesia( $row_detail['date']) ?> </i>
            </li>
          </div>
          <h2><?= $row_detail['title']  ?></h2>
          <p><?=  $row_detail['description'] ?></p>
          <p class="text-center">TERIMAKASIH TELAH MEMBACA</p>
        </div>
      </div>
    </div>
  
    <!-- Komentar -->
    <div class="container comment" id="success">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><?= $data ?> Feedback</h3>
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <?php if(mysqli_num_rows($comment)) { ?>
                  <?php while($row_comment=mysqli_fetch_array($comment)) { ?>
                    <li class="list-group-item">
                      <strong><?= $row_comment['name']  ?></strong><small> - <?= $row_comment['work'] ?> -</small> : <?= $row_comment['reply'] ?>
                    </li>
                  <?php } ?>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Komentar</h3>
        </div>
        <div class="panel-body" id="success" >
          <form class="form-horizontal" method="post">
            <?php if(isset($_GET['success-comment'])) { ?>
             <div class="form-group">
                <div class="col-sm-10">
                  <p style="color: red">Terimakasih telah memberikan feedback, feedback anda sedang di proses </p>
                </div>
              </div>
            <?php } ?>
            <div class="form-group">
              <label for="inputNama3" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNama3" name="name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputNama3" class="col-sm-2 control-label">Pekerjaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNama3" name="work">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPesan3" class="col-sm-2 control-label">Pesan</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="reply"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" name="submit">Kirim</button>
                <input type="hidden" name="post_id" value="<?= $detail_id ?>">
              </div>
            </div>
          </form>
        </div>
      </div>
        </div>
      </div>
    </div>