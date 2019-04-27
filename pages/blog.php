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


     <!-- ============ABOUT-ME================ -->
    <div class="container blog" id="article">
      <div class="row justify-content-center">
        <div class="col-md-4 blog">
          <h2>My Profile</h2>
          <img src="images/bg-bio.png" class="img-fluid rounded-circle profile-image" alt="">
          <p>Saya Prasetyo Yudho, berikut adalah halaman blog saya, disini saya membagikan apa yang saya ingin tulis dapat seputar pengalaman, kegiatan, ataupun artikel tentang profil persuhaan atau pengembagan website, terimakasih telah berkunjung jangan lupa untuk feedback nya jika ada yang ingin disampaikan, selamat berkunjung.</p>
        </div>

        <div class="col-md-8 article">
          <div class="row post-head">
            <div class="col-md-8">
              <h2>My Article</h2>
            </div>
          </div>
          

      <?php
        // PAGINIATION
        $per_page = 4;
        $cur_page = 1;
        if(isset($_GET['page'])){
          $cur_page = $_GET['page'];
          $cur_page = ($cur_page > 1) ? $cur_page : 1;
        }
        $total_data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM post"));
        $total_page = ceil($total_data/$per_page);
        $offset = ($cur_page - 1) * $per_page;

        // TAMPILKAN DATA POST
        $query = mysqli_query($conn, "SELECT * FROM post ORDER BY id DESC LIMIT $per_page OFFSET $offset");

      ?>          
         
      <?php if (mysqli_num_rows($query)) { ?>
        <?php while($row = mysqli_fetch_array($query)) {?>     
         <?php $desc = substr($row['description'], 0, 250); ?>   
         <div class="row post-art">
            <div class="col-4">
              <img src="images/blog/<?= $row['image'] ?>" class="img-fluid post-art" alt="">
            </div>
            <div class="col-8">
              <h4><?php echo $row['title'] ?></h4>
              <div class="meta">
                <li>
                  <i class="fas fa-users"></i><i> Author : <?php echo $row['author'] ?></i> 
                </li>
                <li>
                  <i class="fas fa-clock"></i><i> Date : <?php echo tgl_indonesia($row['date']) ?></i>
                </li>
              </div>
              <hr>
              <p><?php echo $desc;  ?>...</p>
              <a href="index.php?detail=<?php echo $row['id'] ?>"> <button type="button" class="btn btn-dark">Lanjut Baca >></button></a>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
      
      
      <?php if(isset($total_page)) { ?>
        <?php if($total_page > 1) { ?>
          <nav class="text-center">
            <ul class="pagination">
              <?php if($cur_page > 1) {?>
                <li>
                  <a href="index.php?page=<?= $cur_page - 1 ?>" aria-label="Previous">
                      <span aria-hidden="true" class="prev">Prev</span>
                  </a>
                  </li>
              <?php }else { ?>
                <li class="disabled"><span aria-hidden="true" class="prev">Prev</span></li>
              <?php } ?>
              
              <?php if($cur_page < $total_page) {?>
                <li>
                  <a href="index.php?page=<?= $cur_page + 1 ?> " aria-label="Next">
                    <span aria-hidden="true" class="next">Next</span>
                  </a>
                </li>
              <?php }else { ?>
                <li class="disabled"><span aria-hidden="true" class="prev">Next</span></li>
            <?php } ?>

            </ul>
          </nav>
        <?php } ?>
      <?php } ?>
        </div>        
      </div>
    </div>
  </div>


    <!-- ============GALLERY================ -->
    <div class="container-fluid mt-5 p-5" id="gallery">
      <div class="container gallery">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <h2>Gallery</h2>
          </div>
          <div class="row justify-content-center gallery-img">
            <div class="col-md-8 ">
              <div class="gallery">
                <div class="img-w"><img src="images/gallery/1.jpg" alt="" class="img-fluid" /></div>
                <div class="img-w"><img src="images/gallery/2.jpg" alt="" /></div>
                <div class="img-w img-fluid"><img src="images/gallery/3.jpg" alt="" /></div>
                <div class="img-w img-fluid"><img src="images/gallery/4.jpg" alt="" /></div>
                <div class="img-w img-fluid"><img src="images/gallery/5.jpg" alt="" /></div>
                <div class="img-w img-fluid"><img src="images/gallery/6.jpg" alt="" /></div>
                <div class="img-w img-fluid"><img src="images/gallery/7.jpg" alt="" /></div>
                <div class="img-w img-fluid"><img src="images/gallery/8.jpg" alt="" /></div>
                <div class="img-w img-fluid"><img src="images/gallery/9.jpg" alt="" /></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>