<div class="col-lg-12 shadow p-2 mb-3 rounded">
    <h5 class="text-center my-3">QUẢN LÝ KHO</h5>
    <div class="d-flex flex-row-reverse">
        <button class="mb-3 mr-2 btn btn-primary">
            Sắp xếp theo tên
        </button>
        <button class="mb-3 mr-2 btn btn-primary">
            Sắp xếp theo số lượng ít nhất
        </button>
        <button class="mb-3 mr-2 btn btn-primary">
            Sắp xếp theo số lượng nhiều nhất
        </button>
    </div>
    <table class="table text-center table-hover">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên nguyên liệu</th>
            <th scope="col">Số lượng</th>
        </tr>
        </thead>
        <tbody>

        <?php
            $GoodsList = $data["List"];
            // var_dump($GoodsList);
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
            ?>
        </tbody>
    </table>
</div>