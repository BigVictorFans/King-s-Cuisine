<?php require "parts/header.php";
  if ( !isEditor() ) {
    header("Location: /admin");
    exit;
  }

?>



<div class="container mx-auto my-5" style="max-width: 1050px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Add New Food/Drink</h1>
      </div>
      <div class="card mb-2 p-4">
        <?php require "parts/message_error.php"; ?>
        <form 
          method="POST" 
          action="/foods/add" 
          enctype="multipart/form-data">
          <div class="mb-3">
            <label for="food-name" class="form-label">Name</label>
            <input type="text" class="form-control" id="food-name" name="name" />
          </div>
          <div class="mb-3">
            <label for="food-description" class="form-label">Description</label>
            <textarea
              class="form-control"
              id="food-description"
              rows="10"
              name="description"
            ></textarea>
          </div>
          <div class="mb-3">
            <label for="food-price" class="form-label">Price</label>
            <input type="text" class="form-control" id="food-price" name="price" />
          </div>
          <div class="mb-3">
            <label for="food-type" class="form-label">Category</label>
            <select class="form-select" id="food-type" name="type">
                <option selected disabled>Choose The Dish's Type</option>
                <option value="western">western</option>
                <option value="drinks">drinks</option>
                <option value="noodles">noodles</option>
                <option value="beef">beef</option>
                <option value="chicken">chicken</option>
                <option value="sides">sides</option>
                <option value="rice">rice</option>
            </select>
          </div>
          <div class="mb-3">
            <input type="file" name="image" accept="image/*" >
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/admin/manage_foods" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> back to item management</a
        >
      </div>
    </div>

<?php require "parts/footer.php"; ?>