<div class="container">
    <div class="card">
        <div class="card-header">
            Sửa thông tin truyện
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('product/list') ?>" class="btn btn-primary">Danh sách truyện</a>
            <a href="<?php echo base_url('product/create') ?>" class="btn btn-primary">Thêm truyện</a>

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
            <form action="<?php echo base_url('product/update/' . $product->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên truyện:</label>
                    <input type="text" name="title" class="form-control" onkeyup="ChangeToSlug();" value="<?php echo $product->title ?>" id="slug" aria-describedby="emailHelp">
                    <?php echo '<span class="text-danger font-weight-bold">' . form_error('title') . '</span>' ?>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả</label>
                    <input type="text" name="description" class="form-control" value="<?php echo $product->description ?>" id="exampleInputPassword1">
                    <?php echo '<span class="text-danger font-weight-bold">' . form_error('description') . '</span>' ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giá:</label>
                    <input type="text" name="price" class="form-control" value="<?php echo $product->price ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class="text-danger font-weight-bold"> ' . form_error('price') . '</span>' ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" class="form-control" name="slug" value="<?php echo $product->slug ?>" id="convert_slug">
                    <?php echo '<span class="text-danger font-weight-bold">' . form_error('slug') . '</span>' ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Logo truyện:</label>
                    <input type="file" class="form-control-file" name="image" id="exampleInputPassword1">
                    <img src=" <?php echo base_url('uploads/product/') . $product->image ?>" width="70" height="70">
                    <small>
                        <?php if (isset($error)) {
                            echo $error;
                        } ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số lượng:</label>
                    <input type="text" name="quantity" class="form-control" value="<?php echo $product->quantity ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <?php echo '<span class="text-danger font-weight-bold">' . form_error('quantity') . '</span>' ?>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Danh mục truyện:</label>
                    <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                        <?php
                        foreach ($category as $key => $cate) {
                        ?>
                            <option <?php echo $cate->id == $product->category_id ? 'selected' : '' ?> value="<?php echo $cate->id ?>"><?php echo $cate->title ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nhà xuất bản:</label>
                    <select class="form-control" name="brand_id" id="exampleFormControlSelect1">
                        <?php
                        foreach ($brand as $key => $bra) {
                        ?>
                            <option <?php echo $bra->id == $product->brand_id ? 'selected' : '' ?> value="<?php echo $bra->id ?>"><?php echo $bra->title ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tình trạng</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                        <?php
                        if ($product->status == 1) {
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
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
</div>