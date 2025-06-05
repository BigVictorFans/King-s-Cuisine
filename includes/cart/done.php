<?php

  if ( !isAdmin() ) {
    header("Location: /admin");
    exit;
  }

$database = connectToDB();

$cart_id = $_GET["cart_id"];

// Update cart status
$update = $database->prepare("UPDATE cart SET status = 'done' WHERE id = :cart_id");
$update->execute(['cart_id' => $cart_id]);

?>
// Output alert and redirect using JavaScript
<!DOCTYPE html>
<html>
<head>
    <title>Checkout Successful</title>
    <script>
        alert("Your customer's order is done!");
        window.location.href = "/admin/orders"; // redirect to homepage
    </script>
</head>
<body>
</body>
</html>