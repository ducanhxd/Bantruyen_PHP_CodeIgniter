<div class="container">
    <div class="card">
        <div class="card-header">
            Danh sách danh mục của truyện
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
            <a href="<?php echo base_url('category/create') ?>" class="btn btn-primary">Thêm danh mục truyện</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Số thứ tự</th>
                        <th scope="col">Danh mục truyện</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Logo danh mục truyện</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($category as $key => $cate) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $key ?></th>
                            <td><?php echo $cate->title ?></td>
                            <td><?php echo $cate->slug ?></td>
                            <td><?php echo $cate->description ?></td>
                            <td>
                                <img src=" <?php echo base_url('uploads/category/') . $cate->image ?>" width="150" height="150">
                            </td>
                            <td>
                                <?php
                                if ($cate->status == 1) {
                                    echo 'Còn hoạt động';
                                } else {
                                    echo 'Tạm ngưng hoạt động';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('category/edit/' . $cate->id) ?>" class="btn btn-primary">Sửa</a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="<?php echo base_url('category/delete/' . $cate->id) ?>" class="btn btn-danger">Xóa</a>
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