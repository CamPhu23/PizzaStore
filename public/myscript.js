$(document).ready(() => {
    $('.btn-choose').click(e => {
        let id = $(e.target).data('id')

        isExist = checkExist(id);

        if (!isExist) {
            let name = $(e.target).data('name')
            let price = $(e.target).data('price')

            $('#order').append(`
                <tr class="p-2">
                    <td hidden><input type="text" name="id_product[]" value="${id}"></td>
                    <td colspan="3">${name}</td>
                    <td><input class="quantity" type="number" min="1" max="9" value="1" name="quantity[]"></td>
                    <td colspan="2">${price}</td>
                    <td><div class="btn btn-danger btn-sm remove"><i class="fa fa-trash" aria-hidden="true"></i></div></td>
                </tr>`)
        }

        calTotal()
    });

    $('table').on('click', '.remove', function(e) {
        $(this).closest('tr').remove()

        calTotal()
    })
})

function checkLogin() {
    let usernameBox = document.getElementById('username');
    let passwordBox = document.getElementById('password');
    let error = document.getElementById("error_login");

    let username = usernameBox.value;
    let password = passwordBox.value;

    error.style.color = "red";
    if (username.length === 0) {
        error.innerHTML = "Tên người dùng bỏ trống";
        usernameBox.focus();
    } else if (password.length === 0) {
        error.innerHTML = "Mật khẩu người dùng bỏ trống";
        passwordBox.focus();

    } else if (password.length < 6 || password.length > 15) {
        error.innerHTML = "Mật khẩu phải có từ 6 tới 15 ký tự";
        passwordBox.focus();

    } else {
        return true;
    }
    return false;
}

function calTotal() {
    let tbody = $('tbody');
    let subTotal = Array.from(tbody[0].rows).reduce((total, row) => {
        return total + (parseFloat(row.cells[3].innerHTML) * row.cells[2].children[0].value);
    }, 0);

    //convert money format
    let result = subTotal.toLocaleString('it-IT', { style: 'currency', currency: 'VND' });
    $('#total-price').html(result)
}

function checkExist(id) {
    let tbody = $('tbody');
    console.log();
    let arr = Array.from(tbody[0].rows);

    for (let i = 0; i < arr.length; i++) {
        let currentId = arr[i].cells[0].children[0].value

        if (currentId === id) {
            let quan = parseInt(arr[i].cells[2].children[0].value) + 1
            arr[i].cells[2].children[0].value = quan
            return true;
        }
    }
    return false
}

function checkOrderComplete() {
    let id = $('#orderId')
    let error = $('.errorMess');

    if ($.trim(id.val()) === '') {
        error.html('Bạn chưa nhập mã đơn hàng')
        id.focus()
        return false
    }

    return true
}