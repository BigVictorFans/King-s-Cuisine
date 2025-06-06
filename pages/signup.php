<?php require "parts/header.php";

?>

    <div class="container my-5 mx-auto" style="max-width: 500px;"> 
        <div class="card rounded shadow-sm mx-auto my-4" style="max-width: 500px;">
            <div class="card-body">
                <h5 class="card-title text-center mb-3 py-3 border-bottom">
                Sign Up a New Account
                </h5>
                <!-- display error -->  
                <?php require ("parts/message_error.php"); ?>
                <!-- sign up form-->
                <form action="/auth/signup" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    />
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label"
                    >Confirm Password</label
                    >
                    <input
                    type="password"
                    class="form-control"
                    id="confirm_password"
                    name="confirm_password"
                    />
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-fu">
                    Sign Up
                    </button>
                </div>
                </form>
            </div>
        </div>

          <!-- links -->
        <div
            class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-3"
        >
            <a href="/" class="text-decoration-none small"
            ><i class="bi bi-arrow-left-circle"></i> Go back</a
            >
            <a href="/login" class="text-decoration-none small"
            >Already have an account? Login here
            <i class="bi bi-arrow-right-circle"></i
            ></a>
        </div>
    </div>

    <?php require "parts/footer.php"; ?>
