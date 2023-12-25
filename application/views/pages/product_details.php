<section>
    <div class="container">
        <div class="row">
            <?php $this->load->view('pages/template/sidebar'); ?>



            <div class="col-sm-9 padding-right">
                <?php
                foreach ($product_details as $key => $pro) {
                ?>
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo base_url('uploads/product/' . $pro->image) ?>" alt="<?php echo $pro->title ?>" />
                            </div>

                        </div>
                        <form action="<?php echo base_url("add-to-cart") ?>" method="POST">
                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                    <h2><?php echo $pro->title ?></h2>
                                    <input type="hidden" value="<?php echo $pro->id ?>" name="product_id">
                                    <img src="images/product-details/rating.png" alt="" />
                                    <span>
                                        <span><?php echo number_format($pro->price, 0, ',', '.') ?>VNĐ</span><br />
                                        <br /><br /><label>Số lượng: <?php echo $pro->quantity ?></label>
                                        <input type="number" min="1" value="1" name="quantity" />
                                        <button type="submit" class="btn btn-default cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm vào giỏ hàng
                                        </button>
                                    </span>
                                    <p><b>Tình trạng:</b> Còn hàng</p>
                                    <p><b>Nhà xuất bản:</b> <?php echo $pro->tennhaxuatban ?></p>
                                    <p><b>Danh mục:</b> <?php echo $pro->tendanhmuc ?></p>
                                    <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
                                </div><!--/product-information-->
                            </div>
                        </form>
                    </div><!--/product-details-->

                <?php
                }
                ?>
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá (1)</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade active in" id="reviews">
                        <div class="col-sm-12">
                            <ul>
                                <li><a href=""><i class="fa fa-user"></i>Test</a></li>
                                <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM (Test)</a></li>
                                <li><a href=""><i class="fa fa-calendar-o"></i>12/05/2023 (Test)</a></li>
                            </ul>
                            <p>Comment Cảm nhận(Test).</p>
                            <br />
                            <hr />
                            <p><b>Viết cảm nhận của bạn về bộ sách này:</b></p>


                            <form action="#">
                                <span>
                                    <input type="text" placeholder="Tên của bạn" />
                                    <input type="email" placeholder="Địa chỉ email" />
                                </span>
                                <textarea name="" placeholder="Nhập cảm nghĩ của bạn..."></textarea>
                                <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                <button type="button" class="btn btn-default pull-right">
                                    Đăng
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div><!--/category-tab-->


        </div>
    </div>
    </div>
</section>