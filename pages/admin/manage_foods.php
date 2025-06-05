<?php

  // check if the user is not an admin
  if ( !isEditor() ) {
    header("Location: /admin");
    exit;
  }
  
  // 1. connect to database
  $database = connectToDB();
  // 2. get all the users
    // 2.1
  $sql = "SELECT * FROM foods" ;
  // 2.2
  $query = $database->query( $sql );
  // 2.3
  $query->execute();
  // 2.4
  $foods = $query->fetchAll();
?>
<?php require "parts/header.php"; ?>

<div class="container mx-auto my-5" style="max-width: 1050px; max-height: 3000px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Foods and Drinks</h1>
        <div class="text-end">
          <a href="/admin/manage_foods/add" class="btn btn-primary btn-sm"
            >Add More Foods</a
          >
        </div>
      </div>
      <div class="card mb-2 p-4">
        <?php require "parts/message_success.php"; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
              <th scope="col">Type</th>
              <th scope="col" class="text-end">Edit</th>
            </tr>
          </thead>
          <tbody>
            <!-- TODO: 3. use foreach to display all the users  -->
            <?php foreach ($foods as $index => $food) : ?>
            <tr>
              <th scope="row"><?php echo $food['id']; ?></th>
              <td><?php echo $food['name']; ?></td>
              <td style="
                  max-width: 300px; 
                  word-wrap: break-word;
                  white-space: normal;;">
                <?php echo $food['description']; ?>
              </td>
              <td><?php echo 'RM ' . number_format($food['price'], 2); ?></td>
              <td>
                <!-- western role -->
                <?php if ( $food['type'] === 'western' ) : ?>
                  <span class="badge bg-primary"><?php echo $food['type']; ?></span>
                <?php endif; ?> 
                <!-- drinks type -->
                <?php if ( $food['type'] === 'drinks' ) : ?>
                  <span class="badge bg-info"><?php echo $food['type']; ?></span>
                <?php endif; ?>
                <!-- noodles type -->
                <?php if ( $food['type'] === 'noodles' ) : ?>
                  <span class="badge bg-success"><?php echo $food['type']; ?></span>
                <?php endif; ?>
                <!-- beef type -->
                <?php if ( $food['type'] === 'beef' ) : ?>
                  <span class="badge bg-primary"><?php echo $food['type']; ?></span>
                <?php endif; ?> 
                <!-- chicken type -->
                <?php if ( $food['type'] === 'chicken' ) : ?>
                  <span class="badge bg-info"><?php echo $food['type']; ?></span>
                <?php endif; ?>
                <!-- sides type -->
                <?php if ( $food['type'] === 'sides' ) : ?>
                  <span class="badge bg-success"><?php echo $food['type']; ?></span>
                <?php endif; ?>
                <!-- rice type -->
                <?php if ( $food['type'] === 'rice' ) : ?>
                  <span class="badge bg-success"><?php echo $food['type']; ?></span>
                <?php endif; ?>
              </td>
              <!-- buttons -->
              <td class="text-end">
                <div class="buttons">
                  <a
                    href="/post?id=<?= $food["id"]; ?>"
                    target="_blank"
                    class="btn btn-primary btn-sm me-2"
                    ><i class="bi bi-eye"></i
                  ></a>
                  <a
                    href="/admin/manage_foods/edit?id=<?= $food["id"]; ?>"
                    class="btn btn-secondary btn-sm me-2"
                    ><i class="bi bi-pencil"></i
                  ></a>
                  <!-- Button to trigger delete confirmation modal -->
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#postDeleteModal-<?php echo $food['id']; ?>">
                     <i class="bi bi-trash"></i>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="postDeleteModal-<?php echo $food['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete this post?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                          <p>You're currently trying to delete this dish/drink?: <?php echo $food['name']; ?></p>
                          <p>This action cannot be reversed.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form
                            method="POST"
                            action="/post/delete"
                            class="d-inline"
                            >
                            <input type="hidden" 
                                name="post_id"
                                value="<?= $food["id"]; ?>" />
                              <button class="btn btn-danger"><i class="bi bi-trash me-2"></i>DELETE</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end of modal -->
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