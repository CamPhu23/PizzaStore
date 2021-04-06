<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>

    <?php require_once "./mvc/views/pages/head.php" ?>
    <link rel="stylesheet" href="<?= $root . "public/style.css" ?>">
    <style>
        html {
            overflow:   scroll;
        }
        ::-webkit-scrollbar {
            width: 0px;
            background: transparent; /* make scrollbar transparent */
        }

        .description {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="body">
    <?php require_once "./mvc/views/pages/header.php" ?>
    <div class="row">
        <div class="col-md-8">
            <div class="my-3 ml-3">
                <!-- menu -->
                <div class="shadow p-4 mt-3 mb-3 mx-3 bg-white rounded">
                    <div class="row mx-2">
                        <h2 class="col-md-8">Danh sách món ăn và thức uống</h2>

                        <div class="col-md-4">
                            <div class="d-flex flex-row-reverse">
                                <form action="">
                                    <div class="input-group">
                                        <div class="form-outline">
                                            <input id="search-input" type="search" id="form1" class="form-control" placeholder="Tìm kiếm"/>
                                        </div>
                                        <button id="search-button" type="submit" class="btn btn-primary h-50">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#pizzas">Pizzas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#drinks">Nước uống</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#foods">Món ăn kèm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#combos">Combo</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- pizza menu -->
                        <div id="pizzas" class="tab-pane active"><br>
                            <div class="row m-2">
                                <?php 
                                    $ProductList = $data["ProductList"];
                                    for($i = 0; $i < count($ProductList); $i++) 
                                    {
                                            $row = $ProductList[$i];
                                            ?>
                                            <div class="col-md-3">
                                            <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                                <img src="http://www.webandart.com/pjp01/images/Products/4X4.jpg" class="img-thumbnail" width="100%" height="100%">

                                                <div class="content mt-2 ml-2">
                                                    <div><b><?= $row["name"]?></b></div>
                                                    <p class="description"><?= $row["description"]?></p>

                                                    <div><b><i><?= $row["price"]?></i></b></div>
                                                </div>

                                                <hr>

                                                <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="<?=$row["id"]?>" data-name="<?= $row["name"]?>" data-price="<?= $row["price"]?>">Chọn</div>
                                            </div>
                                        </div>
                                    <?php
                                        }   
                                    ?>  
                            </div>
                        </div>
                        <!-- end pizza menu -->

                        <!-- drink menu -->
                        <div id="drinks" class="tab-pane fade"><br>
                            <div class="row m-2">
                                <?php 
                                    $WaterList = $data["WaterList"];
                                    for($i = 0; $i < count($WaterList); $i++) {
                                        $row = $WaterList[$i];
                                    ?>
                                        <div class="col-md-3">
                                            <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc98Tx-PI-Vk8hduN9dKTAQxnuRxOdpfz8Ow&usqp=CAU" class="img-thumbnail" width="100%" height="100%">

                                                <div class="content mt-2 ml-2">
                                                    <div class=""><b><?=$row["name"]?></b></div>
                                                    <p class="description"><?=$row["description"]?></p>

                                                    <div><b><i><?=$row["price"]?>đ</i></b></div>
                                                </div>

                                                <hr>

                                                <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="<?= $row["id"]?>" data-name="<?= $row["name"]?>" data-price="<?= $row["price"]?>">Chọn</div>
                                            </div>
                                        </div>

                                    <?php 
                                    } ?>
                            </div>
                        </div>
                        <!-- end drink menu -->

                        <!-- food menu -->
                        <div id="foods" class="tab-pane fade"><br>
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                        <img src="http://vietsin.vn/wp-content/uploads/2017/10/xuc-xich-xong-khoi2-600x400.jpg" class="img-thumbnail" width="100%" height="100%">

                                        <div class="content mt-2 ml-2">
                                            <div><b>Xuc xich chien gion</b></div>
                                            <p>Xuc xich, xa lach, ca rot</p>

                                            <div><b><i>89.000đ</i></b></div>
                                        </div>

                                        <hr>

                                        <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="food1" data-name="Xuc xich chien gion" data-price="89.000d">Chọn</div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                        <img src="http://vietsin.vn/wp-content/uploads/2017/10/xuc-xich-xong-khoi2-600x400.jpg" class="img-thumbnail" width="100%" height="100%">

                                        <div class="content mt-2 ml-2">
                                            <div><b>Xuc xich chien gion</b></div>
                                            <p>Xuc xich, xa lach, ca rot</p>

                                            <div><b><i>89.000đ</i></b></div>
                                        </div>

                                        <hr>

                                        <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="food2" data-name="Xuc xich chien gion" data-price="89.000d">Chọn</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end food menu -->

                        <!-- combo menu -->
                        <div id="combos" class="tab-pane fade"><br>
                            <div class="row m-2">
                                <div class="col-md-3">
                                    <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                        <img src="https://3rau.vn/wp-content/uploads/2019/08/combo-pizza-hai-san-pepsi-600x600.jpg" class="img-thumbnail" width="100%" height="100%">

                                        <div class="content mt-2 ml-2">
                                            <div class=""><b>Pizza hai san + nuoc</b></div>
                                            <p>Tom, muc, rau cu, nuoc ngot</p>

                                            <div><b><i>99.000đ</i></b></div>
                                        </div>

                                        <hr>

                                        <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="combo1" data-name="Pizza hai san + nuoc" data-price="99.000d">Chọn</div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                        <img src="https://3rau.vn/wp-content/uploads/2019/08/combo-pizza-hai-san-pepsi-600x600.jpg" class="img-thumbnail" width="100%" height="100%">

                                        <div class="content mt-2 ml-2">
                                            <div class=""><b>Pizza hai san + nuoc</b></div>
                                            <p>Tom, muc, rau cu, nuoc ngot</p>

                                            <div><b><i>99.000đ</i></b></div>
                                        </div>

                                        <hr>

                                        <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="combo2" data-name="Pizza hai san + nuoc" data-price="99.000d">Chọn</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end combo menu -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mt-3 mr-3">
                <div class="shadow p-3 mt-3 mb-3 mx-3 bg-white rounded">
                    <div class="d-flex justify-content-center">
                        <h2>Đơn đặt hàng</h2>
                    </div>

                    <form id="order-form" action="CreateNewOrderProcess" method="POST">
                        <table class="table table-striped" id="order-table">
                            <thead>
                            <tr>
                                <th scope="col" colspan="3">Tên món</th>
                                <th scope="col">SL</th>
                                <th scope="col" colspan="2">Đơn giá</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="order">
                            </tbody>
                        </table>

                        <div class="d-flex flex-row-reverse align-items-center">
                            <div class="h3 mx-4"><b id="total-price">0 VND</b></div>
                            <div class="h4"><b>Tổng tiền: </b></div>
                        </div>

                        <hr>

                        <div class="form-group-inline">
                            <label for="customer-phone-number">Số điện thoại khách hàng</label>
                            <input type="text" class="form-control" id="customer-phone-number" name="customer-phone-number" onkeyup="phoneNumberCheck()" placeholder="Nhập số điện thoại khách hàng">
                        </div>
                        <small class="errorMess" style="color: red;"></small>

                        <div class="form-group-inline">
                            <label for="note">Ghi chú</label>
                            <textarea type="text" class="form-control" id="note" rows="3" cols="50" name="note"></textarea>
                        </div>

                        <hr>

                        <div>
                            <h4>Thanh toán: </h4>

                            <div class="row d-flex justify-content-center">
                                <button id="btn-cash" type="button" data-toggle="modal" data-target="#PayCash" class="mx-1 col-5 btn btn-success w-100" disabled>Tiền mặt</button>
                                <button id="btn-credit-card" type="button" data-toggle="modal" data-target="#PayCreditCard" class="mx-1 col-5 btn btn-danger w-100" disabled>Thẻ tín dụng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pay Method - Cash -->
<div class="modal fade" id="PayCash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thanh toán bằng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div>

                        <div class="h4"><b>Tiền khách đưa: </b></div>
                        <div class="form-row flex-row-reverse">
                            <div class="form-group col-2">
                                <span class="h3"><b>VND</b></span>
                            </div>

                            <div class="form-group col-10">
                                <input class="form-control" type="number" id="cash" min="0">
                            </div>
                        </div>

                        <div class="h4"><b>Tổng tiền: </b></div>
                        <div class="d-flex flex-row-reverse align-items-center">
                            <div class="h3 mr-2"><b class="recipient-total">0</b></div>
                        </div>


                        <hr>

                        <div class="h4"><b>Tiền thừa: </b></div>
                        <div class="d-flex flex-row-reverse align-items-center">
                            <div class="h3 mr-2"><b id="customer-change">0</b></div>
                        </div>

                        </div>

                        <div class="d-flex flex-row-reverse ">
                            <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="button" id="confirm-cash" class="btn btn-primary">Xác nhận</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pay Method - Credit Card -->
<div class="modal fade" id="PayCreditCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thanh toán bằng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div>
                        <div>
                            <div class="h4"><b>Số tài khoản: </b></div>
                            <div class="form-row flex-row-reverse">
                                <div class="form-group col-12">
                                    <input id="credit-card-id" class="form-control" type="number">
                                </div>
                            </div>

                            <div class="h4"><b>Tổng tiền: </b></div>
                            <div class="d-flex flex-row-reverse align-items-center">
                                <div class="h3 mr-2"><b class="recipient-total">0</b></div>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse ">
                            <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="button" id="confirm-credit-card" class="btn btn-primary">Xác nhận</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toasts order result -->
<div aria-live="polite" aria-atomic="true">
    <div style="position: absolute; top: 3rem; right: 1rem;">
        <div class="toast fade" id="order-result" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto">Thông báo</strong>
                <small class="text-muted">bây giờ</small>
                <a id="close-order-result-toast" type="button" class="ml-2 mb-1 close">&times;</a>
            </div>
            <div id="messages" class="toast-body"></div>
        </div>
    </div>
</div>

<!-- Modal BILL -->
<div class="modal fade" id="IssueInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hóa đơn</h5>
                <button id="btn-invoice-close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div>
                    <h2 class="d-flex justify-content-center text-center" id="store-name"><b> Tên cửa hàng </b></h2>
                    <h4 class="d-flex justify-content-center text-center" id="store-address">Địa chỉ cửa hàng</h4>
                    <h5 class="d-flex justify-content-center text-center" id="store-phone-number">Số điện thoại</h5>
                </div>

                <hr>

                <div class="mt-2" id="invoice-id">Mã hóa đơn: </div>
                <div class="mt-2" id="invoice-date">Ngày thanh toán: </div>
                
                <div class="row mt-2">
                    <div class="col-6" id="invoice-customer-name">Khách hàng: </div>
                    <div class="col-6" id="invoice-customer-phone-number">Số điện thoại: </div>
                </div>

                <div class="mt-2" id="invoice-seller-name">Người bán: </div>

                <div class="mt-4">
                    <table class="table table-striped" id="order-table">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Mã sản phẩm</th>
                                <th scope="col" colspan="3">Tên món</th>
                                <th scope="col">SL</th>
                                <th scope="col" colspan="2">Giá sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody id="invoice-tbody">
                        </tbody>
                    </table>
                </div>

                <div class="row d-flex flex-row-reverse ">
                    <div class="col-5 text-right mr-4" id="invoice-total"></div>
                    <div class="col-5 text-right">Tổng tiền: </div>
                </div>

                <div class="row d-flex flex-row-reverse ">
                    <div class="col-5 text-right mr-4" id="invoice-change"></div>
                    <div class="col-5 text-right">Trả lại: </div>
                </div>
                
                <div class="row d-flex flex-row-reverse ">
                    <div class="col-5 text-right mr-4" id="invoice-payment-method"></div>
                    <div class="col-5 text-right">Phương thức thanh toán: </div>
                </div>
                
                <div class="row d-flex flex-row-reverse ">
                    <div class="col-5 text-right mr-4 h4"><b><span id="invoice-customer-pay"></span></b></div>
                    <div class="col-5 text-right h4"><b>Khách đưa: </b></div>
                </div>

                <hr>

                <div class="h3 d-flex justify-content-center">Xin cảm ơn quý khách!</div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('#btn-invoice-close').click(() => {
            location.reload();
        })

        $('#close-order-result-toast').click(() => {
            $('#IssueInvoice').modal('show')
        })

        // $('#close-print-bill').click(() => {
        //     // let url = $('#close-toast').data('url')
        //     // location.reload();
        // })

        $('#btn-cash, #btn-credit-card').click(() => {
            let total = $('#total-price').text()
            $('.recipient-total').text(total)
            $('#cash').val("")
            $('#customer-change').text("0")
        })

        $('#confirm-cash').click(() => {
            let total_price = parseFloat($('.recipient-total').text().replace(/\./g,'').replace(',', '.'), 10)

            let cash = $('#cash').val()

            let change = parseFloat($('#customer-change').text().replace(/\./g,'').replace(',', '.'), 10) 

            $('#order-form').append(`
                <input id="cash" name="cash" hidden value="${cash}">
                <input id="change" name="change" hidden value="${change}">
            `)

            $('#order-form').append(`
                <input name="total_price" hidden value="${total_price}">
            `)
            CreateNewOrderProcess();
            
        })

        $('#confirm-credit-card').click(() => {
            let total_price = parseFloat($('.recipient-total').text().replace(/\./g,'').replace(',', '.'), 10)
            
            let id = $('#credit-card-id').val()

            console.log('credit')

            $('#order-form').append(`
                <input id="cash" name="credit_card_id" hidden value="${id}">
            `)

            $('#order-form').append(`
                <input name="total_price" hidden value="${total_price}">
            `)
            CreateNewOrderProcess();

        })

        $('#cash').change(() => {
            $.ajaxSetup ({cache: false });
            // change format as currency to float
            let total = parseFloat($('.recipient-total').text().replace(/\./g,'').replace(',', '.'), 10)

            // change the cast customer pay to float
            let cash = parseFloat($('#cash').val(), 10)

            let change = cash - total

            if (change < 0) {
                $('#confirm-cash').attr('disabled', true)
            }
            if (change >= 0) {
                $('#confirm-cash').removeAttr("disabled")
            }

            // currency format VND
            change = change.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            $('#customer-change').text(change)
        })
    })

    function IssueInvoice(info) {
        $('#store-name').text(info["storeName"])
        $('#store-phone-number').text(info["storePhone"])
        $('#store-address').text(info["storeAddress"])

        $('#invoice-id').append(info["bill_ID"])
        $('#invoice-date').append(info["paymentTime"])
        $('#invoice-customer-name').append(info["customerName"])
        $('#invoice-customer-phone-number').append(info["customerPhone"])

        $('#invoice-seller-name').append(info["sellerName"])

        let total = parseInt(info["totalPrice"]).toLocaleString('it-IT', {style : 'currency', currency : 'VND'})
        $('#invoice-total').append(total)

        let change = parseInt(info["customerChange"]).toLocaleString('it-IT', {style : 'currency', currency : 'VND'})
        $('#invoice-change').append(change)

        let cash = parseInt(info["customerPay"]).toLocaleString('it-IT', {style : 'currency', currency : 'VND'})
        $('#invoice-customer-pay').append(cash)

        $('#invoice-payment-method').append(info["paymentMethod"])

        $.each(info["items"], (index, value) => {

            $('#invoice-tbody').append(`
            <tr class="p-2">
                <td colspan="3">${value}</td>
                <td colspan="3">${info["itemsName"][index]}</td>
                <td>${info["quantity"][index]}</td>
                <td colspan="2">${info["itemCost"][index]} VND</td>
            </tr>
`)
        })
    }

    function CreateNewOrderProcess() {
        let url = '<?= $root ?>Home/CreateNewOrderProcess';
        var form = document.querySelector('#order-form');
        var data = new FormData(form);

        fetch(url,{ body: data, method: "post" })
            .then((response) => {
                return response.json()
            })
            .then((data) => {
                
                if (data.code === 1) {
                    $('#PayCash').modal('hide');
                } else if (data.code === 2) {
                    $('#PayCreditCard').modal('hide');
                } 
                
                $('#messages').html(data.message);
                $('#order-result').toast('show')

                setTimeout(() => {
                    $('#order-result').toast('hide')
                    $('#close-order-result-toast').click()
                }, 5000);
                
                IssueInvoice(data.data);
            })
    }


    function phoneNumberCheck() {
        let phone = $('#customer-phone-number').val();
        let btnCash = $('#btn-cash');
        let btnCard = $('#btn-credit-card');

        if ($.trim(phone).length > 0) {
            btnCash.prop('disabled', false);
            btnCard.prop('disabled', false);
        } else {
            btnCash.prop('disabled', true);
            btnCard.prop('disabled', true);
        }
    }
</script>
</body>
</html>

