<?php require "parts/header.php"; 
  if ( !isUserLoggedIn() ) {
    header("Location: /dashboard");
    exit;
  }
?>
    <!-- order navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid ">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="/orders/western">Western</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/orders/drinks">Drinks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/orders/noodles">Noodles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/orders/beef">Beef</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/orders/chicken">Chicken</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/orders/sides">Sides</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/orders/rice">Rice</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <hr class="p-0 m-0">