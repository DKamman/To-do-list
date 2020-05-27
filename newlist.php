<?php
include('inc/indexhtmlstart.html');
?>

<div class="main-content">
    <div class="list" style="margin-top: 0; padding-top: 12.5rem">
        <div class="card" style="min-height: 0;">
            <div class="card-body">
                <h5 class="card-title">Een nieuwe lijst toevoegen</h5>

                <?php // echo htmlspecialchars($_SERVER['PHP_SELF']) ?>

                <form action="php/addlist.php" method="post">
                    <div class="form-group">

                    <label for="title">Titel van de lijst</label>
                    <input class="form-control" type="text" name="title" required>

                    <div style="margin-top:1em;">
                        <a href="index.php"><button type="button" class="btn btn-danger">Annuleren</button></a>
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