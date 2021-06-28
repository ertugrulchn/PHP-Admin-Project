<?php include 'header.php'; ?>

<!--Page Container-->
<div class="container">
  <!--Breadcrumb-->
  <nav class="mt-3 mb-5" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Gönderiler</li>
    </ol>
  </nav>
  <!--Breadcrumb Fnished-->
  <!--Posts-->
  <?php
  $sql = "SELECT * FROM posts";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      $post_id = $row['id'];
      $post_name = $row['post_name'];
      $img_kucuk = $row['img_kucuk'];
      $img_buyuk = $row['img_buyuk'];
      $post_icerik = $row['post_icerik'];
  ?>
      <div class='card col-md-6 mb-3 mt-5' style='max-width: 540px; border: 1px solid #99999938'>
        <div class='row g-0'>
          <div class='col-md-5' style='border-right: 1px solid #99999938'>
            <img src='<?php echo URL; ?>/img/small_image/<?php echo $img_kucuk; ?>' class='img-fluid rounded-start' alt'...' />
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h5 style="text-transform: uppercase;" class="card-title"><?php echo $post_name ?></h5>
              <p class="card-text"><?php echo substr($post_icerik, 0, 150) ?></p>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?php echo URL; ?>/post_detail.php?look=<?php echo $post_id; ?>" class="btn btn-outline-info">Daha Fazla</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php
    }
  } else {
    echo "0 results";
  }
  ?>
  <!--Posts Fnished-->
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>