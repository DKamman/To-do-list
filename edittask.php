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
                <form action="php/edittask.php" method="post">
                    <div class="form-group">    

                        <div class="edit-box">
                            <h5 class="card-title">Titel</h5>
                            <input class="form-control" type="text" name="task" value="<?php echo $result['task'];?>">
                        </div>
                        
                        <div class="edit-box">
                            <h5 class="card-title">Duration (minutes)</h5>
                            <input class="form-control" type="number" name="duration" value="<?php echo $result['duration'];?>">
                        </div>

                        <div class="edit-box">
                            <h5 class="card-title">Voltooid</h5>
                            <select name="finished">
                                <option value="0">Niet voltooid</option>
                                <option value="1">Voltooid</option>
                            </select>
                        </div>

                        <?php // echo htmlspecialchars($_SERVER['PHP_SELF']) ?>

                        <input type="hidden" name="id" value="<?php echo $result['id'];?>">
                        <input type="hidden" name="list_id" value="<?php echo $result['list_id'];?>">

                        <div style="margin-top: 1em;">
                            <a href="list.php?listid=<?= $result['list_id']?>"><button type="button" class="btn btn-danger">Annuleren</button></a>
                            <button type="submit" class="btn btn-success">Opslaan</button>
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