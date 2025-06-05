<?php require "parts/header.php"; 
  if ( !isUserLoggedIn() ) {
    header("Location: /dashboard");
    exit;
  }
?>
  <h1>Profile</h1>
  <a href="/logout" class="btn btn-danger">Logout</a>
<?php require "parts/footer.php"; ?>
