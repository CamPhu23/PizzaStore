<div class="col-lg-12 shadow p-2 mb-3 rounded">
    <h5 class="text-center my-3">QUẢN LÝ BÁN HÀNG</h5>
    <div class="d-flex flex-row-reverse">
        <a role="button" aria-pressed="true" class="mb-3 mr-2" data-toggle="modal" data-target="#exportExcel">
            <button class="btn btn-primary">
                Xuất file
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
        </a>
    </div>
    <table class="table text-center table-hover">
        <thead>
        <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Tổng cộng</th>
            <th scope="col">Thời gian</th>
            <th scope="col">Loại thanh toán</th>
        </tr>
        </thead>
        <tbody>
        <?php
              
        ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="exportExcel" tabindex="-1" role="dialog" aria-labelledby="exportExcelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportExcelLabel">Xuất báo cáo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= $root . "Home/CreateReport" ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input name="filename" type="text" class="form-control" placeholder="Đặt tên file">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="file_type" class="w-100">
                            <option value="0" selected disabled hidden>Loại file</option>
                            <option value="1">File Excel</option>
                            <option value="2">File Word</option>
                            <option value="3">File PDF</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy bỏ</button>
                    <button type="submit" class="btn btn-success">Xuất file</button>
                </div>
            </form>
        </div>
    </div>
</div>