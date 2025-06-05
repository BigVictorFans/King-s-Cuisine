<?php

  // check if the user is not an admin
  if ( !isAdmin() ) {
    header("Location: /admin");
    exit;
  }
  
  // 1. connect to database
  $database = connectToDB();
  // 2. get all the users
    // 2.1
  $sql = "SELECT ci.*, p.name FROM cart ci  JOIN users p ON ci.user_id = p.id" ;
  // 2.2
  $query = $database->query( $sql );
  // 2.3
  $query->execute();
  // 2.4
  $carts = $query->fetchAll();
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
              <th scope="col">Username</th>
              <th scope="col">Status</th>
              <th scope="col">Configurations</th>
            </tr>
          </thead>
          <tbody>
            <!-- TODO: 3. use foreach to display all the users  -->
            <?php foreach ($carts as $index => $cart) : ?>
            <tr>
              <th scope="row"><?php echo $cart['id']; ?></th>
              <td><?php echo $cart['name']; ?></td>
              <td>
                <?php if ( $cart['status'] === 'pending' ) : ?>
                  <span class="badge bg-warning"><?php echo $cart['status']; ?></span>
                <?php endif; ?> 
                <?php if ( $cart['status'] === 'processing' ) : ?>
                  <span class="badge bg-info"><?php echo $cart['status']; ?></span>
                <?php endif; ?>
                <?php if ( $cart['status'] === 'done' ) : ?>
                  <span class="badge bg-success"><?php echo $cart['status']; ?></span>
                <?php endif; ?>
              </td>
              <!-- buttons -->
              <td class="text-end">
                <div class="buttons">
                  <a
                    href="/admin/items?cart_id=<?= $cart['id'] ?>"
                    target="_blank"
                    class="btn btn-primary btn-sm me-2"
                    ><i class="bi bi-eye"></i
                  ></a>
                  <!-- Button to trigger delete confirmation modal -->
                  <a href="/cart/done?cart_id=<?= $cart['id'] ?>" class="btn btn-sm btn-success">Order Done!</a>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="text-center">
        <a href="/admin" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Dashboard</a
        >
      </div>
    </div>

<?php require "parts/footer.php"; ?>