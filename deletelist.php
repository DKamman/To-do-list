<?php

require('inc/dbconn.php');

$sql = 'SELECT * FROM lists WHERE id = :listid';
$query = $conn->prepare($sql);
$query->bindParam(':listid', $_GET['listid']);
$query->execute();
$result = $query->fetch();

include('inc/indexhtmlstart.html');
?>

<div class="main-content">
    <div class="list" style="margin-top: 0; padding-top: 12.5rem">
        <div class="card" style="min-height: 0;">
            <div class="card-body">
                <h5 class="card-title">Weet u zeker dat u de lijst, "<?php echo $result['title'];?>", wilt verwijderen</h5>

                <?php // echo htmlspecialchars($_SERVER['PHP_SELF']) ?>
                
                <form action="php/delete.php" method="post">
                    <div class="form-group">

                    <input class="form-control" type="hidden" name="id" value="<?php echo htmlspecialchars($result['id']);?>">

                    <div style="margin-top: 1em;">
                      <button type="submit" class="btn btn-danger">Verwijderen</button>
                      <a href="list.php?listid=<?= $_GET['listid']?>"><button type="button" class="btn btn-success">Annuleren</button></a>
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