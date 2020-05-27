<?php

require('inc/dbconn.php');

$sql = 'SELECT * FROM tasks WHERE id = :taskid';
$query = $conn->prepare($sql);
$query->bindParam(':taskid', $_GET['taskid']);
$query->execute();
$result = $query->fetch();

// var_dump($result);

include('inc/indexhtmlstart.html');
?>

<div class="main-content">
    <div class="list" style="margin-top: 0; padding-top: 12.5rem">
        <div class="card" style="min-height: 0;">
            <div class="card-body">
                <h5 class="card-title">Weet u zeker dat u deze taak, "<?php echo $result['task'];?>", wilt verwijderen?</h5>

                <?php // echo htmlspecialchars($_SERVER['PHP_SELF']) ?>
                
                <form action="php/deletetask.php" method="post">
                    <div class="form-group">

                    <input type="hidden" name="id" value="<?php echo $result['id'];?>">
                    <input type="hidden" name="list_id" value="<?php echo $result['list_id'];?>">

                    <div style="margin-top: 1em;">
                      <button type="submit" class="btn btn-danger">Verwijderen</button>
                      <a href="list.php?listid=<?= $result['list_id']?>"><button type="button" class="btn btn-success">Annuleren</button></a>
                    </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php
include('inc/htmlend.html');
?>