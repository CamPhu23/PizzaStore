<div class="container w-25 mr-auto">
    <div class="p-4 border rounded mt-5">
        <h2 class="d-flex justify-content-center mb-4">Hủy tài khoản khách hàng</h2>
        <form id="deleteMemberForm" action="<?= $root . "Home/DeleteCustomerAccount" ?>" method="POST" onclick="return DeleteMember()">

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Nhập địa chỉ email" id="email" name="email">
            </div>

            <p class="errorMess" style="color: red;"></p>
            
            <button id="btn-cofirm-delete" type="button" class="w-100 btn btn-primary">Xác nhận</button>
        </form>
    </div>
</div>

<div aria-live="polite" aria-atomic="true">
    <div style="position: absolute; top: 3rem; right: 1rem;">
        <div class="toast fade" id="delete-member-result" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto">Thông báo</strong>
                <small class="text-muted">bây giờ</small>
                <a id="close-delete-member-result-toast" type="button" class="ml-2 mb-1 close">&times;</a>
            </div>
            <div id="messages" class="toast-body"></div>
        </div>
    </div>
</div>

<script>
function DeleteMember() {
    let url = '<?= $root ?>Home/DeleteCustomerAccountProcess';
    var form = document.querySelector('#deleteMemberForm');
    var data = new FormData(form);

    fetch(url,{ body: data, method: "post" })
    .then((response) => {
        return response.json()
    })
    .then((data) => {
        $('#delete-member-result').toast('show')
        if (data.code === 1) {
            console.log('code 1')

            $('#messages').html(data.message);
        } else {
            $('#messages').html("Xóa thành viên thất bại");
        }

        setTimeout(function() {
            $('#delete-member-result').toast('hide')
            $('#close-delete-member-result-toast').click()
        }, 5000);

        return true;
    })
}
</script>