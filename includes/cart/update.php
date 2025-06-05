<?php

  if ( !isUserLoggedIn() ) {
    header("Location: /dashboard");
    exit;
  }

$database = connectToDB();
$user_id = $_SESSION['user']['id'];

// ✅ Fix: correct table and column name
$query = $database->prepare("SELECT id FROM cart WHERE user_id = :user_id");
$query->execute(['user_id' => $user_id]);
$cart = $query->fetch();

if (!$cart) {
    header("Location: /cart");
    exit;
}

$cart_id = $cart['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantities'])) {
    foreach ($_POST['quantities'] as $food_id => $quantity) {
        $quantity = max(1, (int)$quantity);

        $updateStmt = $database->prepare("
            UPDATE cart_items 
            SET quantity = :quantity 
            WHERE cart_id = :cart_id AND food_id = :food_id
        ");
        $updateStmt->execute([
            'quantity' => $quantity,
            'cart_id' => $cart_id,
            'food_id' => $food_id
        ]);
    }
}

header("Location: /cart");
exit;