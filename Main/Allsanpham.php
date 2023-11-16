<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php
    include('header.php');
?>
<?php
require_once './connect/connect.php';
require_once './connect/funcion.php';

$stringSQL = "SELECT * FROM `sanpham` WHERE `ten_sanpham` LIKE '%$search%' ORDER BY `ngaytao` DESC";

$result = mysqli_query($connect, $stringSQL);
?>

<style>
    <?php
            include 'CSS/body.css';
           include 'CSS/Allsp.css';
       ?>
</style>
<div style="background-color: #F7F7F7;">
<div class="container-allsp">
<div class="_home-outline3">
    <div class="_dm-head">
        <div class="_sanpham_text" style=" width: 100%;align-items: center;justify-content: center;">
            SẢN PHẨM
        </div>
    </div>
    <div style="display: flex">
        <div class="boloc-sanpham">
            <div style="padding-top: 5px; padding-bottom: 15px">
                <i class="fa-solid fa-filter"></i>
                BỘ LỌC TÌM KIẾM
            </div>
            <div style="padding-bottom: 15px">
                Theo danh mục
            </div>
            <div>
                <div>
                    <div class="in-label me-3 pd">
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                        Giấy các loại
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                        Bút các loại
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                       Ghế
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                        Mực
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                       Sổ tay
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                        Bìa đựng hồ sơ
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                       Dao dọc giấy
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                        Kéo
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                        Giỏ đựng đồ
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                        Máy tính
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                        Balo, cặp
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                        Giỏ đựng đồ
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                        Các loại kệ
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                      Bàn ghế
                    </div>
                    <div class="in-label me-3 pd" >
                        <input  type="checkbox" class="product-checkbox2" style="cursor: pointer">
                       Sofa
                    </div>

                    <hr/>

                    <div style="padding-bottom: 15px">
                        Khoảng Giá
                    </div>
                    <div>
                        <input class="input1" placeholder="Từ "/>
                        <span class="the-span">-</span>
                        <input  class="input2" placeholder="Đến"/>
                    </div>
                    <div style="padding-top: 15px">
                        <button class="btn-apdung">
                            Áp dùng
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="grid-itemss">
            <?php if (mysqli_num_rows($result) > 0) { foreach ($result as $index => $each) { ?>
                <a href="product.php?id=<?php echo $each['ma_sanpham'];?>" class="_IT1">
                    <div class="_btn_product">
                        <div class="width_pic">
                            <img class="picture_items" alt="..." src="
                    <?php
                            if (str_contains($each['anh_sanpham'], 'https')){
                                echo $each['anh_sanpham'];
                            }
                            else {
                                echo "../Admin/" . $each['anh_sanpham'];

                            }
                            ?>
                    ">
                        </div>
                        <div class="center-text">
                            <div class="_text-items2 max-line">
                                <?php echo $each['ten_sanpham'];?>
                            </div>
                        </div>
                        <div class="center-text">
                            <div class="_text-items3 max-line">
                                <?php echo product_price($each['gia_sanpham']);?>
                            </div>
                        </div>
                    </div>
                </a>
            <?php }} else {?>
                <div class="text-center" style="grid-column-start: 3; grid-column-end: 5;">
                    <h3>Không tìm thấy sản phẩm nào</h3>
                </div>
            <?php }?>
        </div>
    </div>

</div>
</div>
</div>
<?php
    include('Footer.php');
?>


