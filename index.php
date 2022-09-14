<?php
require_once 'db/conn.php';

// Get all products
$results = $crud->getProducts();
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />	
	<link rel="icon" type="image/jpg" href="assets/img/logo.png"/>
  <title>Product Page</title>
  <link rel="stylesheet" href="./assets/style.css" />

</head>

<body>
  <form action="delete.php" method="post">
    <div class="header">
      <a href="#" class="logo">Product List</a>
      <div class="header-right">
        <button type="btn" class="button button1"><a href="add-product.php">ADD</a></button>
        <button type="btn" id="delete-product-btn" name="mass-delete" class="button button2">MASS DELETE</button>
      </div>
    </div>

    <hr size="6" />
    <br /><br />

    <div class="product-row">
      <?php
      while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <div class="product-column">
          <div class="product-card">
            <input type="checkbox" name="check[]" style="float: left;" class="delete-checkbox" value="<?php echo $r['product_id'] ?>">
            <p>
              <?php echo $r['sku']  ?><br>

              <?php echo $r['name']  ?><br>

              <?php echo $r['price']  ?>.00$ <br>

              <?php
              if ($r["size"] != NULL) {
                echo "Size: " . $r["size"] . " MB" . "<br>";
              } else if ($r["weight"] != NULL) {
                echo "Weight: " . $r["weight"] . " KG" . "<br>";
              } else if ($r["dimensions"] != NULL) {
                echo "Dimensions: " . $r["dimensions"] . " CM" . "<br>";
              }
              ?>
            </p>
          </div>
        </div>
      <?php } ?>
    </div>
  </form>

  <?php require_once 'includes/footer.php'; ?>