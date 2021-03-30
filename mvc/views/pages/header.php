<div class="header">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="#"><img src="<?= $root . "public/imgs/pizza-brand-logo.png" ?>" width="50px" height="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

<!--            1 - nhan vien quan ly, 2 - nvbh, 3 - nv bep-->
            <?php
                $permission = (int)$_SESSION['permission'];
                $activeTag = $data["Target"];
            ?>
            <ul class="navbar-nav mr-auto">
                <?php if ($permission === 1) { ?>
                <li class="nav-item <?= $activeTag === "EmployerManagement" ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/EmployerManagement" ?>">Quản lý nhân viên</a>
                </li>
                <li class="nav-item <?= $activeTag === "SalesManagement" ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/SalesManagement" ?>">Quản lý bán hàng</a>
                </li>
                <li class="nav-item <?= $activeTag === "StockManagement" ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/StockManagement" ?>">Quản lý kho</a>
                </li>
                <?php }
                else if ($permission === 2) { ?>
                <li class="nav-item <?= $activeTag === "CreateNewOrder" ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/CreateNewOrder" ?>">Tạo mới đơn hàng</a>
                </li>
                <li class="nav-item <?= $activeTag === "CreateNewCustomerAccount" ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/CreateNewCustomerAccount" ?>">Tạo tài khoản khách hàng</a>
                </li>
                <?php }
                else if ($permission === 3) { ?>
                    <li class="nav-item <?= $activeTag === "OrderComplete" ? "active" : "" ?>">
                        <a class="nav-link" href="<?= $root . "Home/OrderComplete" ?>">Hoàn thành đơn hàng</a>
                    </li>
                <?php }
                if ($permission === 3 || $permission === 1) { ?>
                <li class="nav-item <?= $activeTag === "StockInRequest" ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/StockInRequest" ?>">Yêu cầu nhập kho</a>
                </li>
                <?php } ?>
            </ul>

            <div class="mt-2 mt-md-0 ml-auto">
                <a href="<?= $root . "Account/Logout" ?>" class="font-weight-bold text-light btn btn-outline-primary my-2 my-sm-0" role="button">Đăng xuất</a>
            </div>
        </div>
    </nav>
</div>