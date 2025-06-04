<?php
    $database = connectToDB();
    $sql = "SELECT * FROM foods ORDER BY id DESC";
    $query = $database->prepare($sql);
    $query->execute();
    $foods = $query->fetchAll();
?>

<?php require "parts/orderheader.php"; ?>
    <h1 class="text-center"><u>Chicken</u></h1>
    <div class="row text-start mx-4">
      <?php FoodBox("chicken") ?>
<?php require "parts/orderfooter.php"; ?>