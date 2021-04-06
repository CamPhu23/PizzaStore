<div class="col-lg-12 shadow p-2 mb-3 rounded">
    <h5 class="text-center my-3">QUẢN LÝ NHÂN VIÊN</h5>
    <div class="d-flex flex-row-reverse">
        <a role="button" aria-pressed="true" class="mb-3 mr-2" data-toggle="modal" data-target="#newEmployer">
            <button class="btn btn-primary">
                Thêm nhân viên
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
        </a>
    </div>
    <table class="table text-center table-hover">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Mã nhân viên</th>
            <th scope="col">Họ và tên</th>
            <th scope="col">Chức vụ</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $EmployerList = $data["EmployerList"];
        // var_dump($GoodsList);
        for ($i = 0; $i < count($EmployerList); $i++)
        {
            $row = $EmployerList[$i];
            ?>
            <tr>
                <td><?= ($i+1) ?></td>
                <td><?= $row["id"] ?></td>
                <td><?= $row["lastName"] . " " . $row["firstName"] ?></td>
                <td><?= $row["role"] ?></td>
                <td><?= $row["email"] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Tạo mới nhân viên -->
<div class="modal fade" id="newEmployer" tabindex="-1" role="dialog" aria-labelledby="newEmployerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newEmployerLabel">Thêm nhân viên mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= $root . "Home/CreateNewEmployerProcess" ?>" method="post" onsubmit="return checkManage()">
                <div class="modal-body">
                    <div class="form-group">
                        <input name="lastname" type="text" class="form-control" placeholder="Nhập họ nhân viên">
                    </div>
                    <div class="form-group">
                        <input name="firstname" type="text" class="form-control" placeholder="Nhập tên nhân viên">
                    </div>
                    <div class="form-group">
                        <input name="phone" type="text" class="form-control" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        <input name="email" type="text" class="form-control" placeholder="Nhập địa chỉ email">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="permission" class="w-100">
                            <option value="0" selected disabled hidden>Chọn phòng ban</option>
                            <option value="1">Nhân viên quản lý</option>
                            <option value="2">Nhân viên bán hàng</option>
                            <option value="3">Nhân viên bếp</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="input-group mb-3 col-md-6">
                            <div class="input-group-append">
                                <span class="input-group-text">Tài khoản</span>
                            </div>
                            <input name="username" type="text" class="form-control" placeholder="Tên tài khoản">
                        </div>

                        <div class="input-group mb-3 col-md-6">
                            <div class="input-group-append">
                                <span class="input-group-text">Mật khẩu</span>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</button>
                    <button type="submit" class="btn btn-success">Thêm nhân viên</button>
                </div>
            </form>
        </div>
    </div>
</div>