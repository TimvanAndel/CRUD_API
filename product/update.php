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
   echo "<form action='' method='post'>";
    echo "<th>Id</th>";
    echo "<th>Naam</th>";
    echo "<th>Beschrijving</th>";
    echo "<th>Prijs</th>";
    echo "<th>Categorie id</th>";
    echo "<th>Wijzigen</th>";
    echo "<th></th>";
    echo "</tr>";


   while ($row = $result->fetch_assoc()){
   
   // set response code - 200 OK
   http_response_code(200);
//    var_dump($products_arr);

echo "<tr>";
    echo "<th><input type='number' name='update_id' placeholder='id' value='".$row['id']."'</th>";
    echo "<th><input type='text' name='update_name' placeholder='Name' value='".$row['naam']."'</th>";
    echo "<th><input type='text' name='update_beschrijving' placeholder='Beschrijving' value='".$row['beschrijving']."'</th>";
    echo "<th><input type='number' name='update_prijs' placeholder='Prijs' value='".$row['prijs']."'</th>";
    echo "<th><input type='number' name='update_categorie_id' placeholder='Categorie_id' value='".$row['categorie_id']."'</th>";
    echo "<th><input type='submit' name='wijzigen' Value='Wijzigen'</th>";
    echo "<th><input type='hidden' name='search_id' value='".$row['id']."'</th>";
    echo "</form>";


    if(isset($_POST['wijzigen'])){
        // echo "hi";
        $id = $_POST['update_id'];
        $name = $_POST['update_name'];
        $beschrijving = $_POST['update_beschrijving'];
        $prijs = $_POST['update_prijs'];
        $categorie_id = $_POST['update_categorie_id'];
        $search_id = $_POST['search_id'];
    
        $update = $product->update($id, $name, $beschrijving, $prijs, $categorie_id, 'NOW()', $search_id);
        echo $update;
     }
echo "</tr>";

}
} else{
   echo "Geen Producten gevonden.";
}
echo"<table>";

