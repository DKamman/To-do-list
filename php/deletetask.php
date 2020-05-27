<?php

require('../inc/dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $stmt = $conn->prepare('DELETE FROM tasks WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $id =    $_POST['id'];
  $stmt->execute();

  $conn = null;

  include('../inc/htmlstart.html');
?>

<div class="main-content">
    <div class="list" style="margin-top: 0; padding-top: 12.5rem">
        <div class="card" style="min-height: 0;">
            <div class="card-body">
                <h5 class="card-title">Taak succesvol verwijderd</h5>
            </div>
        </div>
    </div>
</div>
  
<?php 
include('../inc/htmlend.html');
header('Refresh:1; url=../list.php?listid='.$_POST['list_id']); }
?>

