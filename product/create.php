<?php
include_once 'config/database.php';
include_once 'objects/product.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);

if(isset($_POST['toevoegen'])){

$naam = $_POST['naam'];
$beschrijving = $_POST['beschrijving'];
$prijs = $_POST['prijs'];
$categorie_id = $_POST['categorie_id'];

// echo $product_id;
$result2 = $product->create($naam, $beschrijving, $prijs, $categorie_id, 'NOW()', 'NOW()');

echo $result2;
}
?>
