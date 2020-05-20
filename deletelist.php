<?php

require('inc/dbconn.php');

$sql = 'SELECT * FROM lists WHERE id = :listid';
$query = $conn->prepare($sql);
$query->bindParam(':listid', $_GET['listid']);
$query->execute();
$result = $query->fetch();

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
        <div class="list" style="margin-top: 0; padding-top: 12.5rem">
            <div class="card" style="min-height: 0;">
                <div class="card-body">
                    <h5 class="card-title">Weet u zeker dat u de lijst, "<?php echo $result['title'];?>", wilt verwijderen</h5>

                    <?php // echo htmlspecialchars($_SERVER['PHP_SELF']) ?>
                    
                    <form action="php/delete.php" method="post">
                        <div class="form-group">

                        <input class="form-control" type="hidden" name="id" value="<?php echo $result['id'];?>">

                        <div style="margin-top: 1em;">
                          <button type="submit" class="btn btn-danger">Verwijderen</button>
                          <a href="index.php"><button type="button" class="btn btn-success">Annuleren</button></a>
                        </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>