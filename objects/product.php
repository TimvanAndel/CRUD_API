<?php
class Product
{
   // database connectie en tabel-naam
   private $conn;
   private $table_name = "product";
   // object properties
   public $id;
   // constructor with $db as database connection
   public function __construct($db)
   {
       $this->conn = $db;
   }
   // read products
   function read()
   {
       // select all query
       $query = "SELECT * FROM " . $this->table_name;
       $result = $this->conn->query($query);
       return $result;
   }
   function read_one($id){
        $query = "SELECT id, naam, beschrijving, prijs, categorie_id, toegevoegd_op, gewijzigd_op FROM `product` WHERE `id` = $id";
        $result = $this->conn->query($query);
        return $result;
   }
   function create($naam, $beschrijving, $prijs, $categorie_id, $toegevoegd_op, $gewijzigd_op){
        $query = "INSERT INTO `product` (naam, beschrijving, prijs, categorie_id, toegevoegd_op, gewijzigd_op) VALUES ('$naam', '$beschrijving', $prijs, $categorie_id, $toegevoegd_op, $gewijzigd_op)";
        $result2 = mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        header("Refresh:0; url=index.php");
        return "Product toegevoegd!" . $result2;
        // INSERT INTO `product` (naam, beschrijving, prijs, categorie_id, toegevoegd_op, gewijzigd_op) VALUES ('a', 'v', 500, 1, now(), now())
   }
   function update($id, $naam, $beschrijving, $prijs, $categorie_id, $gewijzigd_op, $search_id){
    //    echo "hi";
        $query = "UPDATE `product` SET id = $id, naam = '$naam', beschrijving = '$beschrijving', prijs = $prijs, categorie_id = $categorie_id, gewijzigd_op = $gewijzigd_op WHERE id = $search_id";
        $result3 = mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        header("Refresh:0; url=index.php");
        return "Product gewijzigd!" . $result3;
        // echo "hi";
   }
   function delete($id){
        $query = "DELETE FROM `product` WHERE id = $id";
        $result4 = mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        header("Refresh:0; url=index.php");
   }
}
