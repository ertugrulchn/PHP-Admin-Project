<?php include 'db.php' ?>
<?php include 'config.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUMMERNOTE TEST APP USE PHP || Ertuğrul Emre Cihan</title>

    <!--Bootstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <!--Nav Bar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo URL; ?>/index.php">MC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo URL; ?>/index.php">Ana Sayfa</a>
                    </li>
                </ul>
                <form action="search.php" method="POST" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Post Ara..." aria-label="Search" name="search" required autocomplete="off" />
                    <button class="btn btn-outline-success" type="submit" name="startsearch">Ara</button>
                </form>
            </div>
        </div>
    </nav>
    <!--Nav Bar Fnished-->