<div class="container">
    <div class="card">
        <div class="card-header">
            Danh sách đơn hàng
        </div>
        <?php
        if ($this->session->flashdata('success')) {
        ?>
            <div class="alert alert-success"> <?php echo $this->session->flashdata('success') ?> </div>
        <?php
        } elseif ($this->session->flashdata('error')) {
        ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
        <?php
        }
        ?>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên người đặt hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($order as $key => $ord) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $key ?></th>
                            <td><?php echo $ord->order_code ?></td>
                            <td><?php echo $ord->name ?></td>
                            <td><?php echo $ord->phone ?></td>
                            <td><?php echo $ord->address ?></td>
                            <td>
                                <?php
                                if ($ord->status == 1) {
                                    echo '<span class="text text-primary">Đang chờ xử lý</span>';
                                } elseif ($ord->status == 2) {
                                    echo '<span class="text text-success">Đã giao hàng</span>';
                                } else {
                                    echo '<span class="text text-danger">Đã hủy</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('order/view/' . $ord->order_code) ?>" class="btn btn-primary">Chi tiết</a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?php echo base_url('order/delete/' . $ord->order_code) ?>" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>