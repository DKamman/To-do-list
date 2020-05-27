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
      <div class="card-body">
        <h5 class="card-title"><?= $listresult['title']?>
          <a class="JSButton" onClick="editList()"><img class="edit-logo" src="img/pencil.png" alt="edit-logo"></a>
          <a href="deletelist.php?listid=<?= $listresult['id']?>"><img src="img/trashbin.png" alt="trashbin"></a>
        </h5>

        <ol>
          <table class="task-table">
            <?php
              // var_dump($taskresult);
              if (count($taskresult) == 0) {
                ?>
                <p>U heeft nog geen items</p>              
              <?php
                  } else {
              ?>
              <tr>
                <th>Taak</th>
                <th>Duratie</th>
                <th>Voltooid</th>
              </tr>
              <?php              
                  foreach ($taskresult as $taskrow) { ?>             
              <tr>              
                <td><li> <p> <?php echo $taskrow['task']?> </li> </p> </td>
                <td> <p> <?php echo $taskrow['duration']?> Minuten </p> </td>
                <td> <p> <?php echo $taskrow['state']?> </p> </td> 
              </tr>            
              <?php 
                  } 
                }
              ?>

          </table>
        </ol>
        
        <a href="addtask.php?listid=<?= $listresult['id']?>"><img src="img/plus.png" alt=""></a>
      </div>
    </div>

            
    <!-- Begin of edit card -->

    <div id="editlist" class="card" style="display: none;">
      <div class="card-body">
        <form action="php/editlist.php" method="post">
          <input type="hidden" name="id" value="<?php echo $listresult['id'];?>"></input>
          <h5>Titel<a onClick="cancelEdit()"><img class="cancel-logo JSButton" src="img/cross.png" alt="edit-logo"></a></h5>
          <input class="form-control" type="text" name="title" value="<?= $listresult['title']?>"></input>
          <h6 class="task-list card-title">Items</h6>

          <ol>
            <table class="task-table">
              <?php
                // var_dump($taskresult);
                if (count($taskresult) == 0) {
                  ?>
                  <p>U heeft nog geen items</p>              
                <?php
                    } else {
                ?>
                <tr>
                  <th>Taak</th>
                  <th>Duratie</th>
                  <th></th>
                  <th>Voltooid</th>
                </tr>
                <?php
                    foreach ($taskresult as $taskrow) { ?>  
                <tr>  
                <?php // echo $taskrow['id']; ?>            
                  <td> <li> <input type="text" class="form-control" name="" value="<?php echo $taskrow['task']?>"> </li> </td>
                  <td> <input type="text" class="form-control" name="" value="<?php echo $taskrow['duration']?>"></td>
                  <td><span>Minuten</span></td>
                  <td> <input type="text" class="form-control" name="" value="<?php echo $taskrow['state']?>"> </td>
                  <td> <a href="deletetask.php?taskid=<?= $taskrow['id']?>"><img class="trashbin" src="img/trashbin.png" alt="trashbin"></a> </td>
                </tr>            
                <?php 
                    } 
                  }
                ?>

            </table>
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

<?php
include('inc/htmlend.html');
?>