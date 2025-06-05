<?php

  if ( !isUserLoggedIn() ) {
    header("Location: /dashboard");
    exit;
  }

$user_id = $_SESSION['user']['id'];
$database = connectToDB();

$cart_id = $_GET["cart_id"];

// Update cart status
$update = $database->prepare("UPDATE cart SET status = 'processing' WHERE id = :cart_id");
$update->execute(['cart_id' => $cart_id]);

?>
// Output alert and redirect using JavaScript
<!DOCTYPE html>
<html>
<head>
    <title>Checkout Successful</title>
    <script>
        alert("Your order has been submitted successfully!");
        window.location.href = "/"; // redirect to homepage
    </script>
</head>
<body>
</body>
</html>