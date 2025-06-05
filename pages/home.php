<?php require "parts/header.php";
?>
    <section class="hero">
        <div class="img d-flex ">
          <div class="container text-center mt-auto mb-auto pb-5 bg-light p-5">
            <h1>Welcome To King's Cuisine</h1>
            <p>Established since 2009, King's Cuisine has been here to make everyone's taste buds explode <br> and we always make sure to make all our customers feel like they're eating a king's meal!</p>
            <button type="button" class="btn btn-primary">Order Now!</button>
          </div>
        </div>
    </section>
      <!--Contact-->
    <section id="Contact" style="background-color: grey;">
      <div class="container py-5">
        <h1 class="text-center">Our Contacts And Feedback Form</h1>
        <div class="row container justify-content-center align-items-center">
          <div class="card mb-2 p-4">
        <?php require "parts/message_error.php"; ?>
        <form 
          method="POST" 
          action="/feedback/add" 
          enctype="multipart/form-data">
          <div class="mb-3">
            <label for="feedback-title" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="feedback-title" name="name" />
          </div>
          <div class="mb-3">
            <label for="feedback-title" class="form-label">Title</label>
            <input type="text" class="form-control" id="feedback-title" name="title" />
          </div>
          <div class="mb-3">
            <label for="feedback-content" class="form-label">Content</label>
            <textarea
              class="form-control"
              id="feedback-content"
              rows="10"
              name="content"
            ></textarea>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
          <div class="container col-12 col-lg-6">
            <div class="card mt-4 h-100" style="width: 100%;">
              <div class="card-body">
                <h5 class="card-title">Contact Information</h5>
                <p class="card-text"><strong>Adress: </strong>2, Lebuh Acheh, George Town, 10300 George Town, Pulau Pinang</h6>
                <p class="card-text"><strong>Phone: </strong>011-4000-7135</p>
                <p class="card-text"><strong>Email: </strong>hanzodanish@gmail.com</p>
              </div>
            </div>
          </div>
          <a href="/feedback" class="btn btn-info my-5">Review Page</a>
        </div>
      </div>
    </section>
    <!--footer-->
    <footer>
        <container class="text-light d-flex justify-content-center align-items-center p-2 bg-dark">
            <div class=" fs-6 text-warning">
                2025 BigVictorFans © All Rights Reserved
            </div>
            <div>
                <a target="_blank"  href="https://www.instagram.com" class="icon-link text-decoration-none"><i
                        class="p-3 bi bi-instagram icon-link text-warning"></i></a>
                <a target="_blank" href="https://www.facebook.com" class="icon-link text-decoration-none "><i
                        class="p-3 bi bi-facebook icon-link text-warning"></i></a>
                <a target="_blank" href="https://x.com/?lang=en" class="icon-link text-decoration-none "><i
                        class="p-3 bi bi-twitter icon-link text-warning"></i></a>
            </div>
        </container>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>