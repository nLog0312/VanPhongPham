<?php
    require_once './ShareAdmin/root/connect.php';

    $stringSQL = "SELECT * FROM `sanpham` WHERE `ten_sanpham` LIKE '%$search%' ORDER BY `ngaytao` DESC";

    $result = mysqli_query($connect, $stringSQL);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $index => $each) {
            $index += 1;
            echo "<tr>";
                echo "<td class='text-center' style='width: 3%;'></td>";
                echo "<td style='width: 5%'>$index</td>";
                echo "<td style='width: 10%'>";
                echo    "<img src='" . $each['anh_sanpham'] . "' class='rounded' alt='...'>";
                echo "</td>";
                echo "<td style='width: 20%'>" . ($each['ma_sanpham']) . "</td>";
                echo "<td>" . ($each['ten_sanpham']) . "</td>";
                echo "<td style='width: 20%'>" . $each['gia_sanpham'] . "</td>";
            //     echo "<td>
            //         <a href='detail_product.php?id=" . $each['id'] . "'>Xem chi tiết</a>
            //     </td>";
            //     echo "<td>
            //             <a href='form_update.php?id=" . $each['id'] . "'>Sửa</a>
            //         </td>";
            //     echo "<td>
            //             <button value=" . $each['id'] . " class='btn-delete'>Xoá</button>
            //         </td>";
            // echo "</tr>";
        }
    }