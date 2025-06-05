<?php



$database = connectToDB();
$user_id = $_SESSION['user']['id'];

$cart_id = $_GET['cart_id'];


// Get cart items with product info
$sql = "SELECT ci.quantity, p.* FROM cart_items ci 
        JOIN foods p ON ci.food_id = p.id
        WHERE ci.cart_id = :cart_id";
$query = $database->prepare($sql);
$query->execute(['cart_id' => $cart_id]);
$items = $query->fetchAll();

?>
<?php require "parts/header.php"; ?>

<div class="container mx-auto my-5" style="max-width: 1050px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Orders</h1>
      </div>
      <div class="card mb-2 p-4">
        <?php require "parts/message_success.php"; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Food Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total Price (item X quantity)</th>
            </tr>
          </thead>
          <tbody>
            <!-- TODO: 3. use foreach to display all the users  -->
            <?php foreach ($items as $index => $item) : ?>
            <tr>
              <th scope="row"><?php echo $item['id']; ?></th>
              <td><?php echo $item['name']; ?></td>
              <td><?php echo $item['quantity']; ?></td>
              <td><?php echo 'RM ' . number_format($item['quantity'] * $item['price'], 2); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="text-center">
        <a href="/admin/orders" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Order Management</a
        >
      </div>
    </div>

<?php require "parts/footer.php"; ?>