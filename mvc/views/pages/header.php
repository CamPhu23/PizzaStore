<div class="header">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="#"><img src="><?= $root . "public/imgs/logo.png" ?><!--" alt="" width="60px" height="40px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

<!--            1 - nhan vien quan ly, 2 - nvbh, 3 - nv bep-->
            <?php
            $permission = (int)$_SESSION['permission'];
            ?>
            <ul class="navbar-nav mr-auto">
                <?php if ($permission === 1) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= $root . "Home/EmployerManagement" ?>">Quản lý nhân viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $root . "Home/SalesManagement" ?>">Quản lý bán hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $root . "Home/SalesManagement" ?>">Quản lý kho</a>
                </li>
                <?php }
                if ($permission === 2) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $root . "Home/CreateNewOrder" ?>">Tạo mới đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $root . "Home/CreateNewCustomerAccount" ?>">Tạo tài khoản khách hàng</a>
                </li>
                <?php }
                if ($permission === 3 || $permission === 1) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $root . "Home/StockInRequest" ?>">Yêu cầu nhập kho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $root . "Home/OrderComplete" ?>">Hoàn thành đơn hàng</a>
                </li>
                <?php } ?>
            </ul>

            <div class="mt-2 mt-md-0 ml-auto">
                <a href="<?= $root . "Account/Logout" ?>" class="font-weight-bold text-light btn btn-outline-primary my-2 my-sm-0" role="button">Đăng xuất</a>
            </div>
        </div>
    </nav>
</div>