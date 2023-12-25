<footer id="footer"><!--Footer-->
    <style>
        hr {
            border: 0;
            clear: both;
            display: block;
            width: 96%;
            background-color: #000000;
            height: 1px;

        }

        .mycontent-left {
            border-right: 1px solid #333;
            min-height: 200px;
        }
    </style>
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mycontent-left">
                        <h4>HÃY LIÊN HỆ VỚI CHÚNG TÔI:<br></h4>
                        <ul style="display: flex; justify-content: center; margin-bottom: 0;">
                            <li style="list-style: none; margin: 0;">
                                <a href="https://facebook.com"><img src="uploads\facebookicon.png" alt="Facebook của truyenhay247" style="width:50px; height:50px;"></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mycontent-right" style=" align-items: center;  display: flex; justify-content: center; margin-top:20px">
                        <ul>
                            <li>
                                <h5 style="text-align:center;">Địa chỉ: 235 Hoàng Quốc Việt, Cổ Nhuế, Bắc Từ Liêm, Hà Nội</h5>
                            </li>
                            <hr />
                            <li>
                                <h5 style="text-align:center;">Số điện thoại: 0847883030</h5>
                            </li>
                            <hr />
                            <li>
                                <h5 style="text-align:center;">Email: ducanh.181002@gmail.com</h5>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="single-widget">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>

</footer><!--/Footer-->



<script src="<?php echo base_url("frontend/js/jquery.js") ?>"></script>
<script src="<?php echo base_url("frontend/js/bootstrap.min.js") ?>"></script>
<script src="<?php echo base_url("frontend/js/jquery.scrollUp.min.js") ?>"></script>
<script src="<?php echo base_url("frontend/js/price-range.js") ?>"></script>
<script src="<?php echo base_url("frontend/js/jquery.prettyPhoto.js") ?>"></script>
<script src="<?php echo base_url("frontend/js/main.js") ?>"></script>
<script>
    // $(document).ready(function() {
    //     var active = location.search;
    //     $('#select-filter option[value="' + active + '"]').attr('selected', 'selected');
    // })

    $('.select-filter').change(function() {
        var value = $(this).find(':selected').val();

        // alert(value);
        if (value != 0) {
            var url = value;
            window.location.replace(url);
        } else {
            alert('Chưa lọc sản phẩm!');
        }
    })
</script>
</body>

</html>