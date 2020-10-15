<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>

<body>

    <H2>Read all</H2>
    <hr>
    <?php
    include("product/read_all.php");
    ?>
    <hr>


    <H2>Read one</H2>
    <hr>
    <form action="" method="post">
        <input type="number" name="product_id" id="product_id" placeholder="product id" required>
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
    include("product/read_one.php");
    ?>
    <hr>

    <h2>Create one</h2>
    <hr>
    <form action="" method="POST">
        <table border="1">
            <tr>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Prijs</th>
                <th>Categorie Id</th>
                <th>Toevoegen</th>
            </tr>
            <tr>
                <td><input type="text" placeholder="Naam" name="naam" required></td>
                <td><input type="text" placeholder="Beschrijving" name="beschrijving" required></td>
                <td><input type="number" placeholder="Prijs" name="prijs" required></td>
                <td><input type="number" placeholder="Categorie Id" name="categorie_id" required></td>
                <td><input type="submit" value="Toevoegen" name="toevoegen"></td>
            </tr>
        </table>
    </form>
    <?php
    include("product/create.php");
    ?>
    <hr>

    <h2>Update</h2>
    <hr>
    <?php
    include("product/update.php");
    ?>
    <hr>


</body>
</html?