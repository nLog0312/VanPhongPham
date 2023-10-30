<style>
    <?php include 'CSS/body.css' ?>
</style>
<?php
    require_once './connect/connect.php';
    require_once './connect/funcion.php';
    $search = "";
    $stringSQL = "SELECT * FROM `sanpham` WHERE `ten_sanpham` LIKE '%$search%' ORDER BY `ngaytao` DESC";
    $result = mysqli_query($connect, $stringSQL);
?>
<div class="_home-outline2">
    <div class="_dm-head">
        <div class="_sanpham_text">SẢN PHẨM</div>
    </div>
    <div class="grid-items">
    <?php  foreach ($result as $index => $each) { ?>
        <a href="product.php?id=<?php echo $each['ma_sanpham'];?>" class="_IT1">
            <div class="_btn_product">
                <div class="width_pic">
                    <img class="picture_items" src="
                    <?php
                        if (str_contains($each['anh_sanpham'], 'https')){
                            echo $each['anh_sanpham'];
                        }
                        else {
                            echo "../Admin/" . $each['anh_sanpham'];
                        }
                    ?>
                    "
                         >
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
    <?php }?>
    </div>
    <div>
        <div class="nut-xemthem">
            <a >
                <button class="btn-xemthem">
                    Xem thêm
                </button>
            </a>
        </div>

    </div>
</div>