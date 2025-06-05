<?php
$database = connectToDB();

  if ( !isUserLoggedIn() ) {
    header("Location: /dashboard");
    exit;
  }


//lets get the user infow from POST in carrt
$user_id = $_SESSION['user']['id'];
$food_id = $_POST['id'] ?? null;
$quantity = max(1, (int)($_POST['quantity'] ?? 1));


//if no food id just go back
// if (!$food_id) {
//     header("Location: /orders/drinks");
//     exit;
// }

//create a cart for a new user
$query = $database->prepare("SELECT id FROM cart WHERE user_id = :user_id AND status = 'pending' ");
$query->execute(['user_id' => $user_id]);
$cart = $query->fetch();


//check is user has a cart if no cart then just make a new one, if have then use old one
if (!$cart) {
    $insert = $database->prepare("INSERT INTO cart (user_id) VALUES (:user_id)");
    $insert->execute(['user_id' => $user_id]);
    $cart_id = $database->lastInsertId();
} else {
    $cart_id = $cart['id'];
}


//use dis to check if food alr in cart
$query = $database->prepare("SELECT quantity FROM cart_items WHERE cart_id = :cart_id AND food_id = :food_id");
$query->execute(['cart_id' => $cart_id, 'food_id' => $food_id]);
$item = $query->fetch();



//for if the food is already in the cart so we update it
if ($item) {
    $newQuantity = $item['quantity'] + $quantity;
    $update = $database->prepare
    ("  UPDATE cart_items 
        SET quantity = :quantity 
        WHERE cart_id = :cart_id 
        AND food_id = :food_id
    ");
    $update->execute([
        'quantity' => $newQuantity,
        'cart_id' => $cart_id,
        'food_id' => $food_id
    ]);


    
} else {
    //dis for inserting in the tableh as a new row
    $insert = $database->prepare
    ("  INSERT INTO cart_items (cart_id, food_id, quantity) 
        VALUES (:cart_id, :food_id, :quantity)
    ");
    $insert->execute([
        'cart_id' => $cart_id,
        'food_id' => $food_id,
        'quantity' => $quantity
    ]);
}

header("Location: /orders/drinks");
exit;