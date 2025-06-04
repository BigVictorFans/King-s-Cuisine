<?php
    // connect to database
    $database = connectToDB();

    // get id from $_GET
    $id = $_GET["id"];
    
    // load the post data by id
    // SQL
    $sql = 
    "SELECT * FROM foods
    WHERE foods.id = :id" ;
    // prepare
    $query = $database->prepare( $sql );
    // execute
    $query->execute([
      "id" => $id
    ]);
    // fetch
    $food = $query->fetch(); // get only the first row of the match data
?>

<?php require "parts/header.php"; ?>
<!-- content -->
<div class="container d-flex justify-content-center mt-5">
    <div class="w-50 bg-white p-4 rounded shadow text-center">
      <img width="100%" src="/<?= $food["image"]; ?>" class="img-fluid rounded mb-4" >

      <h1 class="mb-2"><?= htmlspecialchars($food["name"]) ?></h1>
      <h5 class="text-muted mb-4"><?= htmlspecialchars($food["price"]) ?></h5>

      <p class="mb-4"><?= htmlspecialchars($food["description"]) ?></p>

      <a href="/orders/drinks" class="text-primary text-decoration-none"><i class="bi bi-arrow-left"></i> Back</a>
    </div>
</div>


<!-- comments -->
<div class="container d-flex justify-content-center mt-5">
    <div class="w-50 bg-white p-4 rounded shadow text-center">
      
    </div>
</div>
<?php require "parts/footer.php"; ?>