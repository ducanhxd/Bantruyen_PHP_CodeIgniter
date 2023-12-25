<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Danh mục sách</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <?php
            foreach ($category as $key => $cate) {
            ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="<?php echo base_url('danh-muc/' . $cate->id . '/' . $cate->slug) ?>"><?php echo $cate->title ?></a></h4>
                    </div>
                </div>
            <?php
            }
            ?>
        </div><!--/category-products-->

        <div class="brands_products"><!--brands_products-->
            <h2>Nhà xuất bản</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?php
                    foreach ($brand as $key => $bra) {
                    ?>
                        <li><a href="<?php echo base_url('nha-xuat-ban/' . $bra->id . '/' . $bra->slug) ?>"></span><?php echo $bra->title ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div><!--/brands_products-->


    </div>
</div>