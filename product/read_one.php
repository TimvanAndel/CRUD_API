<?php
// required headers
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// database connection will be here
// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);

if(isset($_POST['submit'])){
    $product_id = $_POST['product_id'];

// echo $product_id;
$result = $product->read_one($product_id);

// var_dump($result);
// echo $result["naam"];
$num = $result->num_rows;
// check if more than 0 record found
if($num>0){
   // products array
   $products_arr=array();
   // product data ophalen

   echo "<table border = '1'>";
   echo "<tr>";
    echo "<th>id</th>";
    echo "<th>Naam</th>";
    echo "<th>Beschrijving</th>";
    echo "<th>Prijs</th>";
    echo "<th>Categorie id</th>";
    echo "<th>Toegevoegd op</th>";
    echo "<th>Gewijzigd op</th>";
    echo "</tr>";

   while ($row = $result->fetch_assoc()){
      
   
   // set response code - 200 OK
   http_response_code(200);
 
    echo "<tr>";
    echo("<td>".$row['id']."</td>");
    echo("<td>".$row['naam']."</td>");
    echo("<td>".$row['beschrijving']."</td>");
    echo("<td>".$row['prijs']."</td>");
    echo("<td>".$row['categorie_id']."</td>");
    echo("<td>".$row['toegevoegd_op']."</td>");
    echo("<td>".$row['gewijzigd_op']."</td>");
    echo "</tr>";
    
    echo"<table>";
}
}
else{
   // set response code - 404 Not found
   http_response_code(404);
   // tell the user no products found
       echo("Geen producten gevonden");
}
}
?>
