<?php require "parts/header.php"; ?>
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
        <h1 class="text-center">Contact Us</h1>
        <div class="row container justify-content-center align-items-center">
          <div class="container col-12 col-lg-6">
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Name</label>
              <textarea
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="1"
                placeholder="Enter Your Name..."
              ></textarea>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label"
                >Email address</label
              >
              <input
                type="email"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder="Enter Your Email..."
              />
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Subject</label>
              <textarea
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="1"
                placeholder="Enter Your Subject..."
              ></textarea>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Message</label>
              <textarea
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="5"
                placeholder="Enter Your Message..."
              ></textarea>
            </div>
             <button type="button" class="btn btn-primary">Submit!</button>
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
        </div>
      </div>
    </section>
    <!--footer-->
    <footer>
        <container class="text-light d-flex justify-content-center align-items-center p-2" style="background-color: maroon;">
            <div class=" fs-6">
                2025 BigVictorFans © All Rights Reserved
            </div>
            <div>
                <a target="_blank" href="https://www.instagram.com" class="icon-link text-decoration-none"><i
                        class="p-3 bi bi-instagram icon-link"></i></a>
                <a target="_blank" href="https://www.facebook.com" class="icon-link text-decoration-none "><i
                        class="p-3 bi bi-facebook icon-link"></i></a>
                <a target="_blank" href="https://x.com/?lang=en" class="icon-link text-decoration-none "><i
                        class="p-3 bi bi-twitter icon-link"></i></a>
            </div>
        </container>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>