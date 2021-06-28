<?php include "admin-header.php"; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
        <h1 class="h2">Gönderiler</h1>
    </div>
    <!-- Button trigger modal -->
    <a type="button" class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#addNewPost">
        <i style="font-size: 40px" class="bi bi-plus-square-fill"></i>
    </a>
    <div class="table-responsive">
        <table class="table table-dark table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Gönderi Adı</th>
                    <th scope="col">Gönderi Küçük Resim</th>
                    <th scope="col">Gönderi Büyük Resim</th>
                    <th scope="col">Gönderi İçerik</th>
                    <th scope="col">Gönderi Aksiyonlar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST["add_post"])) {
                    $post_name = $_POST["post_name"];
                    $post_content = $_POST["post_content"];

                    $post_item_sm = $_FILES["image"]["name"];
                    $post_item_sm_temp = $_FILES["image"]["tmp_name"];
                    $post_item_bg = $_FILES["imagebg"]["name"];
                    $post_item_bg_temp = $_FILES["imagebg"]["tmp_name"];

                    move_uploaded_file($post_item_sm_temp, "../img/small_image/$post_item_sm");
                    move_uploaded_file($post_item_bg_temp, "../img/big_image/$post_item_bg");

                    $query = "INSERT INTO posts (post_name, img_kucuk, img_buyuk, post_icerik)";
                    $query .= "VALUES('{$post_name}', '{$post_item_sm}', '{$post_item_bg}', '{$post_content}')";

                    $create_post_query = mysqli_query($conn, $query);
                }
                ?>

                <?php
                $sql = "SELECT * FROM posts ORDER BY id ASC";
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
                        <tr>
                            <td><?php echo $post_id; ?></td>
                            <td><?php echo $post_name; ?></td>
                            <td><img src="<?php echo URL; ?>/img/small_image/<?php echo $img_kucuk; ?>" alt="" width="60px"></td>
                            <td><img src="<?php echo URL; ?>/img/big_image/<?php echo $img_buyuk; ?>" alt="" width="60px"></td>
                            <td><?php echo substr($post_icerik, 0, 150); ?></td>
                            <td>
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#editPost">
                                    <i class="bi bi-pen"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deletePost">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="addNewPost" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Yeni Bir Gönderi Ekle
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Gönderi Adı</label>
                                <input type="text" class="form-control mb-2" placeholder="Gönderi'nin Adı" id="post_name" name="post_name" autocomplete="off" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gönderi Küçük Resim</label>
                                <input type="file" class="form-control" name="image" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gönderi Büyük Resim</label>
                                <input type="file" class="form-control" name="imagebg" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gönderi İçerik</label>
                                <textarea name="post_content" id="add-summernote" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button> -->
                                <input type="submit" class="btn btn-outline-primary btn-block" name="add_post" value="Kaydet">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editPost" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <strong>Gönderi Düzenleme</strong>
                            <p><strong>PHP</strong> Adlı Gönderi Düzenleniyor</p>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label class="form-label">Gönderi Adı Ve Slug Hali</label>
                                <input type="text" class="form-control mb-2" placeholder="Gönderi'nin Adı" id="post_name" autocomplete="off" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gönderi Küçük Resim</label>
                                <input type="file" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gönderi Büyük Resim</label>
                                <input type="file" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gönderi İçerik</label>
                                <div id="edit-summernote"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="button" class="btn btn-primary">Kaydet</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deletePost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Gönderi Silme İşlemi
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4><strong>PHP</strong> Adlı Gönderiyi Silmek İstediğinden Eminmisin</h4>
                    </div>
                    <div class="modal-footer col-md-12">
                        <a href="" class="btn btn-outline-danger col-md-5">
                            Evet
                        </a>
                        <a href="" class="btn btn-outline-success col-md-5" data-dismiss="modal">
                            Hayır
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>

<script>
    $('#add-summernote').summernote({
        height: 300,
        minHeight: null,
        maxHeight: null,
        focus: true
    });

    $('#edit-summernote').summernote({
        height: 300,
        minHeight: null,
        maxHeight: null,
        focus: true
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</body>

</html>