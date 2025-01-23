<?php
require_once('functions.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>TODO-LIST</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="column left">
      <div class="form-container">
        <form method="POST" action="traitement.php"> <!--Le formulaire est traitée par la méthode POST par traitement.php -->
          <h>Ajouter Une Tâche</h>
          <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" required id="title" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" required name="description" rows="3" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="image">Date :</label>
            <input type="date" required id="date" name="date" class="form-control">
          </div>
          <div class="form-group" style="text-align:center">
            <button name="save_tache" id="btn_update" value="save" class="submit-button">Envoyer</button>
          </div>
          <input type="hidden" name="id" id="id" value="">
        </form>
      </div>
    </div>






    
    <div class="column right">
      <div class="todo-list-container">
        <h4>Liste Des Tâches</h4>
        <?php
        foreach (taches() as  $tache) {
        ?>
          <div class="todo-item">
            <div class="todo-title"><?= $tache['title'] ?></div>
            <div class="todo-description"><?= substr($tache['description'], 0, 100) ?></div>
            <div class="todo-date"><?= date('d M Y', strtotime($tache['date'])) ?></div>
            <?php
            if ($tache['status']) {
            ?>
              <div class="todo-status">
                <strong style="color:green">Terminé ( <?= date('d M Y', strtotime($tache['date_fin'])) ?> )</strong>
              </div>
              <div class="todo-buttons">
                <a onclick= "return confirm('Voulez vous vraiment supprimez cette tache?')" href="traitement.php?delete&id=<?$tache.['id']?>"><button class="todo-delete-button">Supprimer</button></a>
              </div>
              <?php
            } else {
            ?>
            <div class="todo-status">
                <strong style="color:goldenrod">En cours</strong>
              </div>
              <div class="todo-buttons">
                <button onclick="update(<?= $tache['id'] ?>)" class="todo-edit-button">Modifier</button>
                <a onclick="return confirm('Voulez-vous vraiment supprimer ?')" href="traitement.php?delete&id=<?= $tache['id'] ?>"><button class="todo-delete-button">Supprimer</button></a>
                <a onclick="return confirm('Avez-vous finir cette tâche ?')"  href="traitement.php?terminer&id=<?= $tache['id'] ?>"><button class="todo-complete-button">Terminer</button></a>
              </div>
            <?php
            }
            ?>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
  </div>
  <script src="script.js"></script>
</body>

</html>