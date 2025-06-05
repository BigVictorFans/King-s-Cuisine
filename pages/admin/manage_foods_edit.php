<?php

  // connect to database

    if ( !isEditor() ) {
    header("Location: /admin");
    exit;
  }

  $database = connectToDB();

  // get the id from the URL /manage-posts-edit?id=1
  $id = $_GET["id"];

  // load the post data by id
  // SQL
  $sql = "SELECT * FROM foods WHERE id = :id";
  // prepare
  $query = $database->prepare( $sql );
  // execute
  $query->execute([
    "id" => $id
  ]);
  // fetch
  $food = $query->fetch(); // get only the first row of the match data

?>
<?php require "parts/header.php"; ?>

<div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit Food/Drink</h1>
      </div>
      <div class="card mb-2 p-4">
        <?php require "parts/message_error.php"; ?>
        <form 
          method="POST" action="/foods/edit"
          enctype="multipart/form-data">
          <div class="mb-3">
            <label for="food-name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="food-name"
              value="<?= $food["name"]; ?>"
              name="name"
            />
          </div>
          <div class="mb-3">
            <label for="food-description" class="form-label">Descripton</label>
            <textarea class="form-control" id="food-description" rows="10" name="description" ><?= $food["description"]; ?></textarea>
          </div>
          <div class="mb-3">
            <label for="food-type" class="form-label">Status</label>
            <select class="form-control" id="food-type" name="type">
                <option value="western" <?php echo ( $food["type"] === "western" ? "selected" : "" ); ?>>western</option>
                <option value="drinks" <?php echo ( $food["type"] === "drinks" ? "selected" : "" ); ?>>drinks</option>
                <option value="noodles" <?php echo ( $food["type"] === "noodles" ? "selected" : "" ); ?>>noodles</option>
                <option value="beef" <?php echo ( $food["type"] === "beef" ? "selected" : "" ); ?>>beef</option>
                <option value="chicken" <?php echo ( $food["type"] === "chicken" ? "selected" : "" ); ?>>chicken</option>
                <option value="sides" <?php echo ( $food["type"] === "sides" ? "selected" : "" ); ?>>sides</option>
                <option value="rice" <?php echo ( $food["type"] === "rice" ? "selected" : "" ); ?>>rice</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="food-price" class="form-label">Price</label>
            <input
              type="text"
              class="form-control"
              id="food-price"
              value="<?= $food["price"]; ?>"
              name="price"
            />
          </div>
          <div class="mb-3">
            <label class="form-label">Image</label>
            <div>
              <img src="/<?= $food["image"]; ?>" class="img-fluid" />
            </div>
            <input type="file" name="image" accept="image/*" />
          </div>
          <div class="text-end">
            <input type="hidden" name="id" value="<?php echo $food["id"]; ?>" />
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/admin/manage_foods" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to foods</a
        >
      </div>
    </div>

<?php require "parts/footer.php"; ?>