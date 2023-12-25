<div class="container">
    <div class="card">
        <div class="card-header">
            Sửa danh mục truyện
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('category/list') ?>" class="btn btn-primary">Xem tất cả danh mục truyện</a>
            <a href="<?php echo base_url('category/create') ?>" class="btn btn-success">Thêm danh mục truyện mới</a>

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
            <form action="<?php echo base_url('category/update/' . $category->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục truyện:</label>
                    <input type="text" name="title" value="<?php echo $category->title ?>" class="form-control" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp">
                    <?php echo '<span class="text-danger font-weight-bold">' . form_error('title') . '</span>' ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $category->description ?>" id="exampleInputPassword1">
                    <?php echo '<span class="text-danger font-weight-bold">' . form_error('description') . '</span>' ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" class="form-control" name="slug" value="<?php echo $category->slug ?>" id="convert_slug">
                    <?php echo '<span class="text-danger font-weight-bold">' . form_error('slug') . '</span>' ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Logo danh mục truyện:</label>
                    <input type="file" class="form-control-file" name="image" id="exampleInputPassword1">
                    <img src=" <?php echo base_url('uploads/category/') . $category->image ?>" width="150" height="150">

                    <small>
                        <?php if (isset($error)) {
                            echo $error;
                        } ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tình trạng</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                        <?php
                        if ($category->status == 1) {
                        ?>
                            <option selected value="1"> Còn hoạt động</option>
                            <option value="0">Tạm ngưng hoạt động</option>
                        <?php
                        } else {
                        ?>
                            <option value="1"> Còn hoạt động </option>
                            <option selected value="0">Tạm ngưng hoạt động</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
        </div>
    </div>
</div>