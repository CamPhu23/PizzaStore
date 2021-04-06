<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require_once "./mvc/views/pages/head.php" ?>

    <title>Thông báo lỗi</title>
</head>
<body>
	<div class="container w-50 mt-5">
		<div class="alert alert-danger" role="alert">
            <div class="d-flex justify-content-center">
                <img class="w-100" src="<?= $root . "public/imgs/not_found.png" ?>">
            </div>

			<hr>
			<div class="d-flex pr-0 justify-content-center">
			  <h5 class="mb-0">Không tìm thấy trang hoặc không có quyền truy cập!</h5>
			</div>
		</div>
    </div>
</body>
</html>

