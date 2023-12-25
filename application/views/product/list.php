<div class="container">
    <div class="card">
        <div class="card-header">
            Danh sách truyện
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
            <a href="<?php echo base_url('product/create') ?>" class="btn btn-primary">Thêm truyện</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tên truyện</th>
                        <th scope="col">Danh mục truyện</th>
                        <th scope="col">Nhà xuất bản</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Logo danh mục truyện</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($product as $key => $pro) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $key ?></th>
                            <td><?php echo $pro->title ?></td>
                            <td><?php echo $pro->tendanhmuc ?></td>
                            <td><?php echo $pro->tennhaxuatban ?></td>
                            <td><?php echo $pro->slug ?></td>
                            <td><?php echo $pro->description ?></td>
                            <td><?php echo number_format($pro->price, 0, ',', '.') ?>VND</td>
                            <td>
                                <img src=" <?php echo base_url('uploads/product/') . $pro->image ?>" width="70" height="70">
                            </td>
                            <td><?php echo $pro->quantity ?></td>

                            <td>
                                <?php
                                if ($pro->status == 1) {
                                    echo 'Còn hoạt động';
                                } else {
                                    echo 'Tạm ngưng hoạt động';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('product/edit/' . $pro->id) ?>" class="btn btn-primary">Sửa</a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?php echo base_url('product/delete/' . $pro->id) ?>" class="btn btn-danger">Xóa</a>
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