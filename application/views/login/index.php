<div class="container">
    <h1 style="text-align:center">Trang Admin</h1>
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
    <form action="<?php echo base_url('login-user') ?>" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Nhập Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email">
            <?php echo form_error('email'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật Khẩu</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <?php echo form_error('password'); ?>

        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>
</div>