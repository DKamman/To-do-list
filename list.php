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



function finished() {
  if ($taskresult['finished'] == 1) {
    $value = 'Voltooid';
  } 
  if ($taskresult['finished'] == 0) {
    $value = 'Niet voltooid';
  }
}

include('inc/indexhtmlstart.html');
?>

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
      <div class="card-begin">
        <a class="JSButton" onClick="editList()"><img class="edit-logo" src="img/pencil.png" alt="edit-logo"></a>
        <a href="deletelist.php?listid=<?= $listresult['id']?>"><img src="img/trashbin.png" alt="trashbin"></a>
      </div>
      <div class="card-body">
        <h3 class="card-title"><?= $listresult['title']?></h3>
        
        <?php
        // var_dump($taskresult);
          if (count($taskresult) == 0) {
        ?>
          <p>U heeft nog geen items</p>
          <table>
        <?php
          } else {
        ?>
        <ol>
          <table class="task-table">              
            <tr>
              <th>Taak</th>
              <th>Duratie</th>
              <th>Voltooid</th>
            </tr>
            <?php              
                foreach ($taskresult as $taskrow) { ?>             
            <tr>              
              <td><li> <p> <?php echo $taskrow['task'];?> </li> </p> </td>
              <td> <p> <?php echo $taskrow['duration'];?> Minuten </p> </td>
              <td> <p> <?php  var_dump($taskrow['finished']); ?> </p> </td> 
            </tr>            
            <?php 
                } 
              }
            ?>
            <tr>
              <td style="padding: 0px 80px"></td>
              <td></td>
              <td></td>
              <td><a class="add-task" href="addtask.php?listid=<?= $listresult['id']?>"><img src="img/plus.png" alt=""></a></td>
            </tr>
          </table>
        </ol>

      </div>
    </div>

            
            <!-- Begin of edit card -->

    <div id="editlist" class="card" style="display: none;">
      <div class="card-body">
        <form action="php/editlist.php" method="post">
          <input type="hidden" name="id" value="<?php echo $listresult['id'];?>"></input>
          <h3 class="card-title">Titel</h3>
          <input class="form-control" type="text" name="title" value="<?= $listresult['title']?>"></input>
          <h5 class="task-list card-title">Items</h5>

          <?php
          // var_dump($taskresult);
            if (count($taskresult) == 0) {
          ?>
            <p>U heeft nog geen items</p>
            <table>
          <?php
            } else {
          ?>
          <ol>
            <table class="task-table">              
              <tr>
                <th>Taak</th>
                <th>Duratie</th>
                <th>Voltooid</th>
              </tr>
              <?php              
                  foreach ($taskresult as $taskrow) { ?>             
              <tr>              
                <td><li> <p> <?php echo $taskrow['task'];?> </li> </p>
                </td>

                <td> <p> <?php echo $taskrow['duration'];?> Minuten </p>
                </td>

                <td> <p> <?php echo $taskrow['finished'];?> </p> 
                </td>

                <td>
                  <a href="edittask.php?taskid=<?= $taskrow['id']?>"><img src="img/pencil.png" alt="pencil"></a> 
                  <a href="deletetask.php?taskid=<?= $taskrow['id']?>"><img src="img/trashbin.png" alt="trashbin"></a>
                </td>
              </tr>            
              <?php 
                  } 
                }
              ?>
          </table>
        </ol>

        </div>
      
        <div class="card-end">
          <button type="button" onClick="cancelEdit()" class="btn btn-danger">Annuleren</button>
          <button type="submit" class="btn btn-success">Opslaan</button>
        </div>
      </form>
    </div>

            <!-- End of edit card -->


  </div>
</div> 

<?php
include('inc/htmlend.html');
?>