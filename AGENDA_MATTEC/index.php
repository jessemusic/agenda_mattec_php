<?php
    include_once("templates/header.php");
?>

    <div class="container">
        <?php if(isset($printMsg) && $printMsg !='') : ?>
            <p id="msg"><?= $printMsg ?></p>
        <?php endif; ?>
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
                          <td scope="row"><?= $contact['observations'] ?></td>
                          <td class ="actions">
                            <a href="<?= $BASE_URL ?>show.php?id=<?=$contact['id']?>"><i class="fas fa-eye check-icon"></i></a>
                            <a href="<?= $BASE_URL ?>edit.php?id=<?=$contact['id']?>"><i class="far fa-edit edit-icon"></i></a>
                            <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST" >
                              <input type="hidden" name="type" value="delete">
                              <input type="hidden" name="id" value ="<?= $contact['id'] ?>">
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