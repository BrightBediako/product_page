<?php
require_once 'db/conn.php';


if (isset($_POST['mass-delete'])) {
    if (isset($_POST['check'])) {
        $checked = $_POST['check'];
        for ($i = 0; $i < count($checked); $i++) {
            $id = $checked[$i];
            // $sql = "DELETE FROM product WHERE product_id = :id";
            $crud->deleteProduct($id);
        }
        echo "<strong> Product deleted successfully...</strong>";

        echo "<script>window.location='index.php'</script>";
    }else{
        echo "<strong> Please select a product first!!!</strong>";

        echo "<script>window.location='index.php'</script>";
    }
}
