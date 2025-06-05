<?php
   
function connectToDB(){
  //database info
  
  $host = "127.0.0.1";
  $database_name = "kings_cuisine";
  $database_user = "root";
  $database_password = "";


  //conect it to the database

  $database = new PDO(
   "mysql:host=$host;
   dbname=$database_name",
   $database_user, 
   $database_password
  );

  return $database;
}

/* 
    Get user data by email
    Input: email
    Output: user
*/
function getUserByEmail( $email ) {

  // connect to database
  $database = connectToDB();

  // 5.1 SQL
  $sql = "SELECT * FROM users WHERE email = :email";
  // 5.2 prepare
  $query = $database->prepare( $sql );
  // 5.3 execute
  $query->execute([
      "email" => $email
  ]);
  // 5.4 fetch
  $user = $query->fetch(); // return the first row of the list 

  return $user;
}

function isUserLoggedIn() {
  return isset( $_SESSION["user"] );
}

function isAdmin() {
  // check if user session is set or not
  if ( isset( $_SESSION["user"] ) ) {
      // check if user is an admin
      if ( $_SESSION["user"]['role'] === 'admin' ) {
          return true;
      } 
  } 
  return false;
}

function isEditor() {
  return isset( $_SESSION["user"] ) && ( $_SESSION["user"]['role'] === 'admin' || $_SESSION["user"]['role'] === 'editor' ) ? true : false;
}

?>

<?php
function FoodBox($foodtype) {
    global $foods;
    ?>
    <?php foreach ($foods as $food): ?>
        <?php if ($food["type"] == $foodtype): ?>
            <!--card-->
            <div class="col-12 col-md-6 col-lg-4 my-3">
                <div class="card" style="height: 600px">
                    <img width="100" height="350" src="/<?= $food["image"]; ?>" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title text-decoration-underline">
                            <?= htmlspecialchars($food["name"]) ?>
                        </h5>
                        <p class="fs-6"><?= htmlspecialchars($food["description"]) ?></p>
                        <p><?= 'RM ' . number_format( $food['price'], 2); ?></p> 
                        <div class="d-flex justify-content-end">
                            <a href="view?id=<?= $food["id"]; ?>"><button type="button" class="btn btn-success">Add To Cart</button></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php
}
?>
