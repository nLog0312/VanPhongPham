const inputAddForm = document.querySelectorAll('#addModal form input[required]');

inputAddForm.forEach(input => {
    input.addEventListener('blur', function() {
        let value = this.value;
        let name = this.name;
        let label = document.querySelector(`.invalid.${name}`);
        if (value == '') {
            label.innerHTML = 'Vui lòng nhập thông tin';
            this.style.border = '1px solid var(--bs-form-invalid-color)';
        } else {
            label.innerHTML = '';
            this.style.border = '1px solid var(--bs-border-color)';
        }
    })
})