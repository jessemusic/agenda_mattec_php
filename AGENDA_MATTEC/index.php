<?php
    // Inicia a sessão somente se ela ainda não estiver ativa
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }



    include_once("templates/header.php");

    // Verifica se a mensagem foi definida e a exibe
    if (isset($_SESSION["msg"]) && $_SESSION["msg"] != '') {
        $printMsg = $_SESSION["msg"];
        // Após exibir a mensagem, remove ela da sessão para que não apareça novamente
        unset($_SESSION["msg"]);
    }
?>



    <div class="container">
            <?php include("templates/show_message.php"); ?>
        <h1 id="main-title">Minha agenda</h1>
        
        <?php if(count($contacts) > 0): ?>
            <table class="table" id="contacts-table">
               <thead>
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Name</th>
                   <th scope="col">Phone</th>
                   <th scope="col">Subject</th>
                   <th scope="col">Observations</th>
                 </tr>
               </thead>
               <tbody>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                          <th scope="row" class="col-id"><?=$contact['id']?></th>
                          <td scope="row"><?= $contact['name'] ?></td>
                          <td scope="row"><?= $contact['phone'] ?></td>
                          <td scope="row"><?= $contact['subject'] ?></td>
                          <td class ="actions">
                            <a href="<?= $BASE_URL ?>show.php?id=<?=$contact['id']?>"><i class="fas fa-eye check-icon"></i></a>
                            <a href="<?= $BASE_URL ?>edit.php?id=<?=$contact['id']?>"><i class="far fa-edit edit-icon"></i></a>
                            <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST" >
                              <input type="hidden" name="type" value="delete">
                              <input type="hidden" name="id" value ="<?= $contact['id'] ?>">
                              <input type="hidden" name="name" value="<?= $contact['name'] ?>"> 
                              <button type="submit" class="delete-btn" onclick="return confirm('Tem certeza que deseja excluir esse contato --> <?=$contact['name']?>?')"><i class="fas fa-trash delete-icon"></i></button>
                            </form>
                          </td>
                        </tr>
                    <?php endforeach;?>

               </tbody> 
            </table>
        <?php else:?>
            <p id="empty-list-text">NÃO TEM CONTATOS, <a href="<?=$BASE_URL ?>create.php">Clique aqui para Adicionar</a>.</p>
        <?php endif;?>
        
    </div>

<?php
    include_once("templates/footer.php");
?>
