<?php

require('inc/dbconn.php');

// Selects all to-do lists for display on the tabs
$sql = 'SELECT * FROM lists';
$query = $conn->prepare($sql);
$query->execute();

$result = $query->fetchAll();
// var_dump($result);

// Selects all info from the to-do list where id is selected id
$sql = 'SELECT * FROM lists WHERE id =:listid';
$query = $conn->prepare($sql);
$query->bindParam(':listid', $_GET['listid']);
$query->execute();
$listresult = $query->fetch();

$sql = 'SELECT * FROM `tasks` WHERE list_id =:listid';
$query = $conn->prepare($sql);
$query->bindParam(':listid', $_GET['listid']);
$query->execute();
$taskresult = $query->fetchAll();

var_dump($taskresult);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Local CSS -->
    <link rel="stylesheet" href="css/todostyle.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>To do list</title>
  </head>
  <body>
    <div class="main-content">
      <div class="tab-list">
        <div class="container-fluid tabslist">

          <div class="row">

          <!-- Max amount of chars in a title = 35 -->

          <?php
          foreach ($result as $row) {
          ?>
           
            <div class="col-lg-2 lesspadding">
              <a class="tab-link" href="list.php?listid=<?= $row['id']?>">
                <div class="tab">
                  <h5 class="title"><?php echo $row['title']?></h5>
                </div>
              </a>
            </div>

            <?php
            }
            ?>

            <div class="col-lg-2">
              <div class="newlist">
                <a href="newlist.php">Nieuwe Lijst +</a>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="list">
        <div id="standardlist" class="card" style="display: block;">
          <div class="card-body">
            <h5 class="card-title"><?= $listresult['title']?>
              <!-- <button class="btn btn-link" onClick="editList()"><img class="edit-logo" src="img/pencil.png" alt="edit-logo"></button> -->
              <a onClick="editList()"><img class="edit-logo" src="img/pencil.png" alt="edit-logo"></a>
              <a href="deletelist.php?listid=<?= $listresult['id']?>"><img src="img/trashbin.png" alt="trashbin"></a>
            </h5>
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            <ol>

                <?php
                // var_dump($taskresult);
                if (count($taskresult) == 0) {
                  ?>
                  <p>U heeft nog geen items</p>
                  <?php
                } else {
                foreach ($taskresult as $listrow) {
                ?>

                <li><?php echo $listrow['description']?></li>

                <?php
                  }
                }
                ?>

            </ol>
            <a href="addtask.php?listid=<?= $listresult['id']?>"><img src="img/plus.png" alt=""></a>
          </div>
        </div>

                <!-- Begin of edit card -->

        <div id="editlist" class="card" style="display: none;">
          <div class="card-body">
            <form action="php/editlist.php" method="post">
              <input type="hidden" name="id" value="<?php echo $listresult['id'];?>">
              <h5>Titel<a onClick="cancelEdit()"><img class="cancel-logo" src="img/cross.png" alt="edit-logo"></a></h5>
              <input type="text" name="title" value="<?= $listresult['title']?>">
              </input>
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
              <h6>Items</h6>
              <ol>

                  <?php
                  $i = 1;
                  // var_dump($taskresult);
                  if (count($taskresult) == 0) {
                    ?>
                    <p>U heeft nog geen items</p>
                    <?php
                  } else {
                  foreach ($taskresult as $taskrow) {
                  ?>

                  <li> <?= $taskrow['id']?> <input type="text" name="items[<?php echo $i?>]" value="<?php echo $taskrow['description']?>"><a href="deletetask.php?listid=<?= $taskrow['id']?>"><img src="img/trashbin.png" alt="trashbin"></a></li>

                  <?php
                    $i++;
                    }
                  }
                  ?>

              </ol>
          </div>
          
          <div class="card-end">
            <button type="submit" class="btn btn-success">Opslaan</button>
          </div>
          </form>
        </div>

                <!-- End of edit card -->

      </div>
    </div> 

    <!-- Optional JavaScript -->
    <script src="js/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>