<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="<?= $root . "public/myscript.js" ?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?= $root . "public/style.css" ?>">
    <style>
        html {
            overflow:   scroll;
        }
        ::-webkit-scrollbar {
            width: 0px;
            background: transparent; /* make scrollbar transparent */
        }
    </style>
</head>
<body>
    <div class="body">
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
                                    <div class="col-md-3">

                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="http://www.webandart.com/pjp01/images/Products/4X4.jpg" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Pizza hai san tuoi song</b></div>
                                                <p>Tom, muc, rau, xa lach</p>

                                                <div><b><i>199.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="pizza1" data-name="Pizza hai san tuoi song" data-price="199.000d">Chọn</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="http://www.webandart.com/pjp01/images/Products/4X4.jpg" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Pizza hai san tuoi song</b></div>
                                                <p>Tom, muc, rau, xa lach</p>

                                                <div><b><i>199.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="pizza2" data-name="Pizza hai san tuoi song" data-price="199.000d">Chọn</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="http://www.webandart.com/pjp01/images/Products/4X4.jpg" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Pizza hai san tuoi song</b></div>
                                                <p>Tom, muc, rau, xa lach</p>

                                                <div><b><i>199.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="pizza3" data-name="Pizza hai san tuoi song" data-price="199.000d">Chọn</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="http://www.webandart.com/pjp01/images/Products/4X4.jpg" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Pizza hai san tuoi song</b></div>
                                                <p>Tom, muc, rau, xa lach</p>

                                                <div><b><i>199.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="pizza4" data-name="Pizza hai san tuoi song" data-price="199.000d">Chọn</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="http://www.webandart.com/pjp01/images/Products/4X4.jpg" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Pizza hai san tuoi song</b></div>
                                                <p>Tom, muc, rau, xa lach</p>

                                                <div><b><i>199.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="pizza5" data-name="Pizza hai san tuoi song" data-price="199.000d">Chọn</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="http://www.webandart.com/pjp01/images/Products/4X4.jpg" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Pizza hai san tuoi song</b></div>
                                                <p>Tom, muc, rau, xa lach</p>

                                                <div><b><i>199.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="pizza6" data-name="Pizza hai san tuoi song" data-price="199.000d">Chọn</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="http://www.webandart.com/pjp01/images/Products/4X4.jpg" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Pizza hai san tuoi song</b></div>
                                                <p>Tom, muc, rau, xa lach</p>

                                                <div><b><i>199.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="pizza7" data-name="Pizza hai san tuoi song" data-price="199.000d">Chọn</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end pizza menu -->

                            <!-- drink menu -->
                            <div id="drinks" class="tab-pane fade"><br>
                                <div class="row m-2">
                                    <div class="col-md-3">
                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc98Tx-PI-Vk8hduN9dKTAQxnuRxOdpfz8Ow&usqp=CAU" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Coca cola</b></div>
                                                <p>Nuoc ngot</p>

                                                <div><b><i>39.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="drink1" data-name="Coca cola" data-price="39.000d">Chọn</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc98Tx-PI-Vk8hduN9dKTAQxnuRxOdpfz8Ow&usqp=CAU" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Coca cola</b></div>
                                                <p>Nuoc ngot</p>

                                                <div><b><i>39.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="drink2" data-name="Coca cola" data-price="39.000d">Chọn</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc98Tx-PI-Vk8hduN9dKTAQxnuRxOdpfz8Ow&usqp=CAU" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Coca cola</b></div>
                                                <p>Nuoc ngot</p>

                                                <div><b><i>39.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="drink3" data-name="Coca cola" data-price="39.000d">Chọn</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="rounded border ml-3 mb-3 p-2 shadow bg-white">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc98Tx-PI-Vk8hduN9dKTAQxnuRxOdpfz8Ow&usqp=CAU" class="img-thumbnail" width="100%" height="100%">

                                            <div class="content mt-2 ml-2">
                                                <div class=""><b>Coca cola</b></div>
                                                <p>Nuoc ngot</p>

                                                <div><b><i>39.000đ</i></b></div>
                                            </div>

                                            <hr>

                                            <div class="ml-auto btn btn-primary w-100 btn-choose" data-id="drink4" data-name="Coca cola" data-price="39.000d">Chọn</div>
                                        </div>
                                    </div>
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
                        <!-- <div class="d-inline-flex justify-content-center">
                            <h2>Đơn đặt hàng</h2>
                        </div> -->
                        <div class="d-flex justify-content-center">
                            <h2>Đơn đặt hàng</h2>
                        </div>

                        <div>
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
                                <input type="text" class="form-control" id="customer-phone-number">
                            </div>

                            <div class="form-group-inline">
                                <label for="note">Ghi chú</label>
                                <textarea type="text" class="form-control" id="note" rows="3" cols="50"></textarea>
                            </div>

                            <hr>

                            <div>
                                <h4>Thanh toán: </h4>

                                <div class="row d-flex justify-content-center">    
                                    <button data-toggle="modal" data-target="#Pay" data-by="1" class="mx-1 col-5 btn btn-success w-100">Tiền mặt</button>
                                    <button data-toggle="modal" data-target="#Pay" data-by="2"  class="mx-1 col-5 btn btn-danger w-100">Thẻ tín dụng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pay Method -->
    <div class="modal fade" id="Pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thanh toán bằng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="abc" method="GET">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="recipient-customer-phone-number" readonly>
                        </div>

                        <div id='pay-method-info'>
                            
                        </div>

                        <!-- <div class="form-group">
                            <label for="recipient-note" class="col-form-label">Ghi chú:</label>
                            <textarea class="form-control" id="recipient-note" readonly></textarea>
                        </div> -->

                        <div class="d-flex flex-row-reverse ">
                            <button type="button" class="ml-2 btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#Pay').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 

            // get paymethod (1: cash, 2: credit card)
            var recipient = button.data('by')

            var phoneNumber = $('#customer-phone-number').val()
            // var note = $('#note').val()
            var total = $('#total-price').text()

            var modal = $(this)

            // if customer choose paymethod = cash
            if (recipient === 1) {
                modal.find('.modal-title').text('Thanh toán bằng tiền mặt')

                modal.find('#pay-method-info').html(`
                    <div class="h4"><b>Tiền khách đưa: </b></div>
                    <div class="form-row flex-row-reverse">
                        <div class="form-group col-2">
                            <span class="h3"><b>VND</b></span>
                        </div>

                        <div class="form-group col-10">
                            <input class="form-control" type="number" id="cash">
                        </div>
                    </div>
                    
                    <div class="h4"><b>Tổng tiền: </b></div>
                    <div class="d-flex flex-row-reverse align-items-center">
                        <div class="h3 mr-2"><b id="recipient-total">0</b></div>
                    </div>
                    

                    <hr>

                    <div class="h4"><b>Tiền thừa: </b></div>
                    <div class="d-flex flex-row-reverse align-items-center">
                        <div class="h3 mr-2"><b id="customer-change">0</b></div>
                    </div>
                `)
                
            } // if customer choose paymethod = credit card
            else {
                modal.find('.modal-title').text('Thanh toán bằng thẻ tín dụng')

                modal.find('#pay-method-info').html(`
                    <div class="h4"><b>Số tài khoản: </b></div>
                    <div class="form-row flex-row-reverse">
                        <div class="form-group col-12">
                            <input class="form-control" type="number">
                        </div>
                    </div>

                    <div class="h4"><b>Tổng tiền: </b></div>
                    <div class="d-flex flex-row-reverse align-items-center">
                        <div class="h3 mr-2"><b id="recipient-total">0</b></div>
                    </div>
                `)
            }

            modal.find('#recipient-customer-phone-number').val(phoneNumber)
            // modal.find('#recipient-note').val(note)
            modal.find('#recipient-total').text(total)

        })

        $('#cash').change(() => {

            // change format as currency to int
            let total = parseInt($('#recipient-total').text()).toLocaleString() * 1000

            // change the cast customer pay to int
            let cash = parseInt($('#cash').val(), 10)

            let change = total - cash
            $('#customer-change').text(change)
        })
    </script>
</body>
</html>

