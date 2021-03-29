<?php //nho chinh lai cai active ?>
<div class="header">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="#"><img src="--><?= $root . "public/imgs/logo.png" ?><!--" alt="" width="60px" height="40px"></a>-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $active == 0 ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/Intro" ?>">Home</a>
                </li>
                <li class="nav-item <?= $active == 1 ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/NewOrder" ?>">Tạo đơn hàng</a>
                </li>
                <li class="nav-item <?= $active == 2 ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/ProcessOrder" ?>">Xử lý đơn hàng</a>
                </li>
                <li class="nav-item <?= $active == 3 ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/StockManagement" ?>">Quản lý kho</a>
                </li>
                <li class="nav-item <?= $active == 4 ? "active" : "" ?>">
                    <a class="nav-link" href="<?= $root . "Home/AccountManagement" ?>">Quản lý tài khoản</a>
                </li>
            </ul>

            <div class="mt-2 mt-md-0 ml-auto">
                <a href="<?= $root . "Account/Login" ?>" class="font-weight-bold text-light btn btn-outline-primary my-2 my-sm-0" role="button">Login</a>
                <a href="<?= $root . "Account/Register" ?>" class="font-weight-bold text-light btn btn-outline-success my-2 my-sm-0 ml-3" role="button">Register</a>
            </div>

            <div class="mt-2 mt-md-0 ml-auto">
                <a href="<?= $root . "Account/Logout" ?>" class="font-weight-bold text-light btn btn-outline-primary my-2 my-sm-0" role="button">Logout</a>
            </div>
        </div>
    </nav>
</div>
