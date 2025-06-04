<?php

    // 1. connect to database
    $database = connectToDB();


    // 2. get all the data from the form using $_POST
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $id = $_POST["id"];
    $image = $_FILES["image"];

    /*
        3. error checking
        - make sure all the fields are not empty 
    */
    if (empty($name) || empty($description) || empty($price) || empty($type)) {
        $_SESSION["error"] = "All fields are required";
        header("Location: /admin/manage_foods/edit?id=" . $id);
        exit;
    }

    // if $image is not empty, then do image upload
    if ( !empty( $image ) ) {
        // where is the upload folder
        $target_folder = "uploads/";
        // add the image name to the upload folder path
        $target_path = $target_folder . basename( $image["name"] );
        // move the file to the uploads folder
        move_uploaded_file( $image["tmp_name"] , $target_path );

        // update the post with image path
        $sql = "UPDATE foods SET name = :name, description = :description, price = :price, type = :type, image = :image WHERE id = :id";
        $query = $database->prepare($sql);
        $query->execute([
            "name" => $name,
            "description" => $description,
            "image" => $target_path,
            "type" => $type,
            "price" => $price,
            "id" => $id,
        ]);
    } else {
        $sql = "UPDATE foods SET name = :name, description = :description, price = :price, type = :type WHERE id = :id";
        $query = $database->prepare($sql);
        $query->execute([
            "name" => $name,
            "description" => $description,
            "type" => $type,
            "price" => $price,
            "id" => $id,
        ]);
    }

    //step 4 display success message
    $_SESSION["success"] = "Post has been updated";

    // 5. Redirect back to the /manage-foods page
    header("Location: /admin/manage_foods"); 
    exit; // meow :