<?php 
require('inc/dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $stmt = $conn->prepare('INSERT INTO lists (title) VALUES (:title)');

  $stmt->bindParam(':title', $title);
  $title =    $_POST['title'];

  $stmt->execute();

  $conn = null;
?>

<?php header('Refresh:1; url=index.php'); }else{

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
                    <h5 class="card-title">Een nieuwe lijst toevoegen</h5>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

<?php
}
?>