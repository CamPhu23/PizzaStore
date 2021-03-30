<div class="container w-25 mr-auto">
    <div class="p-4 border rounded mt-5">
        <h2 class="d-flex justify-content-center mb-4">Phiếu nhập kho</h2>
        <form action="<?= $root . "Home/StockInRequestProcess" ?>" method="POST" id="GoodsReceived">
            <div class="form-group">
                <label for="goodsID">Mã hàng:</label>
                <input type="text" class="form-control" placeholder="Nhập mã hàng" id="goodsID" name="goodsID">
            </div>

            <div class="form-group">
                <label for="goodsName">Tên hàng hóa:</label>
                <input type="text" class="form-control" placeholder="Nhập tên hàng" id="goodsName" name="goodsName">
            </div>
            
            <div class="form-group">
                <label for="quantity">Số lượng nhập:</label>
                <input type="number" class="form-control" placeholder="Nhập số lượng" id="quantity" name="quantity" min="0">
            </div>

            <p class="errorMess" style="color: red;"></p>

            <button type="submit" class="w-100 btn btn-primary">Nhập hàng</button>
        </form>
    </div>
</div>