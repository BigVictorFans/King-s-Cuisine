<!DOCTYPE html>
<html>
  <head>
    <title>King's Cuisine</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <link href="pages/home.css" rel="stylesheet">
    </style>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand fs-3 ms-5" href="/">King's Cuisine</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end px-2" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <?php if ( isUserLoggedIn() ) : ?>
              <?php if(isAdmin()) : ?>
              <li class="nav-item mx-4 fs-3">
                <a class="nav-link active" aria-current="page" href="/admin">Admin Dashboard</a>
              </li>
              <?php endif?>
              <li class="nav-item mx-4 fs-3">
                <a class="nav-link active" aria-current="page" href="/orders/drinks">Order</a>
              </li>
              <li class="nav-item mx-4 fs-3">
                <a class="nav-link" href="#"><i class="bi bi-cart4"></i></a>
              </li>
              <li class="nav-item mx-4">
                <a class="nav-link" href="/profile"><i class="bi bi-person-circle fs-3"></i></a>
              </li>
            <?php else : ?>
              <li class="nav-item mx-4 fs-3">
                <a class="nav-link active" aria-current="page" href="/signup">Sign Up</a>
              </li>
              <li class="nav-item mx-4 fs-3">
                <a class="nav-link active" aria-current="page" href="/login">Login</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>