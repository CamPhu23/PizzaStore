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
                            <tbody>
                            </tbody>
                        </table>

                        <div class="d-flex flex-row-reverse align-items-center">
                            <div class="h3 mx-4"><b id="total-price">0 VND</b></div>
                            <div class="h4"><b>Tổng tiền: </b></div>
                        </div>

                        <hr>

                        <div class="form-group-inline">
                            <label for="customer-phone-number">Số điện thoại khách hàng</label>
                            <input type="text" class="form-control" id="customer-phone-number" name="customer-phone-number" onkeyup="success()" placeholder="Nhập số điện thoại khách hàng">
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="d-flex flex-row-reverse ">
                        <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="confirm-credit-card" class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
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
        })

        $('#confirm-cash').click(() => {
            let total_price = parseInt($('.recipient-total').text()).toLocaleString() * 1000

            let cash = $('#cash').val()
            let change = parseInt($('#customer-change').text()).toLocaleString()

            console.log('cash')

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
            let total_price = parseInt($('.recipient-total').text()).toLocaleString() * 1000
            
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
            // change format as currency to int
            let total = parseInt($('.recipient-total').text()).toLocaleString() * 1000

            // change the cast customer pay to int
            let cash = parseInt($('#cash').val(), 10)

            let change = cash - total

            if (change < 0) {
                $('.confirm-payment').attr('disabled', true)
            }
            if (change >= 0) {
                $('.confirm-payment').removeAttr("disabled")
            }

            // currency format VND
            change = change.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            $('#customer-change').text(change)
        })
    })

    function CreateNewOrderProcess() {
        let url = '<?= $root ?>Home/CreateNewOrderProcess';
        var form = document.querySelector('#order-form');
        var data = new FormData(form);

        fetch(url,{ body: data, method: "post" })
            .then((response) => {
                return response.json()
            })
            .then((data) => {
                $('#order-result').toast('show')
                if (data.code === 1) {
                    console.log('code 1')
                    $('#PayCash').modal('hide');

                    $('#messages').html(data.message);
                } else if (data.code === 2) {
                    console.log('code 2')
                    $('#PayCreditCard').modal('hide');
                    $('#order-result').toast('show')

                    $('#messages').html(data.message);
                }

                setTimeout(function() {
                    $('#order-result').toast('hide')
                    $('#close-order-result-toast').click()
                }, 5000);
            })
    }
</script>
</body>
</html>

