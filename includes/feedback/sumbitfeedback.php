<?php

    // 1. connect to database
    $database = connectToDB();


    // 2. get all the data from the form using $_POST
    $id = $_POST["id"];
    $name = $_POST["name"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    /*
        3. error checking
        - make sure all the fields are not empty 
    */
    if (empty($title) || empty($content) || empty($name)) {
        $_SESSION["error"] = "All fields are required";
        header("Location: /");
        exit;
    }

    // create the post

    $sql = "INSERT INTO feedback (`title`,`content`, `name` ) VALUES (:title, :content, :name)";
    $query = $database->prepare($sql);
    $query->execute([
        "title" => $title,
        "content" => $content,
        "name" => $name,
    ]);

    //step 4 display success message
    $_SESSION["success"] = "Post has been created";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout Successful</title>
    <script>
        alert("Your feedback has been submitted successfully!");
        window.location.href = "/"; // redirect to homepage
    </script>
</head>
<body>
</body>
</html>