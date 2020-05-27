<?php

$list_id = $_GET['listid'];
// var_dump($list_id);

include('inc/indexhtmlstart.html');
?>

<div class="main-content">
    <div class="list" style="margin-top: 0; padding-top: 12.5rem">
        <div class="card" style="min-height: 0;">
            <div class="card-body">
                <h5 class="card-title">Een nieuwe taak toevoegen</h5>

                <?php // echo htmlspecialchars($_SERVER['PHP_SELF']) ?>

                <form action="php/addtask.php" method="post">
                    <div class="form-group">

                        <label for="description">Taak</label>
                        <input class="form-control" type="text" name="task" required>

                        <label for="duration">Hoelang denk je er mee bezig te zijn</label>
                        <div><input class="form-control" id="minute-input" type="number" name="duration" placeholder="2" value="2"><span style="margin-left: 5px;">Minuten</span></div>

                        <input type="hidden" name="list_id" value="<?php echo $list_id ?>">

                        <div style="margin-top:1em;">
                            <a href="list.php?listid=<?= $list_id?>"><button type="button" class="btn btn-danger">Annuleren</button></a>
                            <button type="submit" class="btn btn-success">Toevoegen</button>
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