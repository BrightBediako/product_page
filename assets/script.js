

// function to cancel the form andd return to the product list
function cancelBtn() {
    window.location.href = "http://localhost/product_page/index.php";
}


// type switcher
if (document.getElementById("productType") != null) {
    var typeSwitcher = document.getElementById("productType");
    var dvdField = document.getElementById("dvdField");
    var furnitureField = document.getElementById("furnitureField");
    var bookField = document.getElementById("bookField");
    var productType = "";
    typeSwitcher.addEventListener("change",
        function () {
            if (typeSwitcher.value == "DVD") {
                dvdField.style.display = "block";
                furnitureField.style.display = "none";
                bookField.style.display = "none";
            }

            else if (typeSwitcher.value == "Furniture") {
                dvdField.style.display = "none";
                furnitureField.style.display = "block";
                bookField.style.display = "none";
            }

            else if (typeSwitcher.value == "Book") {
                dvdField.style.display = "none";
                furnitureField.style.display = "none";
                bookField.style.display = "block";
            }

            else {
                dvdField.style.display = "none";
                furnitureField.style.display = "none";
                bookField.style.display = "none";
            }
        });
}


// Form validation
function validate() {
    preventDefault();
    if (document.productForm.sku.value == "") {
        alert("Please add SKU!");
        document.productForm.sku.focus();
        return false;
    }
    if (document.productForm.name.value == "") {
        alert("Please add a Name!");
        document.productForm.name.focus();
        return false;
    }
    if (document.productForm.price.value == "") {
        alert("Please add Price!");
        document.productForm.price.focus();
        return false;
    }
    return (true);
}

