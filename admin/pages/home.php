<?php  

$comment = mysqli_query($conn, "SELECT comment.*, post.title
                                FROM comment, post
                                WHERE comment.post_id = post.id
                                AND comment.status = '0'
                                ORDER BY comment.id DESC");
?>       


      <?php  

      include 'include/banner.php';
      
      ?>
    <div class="container profile">
      <div class="row">
        <?php  

        include 'include/aside.php';


        ?>
        <div class="col-sm-9">
          <h2>Dashboard</h2>
          <div class="card">
              <h5 class="card-header">Notification</h5>
            <div class="card-body">
              <div class="alert alert-success text-center" role="alert">Approve Comment Sukses</div>
              <div class="alert alert-danger text-center" role="alert">Approve Comment Dibatalkan</div>
            </div>
          </div>
          <div class="card comment">
            <div class="card-header">Approve Comment</div>
              <div class="card-body">
               <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Work</th>
                                <th>Comment</th>
                                <th>Date time</th>
                                <th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if(mysqli_num_rows($comment)>0) { ?>
                            <?php while($row_comment = mysqli_fetch_array($comment)) { ?>
                            <tr>
                                <td><?= $row_comment['title'] ?></td>
                                <td><?= $row_comment['name'] ?></td>
                                <td><?= $row_comment['work'] ?></td>
                                <td><?= $row_comment['reply'] ?></td>
                                <td> <?= $row_comment['date'] ?></td>
                                <td class="center"><a href="index.php?comment-approve=<?= $row_comment['id'] ?>" class="btn btn-primary btn-xs" type="button">Approve</a></td>
                            </tr>
                            <?php } ?>
                          <?php } ?>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
