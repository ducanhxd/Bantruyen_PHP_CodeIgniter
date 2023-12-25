<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập vào tài khoản</h2>
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
                    <form action="<?php echo base_url("login-customer") ?>" method="POST">
                        <input type="email" name="email" style="border-radius: 10px;" placeholder="Email" />
                        <?php echo form_error('email'); ?>
                        <input type="password" name="password" style="border-radius: 10px;" placeholder="Mật khẩu" />
                        <?php echo form_error('password'); ?>
                        <button type="submit" class="btn btn-default" style="background-color:#6495ED">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or" style="background-color:#6495ED">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng ký người mua mới!</h2>
                    <form action="<?php echo base_url("dang-ky") ?>" method="POST">
                        <input type="text" style="border-radius: 10px;" name="name" placeholder="Họ và Tên" />
                        <?php echo form_error('name'); ?>
                        <input type="text" style="border-radius: 10px;" name="phone" placeholder="Số điện thoại" />
                        <?php echo form_error('phone'); ?>
                        <input type="text" style="border-radius: 10px;" name="address" placeholder="Địa chỉ" />
                        <?php echo form_error('address'); ?>
                        <input type="email" style="border-radius: 10px;" name="email" placeholder="Email" />
                        <?php echo form_error('email'); ?>
                        <input type="password" style="border-radius: 10px;" name="password" placeholder="Mật khẩu" />
                        <?php echo form_error('password'); ?>
                        <button type="submit" class="btn btn-default" style="background-color:#6495ED">Đăng ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->