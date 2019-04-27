<?php  

if(isset($_POST['update'])){
  $id_admin = $_POST['id_admin'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  mysqli_query($conn, "UPDATE admin SET username = '$username', password = '$password' 
                      WHERE id = '$id_admin'");
  header('location:index.php?administrator');
}

// TAMPILKAN DATA PADA FORM
$id_admin = $_GET['administrator-update'];
$edit = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$id_admin'");
$row_edit = mysqli_fetch_array($edit);


$query =mysqli_query($conn, "SELECT * FROM admin ORDER BY id DESC");



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
        <h2>Administrator</h2>
        <div class="card">
          <div class="card-header">
            Input Data
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label >Username</label>
                <input class="form-control" type="text" name="username" value="<?= $row_edit['username'] ?>" />
              </div>
              <div class="form-group">
                <label >Description</label>
                <input class="form-control" type="password" name="password" value="<?= $row_edit['password'] ?>" />
              </div>
              <button class="btn btn-success" type="submit" name="update">Update</button>
              <button class="btn btn-warning" type="reset" name="reset">Reset</button>
              <input type="hidden" name="id_admin" value="<?= $row_edit['id'] ?>">
            </form>
          </div>
        </div>
        <div class="card comment">
        <div class="card-header">List Data</div>
          <div class="card-body">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if(mysqli_num_rows($query)>0) { ?>
                            <?php while($row_data = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?= $row_data['username'] ?></td>
                                <td><?= $row_data['password'] ?></td>
                                <td class="center"><a href="index.php?administrator-update=<?= $row_data['id'] ?>" class="btn btn-primary btn-xs" type="button">Update</a></td>
                                <td class="center"><a href="index.php?administrator-delete=<?= $row_data['id'] ?>" class="btn btn-primary btn-xs" type="button">Delete</a></td>
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