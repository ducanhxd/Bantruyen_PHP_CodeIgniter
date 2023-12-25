<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
            if ($this->cart->contents()) {
            ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu" align="center">
                            <td class="description">Ảnh</td>
                            <td class="image">Truyện</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số Lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $subtotal = 0;
                        $total = 0;
                        ?>
                        <?php foreach ($this->cart->contents() as $items) {
                            $subtotal = $items['qty'] * $items['price'];
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td class="cart_product">
                                    <a style="margin-right:40px" href=""><img src="<?php echo base_url('uploads/product/' . $items["options"]["image"]) ?>" width="130" height="200" alt="<?php echo $items["name"] ?>"></a>
                                </td>
                                <td class="cart_description">
                                    <h4 style="text-align:center"><a href=""><?php echo $items["name"] ?></a></h4>
                                </td>
                                <td class="cart_price">
                                    <p style="text-align:center"><?php echo number_format($items["price"], 0, ',', '.') ?>VNĐ</p>
                                </td>
                                <td class="cart_quantity">
                                    <form action="<?php echo base_url("update-cart-item") ?>" method="POST">
                                        <div class="cart_quantity_button">
                                            <input type="hidden" value="<?php echo $items['rowid'] ?>" name="rowid">
                                            <input class="cart_quantity_input" type="number" min="1" name="quantity" value="<?php echo $items["qty"] ?>" autocomplete="off" size="2">
                                            <input type="submit" name="capnhat" class="btn btn-primary" value="Cập nhật" style="margin-top: -1px"></input>
                                        </div>
                                    </form>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" style="text-align:center"><?php echo number_format($subtotal, 0, ',', '.') ?>VNĐ</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="<?php echo base_url("delete-item/" . $items['rowid']) ?>"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4" align="center">
                                <p class="cart_total_price">Tổng tiền: <?php echo number_format($total, 0, ',', '.') ?>VNĐ</p>
                            <td><a href="<?php echo base_url("delete-all-cart") ?>" class="btn btn-danger">Xóa tất cả</a></td>
                            <td><a href="<?php echo base_url("checkout") ?>" class="btn btn-success">Đặt hàng</a></td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php
            } else {
                echo '<span class ="text text-danger">Chưa thêm sản phẩm vào giỏ!</span>';
            }
            ?>
        </div>
    </div>
</section> <!--/#cart_items-->