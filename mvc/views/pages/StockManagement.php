<div class="col-lg-12 shadow p-2 mb-3 rounded">
    <h5 class="text-center my-3">QUẢN LÝ KHO</h5>
    <div class="d-flex flex-row-reverse">
        <button id="orderByCharacter" class="mb-3 mr-2 btn btn-primary">
            Sắp xếp theo tên
        </button>
        <button id="orderByAsQuantity" class="mb-3 mr-2 btn btn-primary">
            Sắp xếp theo số lượng ít nhất
        </button>
        <button id="orderByDesQuantity" class="mb-3 mr-2 btn btn-primary">
            Sắp xếp theo số lượng nhiều nhất
        </button>
    </div>
    <table class="table text-center table-hover">
        <thead>
        <tr>
            <th scope="col">Mã nguyên liệu</th>
            <th scope="col">Tên nguyên liệu</th>
            <th scope="col">Số lượng</th>
        </tr>
        </thead>
        <tbody>

        <?php
            $GoodsList = $data["List"];

            if ($GoodsList != false) {
                for ($i = 0; $i < count($GoodsList); $i++)
                {
                    $row = $GoodsList[$i];
                    ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["goods_name"] ?></td>
                        <td><?= $row["quantity"] ?></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="3">Không tồn tại nguyên liệu trong kho</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(() => {
        $("#orderByCharacter").click(() => {
            let url = '<?= $root ?>Home/APIStockManagement_Character';

            fetch(url)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    display(data);
                });

        });

        $("#orderByAsQuantity").click(() => {
            let url = '<?= $root ?>Home/APIStockManagement_AsQuantity';

            fetch(url)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    display(data);
                });
        });

        $("#orderByDesQuantity").click(() => {
            let url = '<?= $root ?>Home/APIStockManagement_DesQuantity';

            fetch(url)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {
                    display(data);
                });
        })
    })

    function display(data) {
        $("tbody").empty();
        data.forEach((item) => {
            let id = item.id
            let name = item.goods_name
            let quantity = item.quantity

            $('tbody').append(`
                <tr>
                    <td>${id}</td>
                    <td>${name}</td>
                    <td>${quantity}</td>
                </tr>
            `)
        })
    }
</script>
