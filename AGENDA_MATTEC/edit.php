<?php
    include_once("templates/header.php");
?>

    <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    
    <!-- <?php include("templates/show_message.php"); ?> -->


    <h1 id="main-title">Editar Contato</h1>
    <form id="create-form" action="<?=$BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome!" value="<?= $contact['name'] ?>" required>

        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone!"  value="<?= $contact['phone'] ?>" required>

        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Digite a disciplina!"  value="<?= $contact['subject'] ?>" required>

        </div>
        <div class="form-group">
            <label for="observations">Observations</label>
            <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Digite as observações!" rows="3"><?= $contact['observations'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>

    </form>
    </div>

<?php
    include_once("templates/footer.php");
?>
