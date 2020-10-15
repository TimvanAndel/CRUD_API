<?php
// required headers
// database connection will be here
// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
// initialize object
$product = new Product($db);
// read products will be here
// query products
$result = $product->read();
$num = $result->num_rows;
// check if more than 0 record found
if($num>0){
   // products array
  
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
    echo "<th>Verwijderen</th>";
    echo "</tr>";


   while ($row = $result->fetch_assoc()){
   
   // set response code - 200 OK
   http_response_code(200);
//    var_dump($products_arr);

echo "<tr>";
echo("<td>".$row['id']."</td>");
echo("<td>".$row['naam']."</td>");
echo("<td>".$row['beschrijving']."</td>");
echo("<td>".$row['prijs']."</td>");
echo("<td>".$row['categorie_id']."</td>");
echo("<td>".$row['toegevoegd_op']."</td>");
echo("<td>".$row['gewijzigd_op']."</td>");
echo("<td><a href='index.php?del=".$row['id']."'>Verwijderen</a></td>");
echo "</tr>";

}
} else{
   echo "Geen Producten gevonden.";
}
echo"<table>";


if(isset($_GET['del'])){
   $delete = $product->delete($_GET['del']);
}