<div class="container w-25 mr-auto">
    <div class="p-4 border rounded mt-5">
        <h2 class="d-flex justify-content-center mb-4">Đăng ký thành viên</h2>
        <form id="memberForm" action="<?= $root . "Home/CreateNewCustomerAccountProcess" ?>" method="POST">
            <div class="form-group">
                <label for="lastName">Họ khách hàng:</label>
                <input type="text" class="form-control" placeholder="Nhập họ khách hàng" id="lastName" name="lastName">
            </div>

            <div class="form-group">
                <label for="firstName">Tên khách hàng:</label>
                <input type="text" class="form-control" placeholder="Nhập tên khách hàng" id="firstName" name="firstName">
            </div>

            <div class="form-group">
                <label for="phoneNumber">Số điện thoại:</label>
                <input type="text" class="form-control" placeholder="Nhập số điện thoại" id="phoneNumber" name="phoneNumber">
            </div>

            <p class="errorMess" style="color: red;"></p>
            
            <button type="submit" class="w-100 btn btn-primary">Đăng ký</button>
        </form>
    </div>
</div>