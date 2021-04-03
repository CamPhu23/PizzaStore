<div class="container w-50 mr-auto">
    <div class="p-4 border rounded mt-5">
        <h2 class="d-flex justify-content-center mb-4">Tạo thông báo mới</h2>
        <form id="news_post">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" placeholder="Nhập tiêu đề bài đăng" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea rows="5" class="form-control" placeholder="Nhập nội dung bài đăng" id="content" name="content"></textarea>
            </div>

            <div class="d-flex justify-content-around">
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="form-check-input" type="radio" name="type" id="radio_btn_1" value="chương trình khuyết mãi mới">
                    <label class="form-check-label" for="radio_btn_1">
                        Chương trình khuyết mãi mới
                    </label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="form-check-input" type="radio" name="type" id="radio_btn_2" value="sản phẩm mới">
                    <label class="form-check-label" for="radio_btn_2">
                        Sản phẩm mới
                    </label>
                </div>
            </div>

            <button type="button" id="submit_post" class="my-2 w-100 btn btn-primary">Đăng bài</button>
        </form>
    </div>
</div>

<!-- Toasts post result -->
<div aria-live="polite" aria-atomic="true">
    <div style="position: absolute; top: 3rem; right: 1rem;">
        <div class="toast fade" id="post-result" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto">Thông báo</strong>
                <small class="text-muted">bây giờ</small>
                <a id="close-post-result-toast" type="button" class="ml-2 mb-1 close">&times;</a>
            </div>
            <div id="messages" class="toast-body"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('#submit_post').click(() => {
            CreateNewPostProcess()
        })

        $('#close-post-result-toast').click(() => {
            location.reload();
        })
    })

    function CreateNewPostProcess() {
        let url = '<?= $root ?>Home/APICreateNewPostProcess';
        let form = document.querySelector('#news_post');
        let data = new FormData(form);

        fetch(url,{ body: data, method: "post" })
            .then((response) => {
                return response.json()
            })
            .then((data) => {
                $('#post-result').toast('show')
                if (data.status === "success") {
                    $('#messages').html(data.messages);
                } else if (data.status === "fail") {
                    $('#messages').html(data.messages);
                }

                setTimeout(function() {
                    $('#post-result').toast('hide')
                    $('#close-post-result-toast').click()
                }, 5000);
            })
    }
</script>