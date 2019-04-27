<?php  
if(isset($_POST['update'])){
  $id_post = $_POST['id_post'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $description = $_POST['description'];
  $date  = date('Y:m:d H-i-s');

  $file_name = $_FILES['file']['name'];
  $tmp_name = $_FILES['file']['tmp_name'];
  move_uploaded_file($tmp_name, "../images/blog/".$file_name);
  mysqli_query($conn, "UPDATE post SET title ='$title', author = '$author', description = '$description',
                      image = '$file_name' WHERE id = '$id_post'");
  header('location:index.php?post');
}
$post_id = $_GET['post-update'];
$edit = mysqli_query($conn, "SELECT * FROM post WHERE id = '$post_id'");
$row_edit = mysqli_fetch_array($edit); 

$query = mysqli_query($conn, "SELECT * FROM post ORDER BY id DESC")

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
        <h2>Post</h2>
        <div class="card">
          <div class="card-header">
            Input Post
          </div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label >Title</label>
                <input class="form-control" type="text" name="title" value="<?= $row_edit['title'] ?>" />
              </div>
              <div class="form-group">
                <label >Author</label>
                <input class="form-control" type="text" name="author" value="<?= $row_edit['author'] ?>"  />
              </div>
              <div class="form-group">
                <label >Image</label><br>
                <?php if($row_edit['image']== "") {echo "<img src='asset/no-image.png' width='88'/>";} else{?>
                  <p><img src="../images/blog/<?= $row_edit['image'] ?>" width="88"/></p>
                <?php } ?>
                  <input  type="file" name="file"  />
              </div>
              <div class="form-group">
                <label >Description</label>
                <textarea class="ckeditor" name="description"><?= $row_edit['description'] ?></textarea>
              </div>
              <button class="btn btn-success" type="submit" name="update">Update</button>
              <button class="btn btn-warning" type="reset" >Reset</button>
              <input type="hidden" name="id_post" value="<?= $row_edit['id'] ?>">
            </form>
          </div>
        </div>
        <div class="card comment">
        <div class="card-header">List Post</div>
          <div class="card-body">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if(mysqli_num_rows($query)>0) {?>
                            <?php while($row_data = mysqli_fetch_array($query)) {?>
                            <tr>
                                <td><?= $row_data['title'] ?></td>
                                <td><?= $row_data['author'] ?></td>
                                <td><?= $row_data['description'] ?></td>
                                <td>
                                <?php if($row_data['image']== "") {echo "<img src='asset/no-image.png' width='88'/>";} else{?>
                                  <img src="../images/blog/<?= $row_data['image'] ?>" width="88" class="img-responsive" />
                                <?php } ?>
                                </td>
                                
                                <td class="center"><a href="index.php?post-update=<?= $row_data['id'] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?post-delete=<?= $row_data['id'] ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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