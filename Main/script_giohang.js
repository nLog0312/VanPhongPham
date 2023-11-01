
    function chuyenHuong2() {
    window.location.href = 'Login.php';
}
    function chuyenHuong() {
    window.location.href = 'Register.php';
}
    function chuyenHuong3() {
    window.location.href = 'Hotro.php';
}
    function decreaseQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var currentValue = parseInt(quantityInput.value);

        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }

    function increaseQuantity() {
        var quantityInput = document.getElementById("quantityInput");
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    }
    // Lấy tất cả các input checkbox trong một mảng
    var checkboxes = document.querySelectorAll('.in-label input[type="checkbox"]');

    // Lấy input checkbox cuối cùng
    var lastCheckbox = checkboxes[checkboxes.length - 1];

    // Hàm xử lý khi click vào input cuối cùng
    lastCheckbox.addEventListener('change', function() {
    // Nếu input cuối cùng được chọn, chọn tất cả các input khác
    if (lastCheckbox.checked) {
    checkboxes.forEach(function(checkbox) {
    checkbox.checked = true;
});
} else {
    // Nếu input cuối cùng không được chọn, bỏ chọn tất cả các input khác
    checkboxes.forEach(function(checkbox) {
    checkbox.checked = false;
});
}
});

    // Xử lý sự kiện khi các input khác được click
    checkboxes.forEach(function(checkbox, index) {
    // Nếu không phải là input cuối cùng
    if (index !== checkboxes.length - 1) {
    checkbox.addEventListener('change', function() {
    // Nếu tất cả các input khác đều được chọn, chọn input cuối cùng
    if ([...checkboxes].slice(0, -1).every(function(checkbox) {
    return checkbox.checked;
})) {
    lastCheckbox.checked = true;
} else {
    // Ngược lại, bỏ chọn input cuối cùng
    lastCheckbox.checked = false;
}
});
}
});




