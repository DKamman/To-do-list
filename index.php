<?php

require('inc/dbconn.php');

$sql = 'SELECT * FROM lists';
$query = $conn->prepare($sql);
$query->execute();

$result = $query->fetchAll();
// var_dump($result);

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
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Welkom op de To-Do List app</h5>
        <p class="card-text">Je kan rechtsboven in een lijst toevoegen en door al je lijsten heen klikken met de tabjes.</p>
        <ol>
          <li>En hier komen</li>
          <li>Je taken</li>
          <li>Te staan</li>
        </ol>
      </div>
    </div>
  </div>
</div> 

<?php
include('inc/htmlend.html');
?>