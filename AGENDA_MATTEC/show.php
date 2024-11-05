<?php
    include_once("templates/header.php");
?>

    <div class="container" id="view-contact-container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title"><?= $contact["name"] ?></h1>
        <p class="bold">Phone</p>
        <p id="phone-number"><?= $contact["phone"]?></p>
        <p class="bold">Subject</p>
        <p id="subject"><?= $contact["subject"]?></p>
        <p class="bold">Observations</p>
        <p id="observations"><?= $contact["observations"]?></p>

    </div>

<?php
    include_once("templates/footer.php");
?>
