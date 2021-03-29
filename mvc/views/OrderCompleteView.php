<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng</title>
    <?php require_once "./mvc/views/pages/head.php" ?>
</head>
<body>
    <div class="body">
        <?php require_once "./mvc/views/pages/header.php" ?>
        <div class="w-25 mx-auto">
            <div class="p-4 border rounded mt-5">
                <h2 class="d-flex justify-content-center mb-4">Hoàn thành đơn hàng</h2>
                <form action="<?= $root . "Home/OrderCompleteProcess" ?>" method="post" onsubmit="return checkOrderComplete()">
                    <div class="form-group">
                        <label for="orderId">Mã đơn hàng:</label>
                        <input type="text" class="form-control" placeholder="Nhập mã đơn hàng" id="orderId" name="orderId">
                    </div>

                    <p class="errorMess" style="color: red;"></p>

                    <button type="submit" class="w-100 btn btn-primary">Hoàn thành</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>