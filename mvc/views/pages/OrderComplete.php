<div class="w-25 mx-auto">
    <div class="p-4 border rounded mt-5">
        <h2 class="d-flex justify-content-center mb-4">Hoàn thành đơn hàng</h2>
        <form id="completeOderForm">
            <div class="form-group">
                <label for="orderId">Mã đơn hàng:</label>
                <input type="text" class="form-control" placeholder="Nhập mã đơn hàng" id="orderId" name="orderId">
            </div>

            <p class="errorMess" style="color: red;"></p>

            <button id="btn-cofirm-order-complete" type="button" class="w-100 btn btn-primary">Hoàn thành</button>
        </form>
    </div>
</div>

<div aria-live="polite" aria-atomic="true">
    <div style="position: absolute; top: 3rem; right: 1rem;">
        <div class="toast fade" id="order-complete-result" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto">Thông báo</strong>
                <small class="text-muted">bây giờ</small>
                <a id="close-order-complete-result-toast" type="button" class="ml-2 mb-1 close">&times;</a>
            </div>
            <div id="messages" class="toast-body"></div>
        </div>
    </div>
</div>

<script>
$(document).ready(() => {
    $("#btn-cofirm-order-complete").click(() => {
        OrderComplete();
    })

    $("#close-order-complete-result-toast").click(() => {
        $('#order-complete-result').toast('hide')
        $('#orderId').val("") 
    })

})

function OrderComplete() {
    let url = '<?= $root ?>Home/OrderCompleteProcess';
    var form = document.querySelector('#completeOderForm');
    var data = new FormData(form);

    fetch(url,{ body: data, method: "post" })
    .then((response) => {
        return response.json()
    })
    .then((data) => {
        $('#order-complete-result').toast('show')

        // console.log(data);
        if (data.code === 0) {
            console.log('code 0')

            $('#messages').html(data.message);
        } else {
            $('#messages').html("Cập nhật đơn hàng thất bại");
        }

        setTimeout(function() {
            $("#close-order-complete-result-toast").click()
        }, 5000);
    })
}
</script>