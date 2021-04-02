<div class="container w-25 mr-auto">
    <div class="p-4 border rounded mt-5">
        <h2 class="d-flex justify-content-center mb-4">Đăng ký thành viên</h2>
        <form id="memberForm" action="<?= $root . "Home/CreateNewCustomerAccountProcess" ?>" method="POST">
            <div class="form-group">
                <label for="fullname">Họ tên khách hàng:</label>
                <input type="text" class="form-control" placeholder="Nhập họ tên khách hàng" id="fullname" name="fullname">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Nhập địa chỉ email" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="phoneNumber">Số điện thoại:</label>
                <input type="text" class="form-control" placeholder="Nhập số điện thoại" id="phoneNumber" name="phoneNumber">
            </div>

            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="check" name="allowReceiveEmail">
                <label class="form-check-label" for="check">Nhận các thông báo khuyến mãi</label>
            </div>

            <p class="errorMess" style="color: red;"></p>
            
            <button type="submit" class="w-100 btn btn-primary">Đăng ký</button>
        </form>
    </div>
</div>