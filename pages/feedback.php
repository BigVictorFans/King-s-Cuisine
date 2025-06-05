<?php
$database = connectToDB();

// Get all published feedback
$sql = "SELECT * FROM feedback";
$query = $database->prepare($sql);
$query->execute();
$feedbacks = $query->fetchAll();
?>

<?php require "parts/header.php"; ?>

<div class="container mx-auto my-5" style="max-width: 500px;">
    <?php foreach ( $feedbacks as $feedback ) : ?>
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title"><?= $feedback["title"]; ?></h5>
                <p class="card-text"><?= 'By ' . $feedback["name"]; ?></p>
                <p class="card-text"><?= $feedback["content"]; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require "parts/footer.php"; ?>