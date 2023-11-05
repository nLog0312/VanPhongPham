
    function chuyenHuong2() {
    window.location.href = 'Login.php';
}
    function chuyenHuong() {
    window.location.href = 'Register.php';
}
    function chuyenHuong3() {
    window.location.href = 'Hotro.php';
}


    function decreaseQuantity(productId) {
        var quantityInput = document.getElementById("quantityInput_" + productId);
        var currentValue = parseInt(quantityInput.value);

        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
            // Thực hiện các hành động cần thiết khi giảm số lượng
        }
    }

    function increaseQuantity(productId) {
        var quantityInput = document.getElementById("quantityInput_" + productId);
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
        // Thực hiện các hành động cần thiết khi tăng số lượng
    }






    //-----------check all
    var productCheckboxes = document.querySelectorAll('.product-checkbox');
    var selectAllCheckbox = document.getElementById('myCheckbox_final');

    productCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var allProductsSelected = Array.from(productCheckboxes).every(function(checkbox) {
                return checkbox.checked;
            });

            if (allProductsSelected) {
                selectAllCheckbox.style.display = 'inline-block';
            } else {
                selectAllCheckbox.style.display = 'none';
            }
        });
    });

    selectAllCheckbox.addEventListener('change', function() {
        productCheckboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });


    function applyAttributes() {
        // Lấy giá trị các thuộc tính phân loại hàng (kích cỡ, màu sắc)
        var size = document.getElementById('size').value;
        var color = document.getElementById('color').value;

        // Thực hiện xử lý với các giá trị thuộc tính đã chọn (ví dụ: gửi yêu cầu đến server)
        // ...

        // Sau khi xử lý xong, ẩn cửa sổ phân loại hàng
        var phanLoaiOptions = document.querySelector('.phanloai-options');
        phanLoaiOptions.style.display = 'none';
    }






