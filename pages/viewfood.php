<?php

  if ( !isUserLoggedIn() ) {
    header("Location: /dashboard");
    exit;
  }
$database = connectToDB();

$user_id = $_SESSION['user']['id'];
$user_name = $_SESSION['user']['name'];

// product info
$food_id = $_GET['id'] ?? 0;
$query = $database->prepare("SELECT * FROM foods WHERE id = :id");
$query->execute(['id' => $food_id]);
$food = $query->fetch();

if (!$food) {
    echo "<p>Product not found.</p>";
    exit;
}
?>

<?php require "parts/header.php"; ?>
<!-- content -->
<div class="container d-flex justify-content-center mt-5">
    <div class="w-50 bg-white p-4 rounded shadow text-center">
      <img width="100%" src="/<?= $food["image"]; ?>" class="img-fluid rounded mb-4" >

      <h1 class="mb-2"><?= htmlspecialchars($food["name"]) ?></h1>
      <h5 class="text-muted mb-4"><?= htmlspecialchars($food["price"]) ?></h5>

      <p class="mb-4"><?= htmlspecialchars($food["description"]) ?></p>

      <form action="/add-cart" method="POST">
          <h5>quantity</h5>
          <input type="hidden" name="id" value="<?= $food['id'] ?>">
          <input type="number" name="quantity" value="1" min="1" required>
          <br>
          <button class="my-3 btn btn-success" type="submit">Add to Cart</button>
      </form>
      <a href="/orders/drinks" class="text-primary text-decoration-none"><i class="bi bi-arrow-left"></i> Back</a>
    </div>
</div>


<!-- comments -->
<div class="container d-flex justify-content-center mt-5">
    <div class="w-50 bg-white p-4 rounded shadow text-center">
      
    </div>
</div>
<?php require "parts/footer.php"; ?>