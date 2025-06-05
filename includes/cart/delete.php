<?php

  if ( !isUserLoggedIn() ) {
    header("Location: /dashboard");
    exit;
  }

if (!isset($_GET['food_id'])) {
    header("Location: /cart");
    exit;
}

$food_id = $_GET['food_id'];
$user_id = $_SESSION['user']['id'];

$database = connectToDB();

// Get the user's cart
$query = $database->prepare("SELECT id FROM cart WHERE user_id = :user_id");
$query->execute(['user_id' => $user_id]);
$cart = $query->fetch();

if ($cart) {
    $cart_id = $cart['id'];

    // Delete the item from the cart
    $deleteStmt = $database->prepare("
        DELETE FROM cart_items 
        WHERE cart_id = :cart_id 
        AND food_id = :food_id
    ");
    $deleteStmt->execute([
        'cart_id' => $cart_id,
        'food_id' => $food_id
    ]);
}

header("Location: /cart");
exit;