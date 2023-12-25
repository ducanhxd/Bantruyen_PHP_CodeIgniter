<div class="container">
    <div class="card">
        <div class="card-header">
            Danh sách nhà xuất bản
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
            <a href="<?php echo base_url('brand/create') ?>" class="btn btn-primary">Thêm nhà xuất bản mới</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Tên nhà xuất bản</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Logo nhà xuất bản</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($brand as $key => $bra) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $key ?></th>
                            <td><?php echo $bra->title ?></td>
                            <td><?php echo $bra->slug ?></td>
                            <td><?php echo $bra->description ?></td>
                            <td>
                                <img src=" <?php echo base_url('uploads/brand/') . $bra->image ?>" width="150" height="150">
                            </td>
                            <td>
                                <?php
                                if ($bra->status == 1) {
                                    echo 'Còn hoạt động';
                                } else {
                                    echo 'Tạm ngưng hoạt động';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('brand/edit/' . $bra->id) ?>" class="btn btn-primary">Sửa</a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?php echo base_url('brand/delete/' . $bra->id) ?>" class="btn btn-danger">Xóa</a>
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