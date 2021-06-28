<?php include 'header.php'; ?>

<!--Page Container-->
<div class="container">
  <?php

  if (isset($_GET['look'])) {
    $p_post_id = $_GET['look'];
  }

  $sql = "SELECT * FROM posts WHERE id = $p_post_id";
  $result = mysqli_query($conn, $sql);

  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    $post_id = $row['id'];
    $post_name = $row['post_name'];
    $img_kucuk = $row['img_kucuk'];
    $img_buyuk = $row['img_buyuk'];
    $post_icerik = $row['post_icerik'];
  ?>
    <!--Breadcrumb-->
    <nav class="mt-3 mb-5" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">
          <a href="<?php echo URL; ?>/index.php">Gönderiler</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <?php echo $post_name; ?>
        </li>
      </ol>
    </nav>
    <!--Breadcrumb Fnished-->
    <!--Post İmage-->
    <div class="card bg-dark text-white mb-5" style="max-width: 1000px">
      <img src="<?php echo URL; ?>/img/big_image/<?php echo $img_buyuk; ?>" class="card-img" alt="<?php echo $img_buyuk; ?>" />
    </div>
    <!--Post İmage Fnished-->
    <!--Post Text-->
    <h1 style="text-transform: uppercase;" class="mb-3"><?php echo ($post_name); ?></h1>
    <p><?php echo $post_icerik; ?></p>
  <?php } ?>
  <!--Post Text Fnished-->
</div>
</body>

</html>