const inputAddForm = document.querySelectorAll('#addModal form input[required]');

//#region validate input
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
//#endregion

//#region handle product properties
const chBoxes = document.querySelectorAll('.dropdown-menu input[type="checkbox"]'); 
const dpBtn = document.getElementById('multiSelectDropdown'); 
let mySelectedListItems = []; 

function handleCB() { 
    mySelectedListItems = []; 
    let mySelectedListItemsText = ''; 

    chBoxes.forEach((checkbox) => { 
        if (checkbox.checked) { 
            mySelectedListItems.push(checkbox.parentElement.querySelector('span').innerText); 
            mySelectedListItemsText += checkbox.parentElement.querySelector('span').innerText + ', '; 
        } 
    });

    dpBtn.innerText = mySelectedListItems.length > 0 && mySelectedListItems.length <= 3 ? mySelectedListItemsText.slice(0, -2) : 'Lựa chọn';
    if (mySelectedListItems.length > 3) 
        dpBtn.innerText = mySelectedListItems.length.toString() + ' thuộc tính';
}

chBoxes.forEach((checkbox) => { 
    checkbox.addEventListener('change', handleCB); 
});
//#endregion

//#region onchange input image
const inputImage = document.getElementById('imgProduct');
const imgPreview = document.querySelector('.image-product .row');

inputImage?.addEventListener('input', function() {
    let imgInput = this.value.replace(' ', '');
    imgPreview.innerHTML = '';
    if (imgInput.includes(',')){
        const lstImg = imgInput.split(',');
        lstImg.forEach(img => {
            if (img != '')
                imgPreview.innerHTML += `<div class="col"><img style="max-width: 8rem;" src="${img}" alt="image" class="img-thumbnail"></div>`;
        })
    } else {
        imgPreview.innerHTML = `<div class="col"><img style="max-width: 8rem;" src="${imgInput}" alt="image" class="img-thumbnail"></div>`;
    }
})
//#endregion
