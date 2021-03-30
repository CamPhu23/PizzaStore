<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- Latest compiled and minified CSS -->
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">-->
    <!-- jQuery library -->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <!-- Popper JS -->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <!-- Latest compiled JavaScript -->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>-->

<!--    <link rel="stylesheet" href="--><?//= $root . "public/style.css" ?><!--">-->
<!--    <script src="--><?//= $root . "public/myscript.js" ?><!--"></script>-->

    <?php require_once "./mvc/views/pages/head.php"?>
</head>

<body class="bg-light">
<div>
    <div class="header">
        <?php require_once  "./mvc/views/pages/header.php"?>
    </div>

    <div class="container-fluid">
        <div class="py-5">
            <div class="row mx-auto w-75">
                <div class="col-lg-12 col-md-12 pr-0 pl-md-0 pl-lg-2">
                    <?php isset($data["Target"]) ? require_once "./mvc/views/pages/" . $data["Target"] . ".php" : ""?>
<!--                    --><?php //isset($data["DetailEmployerView"]) and $data["DetailEmployerView"] === "true" ? require_once "./mvc/views/pages/detail_employer.php" : ""?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

