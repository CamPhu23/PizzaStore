<?php

$error = "";
if (isset($data["error"])) {
    $error = $data["error"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= $root . "public/myscript.js" ?>"></script>
</head>
<body>

<div class="container">
    <div class="row justify-content-center m-auto py-5">
        <div class="col-md-6 col-lg-5 py-5">
            <h3 class="text-center text-secondary mt-5 mb-3">Đăng nhập</h3>
            <form class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light" action="<?= $root . "Account/SignInProcess" ?>" method="post" onsubmit="return checkLogin()">
                <div class="form-group">
                    <label for="username">Tài khoản</label>
                    <input value="" name="username" id="username" type="text" class="form-control" placeholder="Tài khoản">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input value="" name="password" id="password" type="password" class="form-control" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                    <button class="btn btn-success px-5 w-100">Đăng nhập</button>
                </div>
                <p><div id="error_login"><?= $error ?></div></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>
