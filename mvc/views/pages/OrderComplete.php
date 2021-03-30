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