<?php
require_once 'db/conn.php';

if (isset($_POST['Save'])) {
    //extract values from the $_POST array
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $product_type = $_POST['product_type'];
    $size = $_POST['size'];
    $weight = $_POST['weight'];
    $dimensions = $_POST["height"] . "x" . $_POST["width"] . "x" . $_POST["length"];


    // check if any field is empty before submitting form
    if (empty($sku) || empty($name) || empty($price)) {
        echo "Please, submit required data...";
    } else {
        // check if sku already exist in database
        $result = $crud->getProductBySku($sku);
        if ($result['sku'] == $sku) {
            echo "Product with same SKU already exist...";
        } else {
            //insert values into the database
            $isSuccess = $crud->insertProducts($sku, $name, $price, $product_type, $size, $weight, $dimensions);
            if ($isSuccess) {
                echo "New product added successfully...";

                // echo "<script>window.location='https://product-pg.000webhostapp.com/'</script>";
                header("Location: index.php");
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" type="image/jpg" href="assets/img/logo.png"/>
    <title>Product Add</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css" />
</head>

<body class="p-3 m-0 border-0 bd-example">

    <!-- add product form -->
    <form id="product_form" method="POST" name="productForm">
        <div class="header">
            <a href="#default" class="logo">Product Add</a>
            <div class="header-right">
                <button type="submit" name="Save" class="button button3" onclick="validate();">SAVE</button>
                <button type="button" onclick="cancelBtn();" class="button button4">CANCEL</button>
            </div>
        </div>
        <hr size="6" />

        <br />
        <div class="row mb-3">
            <label for="sku" class="col-sm-1 col-form-label">SKU</label>
            <div class="col-sm-4">
                <input type="text" id="sku" name="sku" class="form-control" placeholder="sku">
            </div>
        </div>

        <div class="row mb-3">
            <label for="name" class="col-sm-1 col-form-label">Name</label>
            <div class="col-sm-4">
                <input type="text" id="name" name="name" class="form-control" placeholder="name">
            </div>
        </div>

        <div class="row mb-3">
            <label for="price" class="col-sm-1 col-form-label">Price ($)</label>
            <div class="col-sm-4">
                <input type="number" id="price" name="price" class="form-control" placeholder="price">
            </div>
        </div>

        <div class="row mb-3">
            <label for="productType" class="col-sm-1 col-form-label">Type switcher</label>
            <div class="col-sm-4">
                <select id="productType" name="product_type" class="form-select">
                    <option>Choose...</option>
                    <option id="dvd" value="DVD">DVD-disc</option>
                    <option id="book" value="Book">Book</option>
                    <option id="furniture" value="Furniture">Furniture</option>
                </select>
            </div>
        </div>

        <!-- dvd form field -->
        <div id="dvdField" class="row mb-3" style="display: none;">
            <label for="size" class="col-sm-1 col-form-label"> Size (MB)</label>
            <div class="col-sm-4">
                <input type="number" id="size" name="size" class="form-control" placeholder="0 MB">
            </div>
            <br>
            <p>
                <strong>Please, provide the size for the selected type.</strong>
            </p>
        </div>
        <!-- dvd form end -->

        <!-- book form -->
        <div id="bookField" class="row mb-3" style="display: none;">
            <label for="weight" class="col-sm-1 col-form-label">Weight (KG)</label>
            <div class="col-sm-4">
                <input type="number" id="weight" name="weight" class="form-control" placeholder="0 KG">
            </div>
            <br>
            <p>
                <strong>Please, provide the wieght for the selected type.</strong>
            </p>
        </div>
        <!-- book form end -->

        <!-- furniture form -->
        <div id="furnitureField" class="row mb-3" style="display: none;">
            <label for="height" class="col-sm-1 col-form-label">Height (CM)</label>
            <div class="col-sm-4">
                <input type="number" id="height" name="height" class="form-control" placeholder="0 CM">
            </div>

            <label for="width" class="col-sm-1 col-form-label">Width (CM)</label>
            <div class="col-sm-4">
                <input type="number" id="width" name="width" class="form-control" placeholder="0 CM">
            </div>

            <label for="length" class="col-sm-1 col-form-label">Lenght (CM)</label>
            <div class="col-sm-4">
                <input type="number" id="length" name="length" class="form-control" placeholder="0 CM">
            </div>
            <br>
            <p>
                <strong>Please, provide the Heigth, Width and Lenght for the selected type in
                    this format HxWxL.
                </strong>
            </p>
        </div>
        <!-- furniture form -->
    </form>
    <!-- add product form end -->




    <?php require_once 'includes/footer.php'; ?>