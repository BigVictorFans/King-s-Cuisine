<?php
  if ( !isEditor() ) {
    header("Location: /");
    exit;
  }
?>

<?php require "parts/header.php"; ?>

<div class="container mx-auto my-5" style="max-width: 800px;">
      <h1 class="h1 mb-4 text-center">Admin Dashboard</h1>
      <?php require "parts/message_success.php"; ?>
      <div class="row">
        <div class="col">
          <div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title text-center">
                <div class="mb-1">
                  <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                </div>
                Manage Foods
              </h5>
              <div class="text-center mt-3">
                <a href="/admin/manage_foods" class="btn btn-primary btn-sm"
                  >Access</a
                >
              </div>
            </div>
          </div>
        </div>
        <?php if ( isAdmin() ): ?>
        <div class="col">
          <div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title text-center">
                <div class="mb-1">
                  <i class="bi bi-list" style="font-size: 3rem;"></i>
                </div>
                Manage Orders
              </h5>
              <div class="text-center mt-3">
                <a href="/admin/orders" class="btn btn-primary btn-sm"
                  >Access</a
                >
              </div>
            </div>
          </div>
        </div>
        <?php endif?>
      </div>
      <div class="mt-4 text-center">
        <a href="/" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back</a
        >
      </div>
    </div>

    <?php require "parts/footer.php"; ?>