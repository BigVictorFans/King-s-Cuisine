<?php

  if ( !isEditor() ) {
    header("Location: /admin");
    exit;
  }



    // 1. connect to database
    $database = connectToDB();


    // 2. get all the data from the form using $_POST
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $image = $_FILES["image"];

    /*
        3. error checking
        - make sure all the fields are not empty 
    */
    if (empty($name) || empty($description) || empty($price) || empty($type)) {
        $_SESSION["error"] = "All fields are required";
        header("Location: /admin/manage_foods");
        exit;
    }

    // trigger the file upload
    // make sure $image is not empty
    if ( !empty( $image ) ) {
        // where is the upload folder
        $target_folder = "uploads/";
        // add the image name to the upload folder path
        $target_path = $target_folder . date( "YmdHisv" ) . "_" . basename( $image["name"] );
        // move the file to the uploads folder
        move_uploaded_file( $image["tmp_name"] , $target_path );
    }

    // create the post

    $sql = "INSERT INTO foods (`name`,`description`, `image`, `type`, `price`) VALUES (:name, :description, :image, :type, :price)";
    $query = $database->prepare($sql);
    $query->execute([
        "name" => $name,
        "description" => $description,
        "image" => isset( $target_path ) ? $target_path : "",
        "type" => $type,
        "price" => $price,
    ]);

    //step 4 display success message
    $_SESSION["success"] = "Post has been created";


    // 5. Redirect back to the /manage-posts page
    header("Location: /admin/manage_foods"); 
    exit; // meow :3