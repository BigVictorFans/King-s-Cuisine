<?php
    $database = connectToDB();
    $sql = "SELECT * FROM foods ORDER BY id DESC";
    $query = $database->prepare($sql);
    $query->execute();
    $foods = $query->fetchAll();
?>

<?php require "parts/orderheader.php"; ?>
    <h1 class="text-center"><u>Western</u></h1>
    <div class="row text-start mx-4">
      <?php FoodBox("western") ?>
<?php require "parts/orderfooter.php"; ?>