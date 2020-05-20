<?php

require('../inc/dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $number = $_POST['number'];
    $time   = $_POST['time'];

    // var array = [
    //     {type: 'minute', seconds: 60}, 
    //     {type: 'hour', seconds: 3600}, 
    //     {type: 'day', seconds: 86400},
    //     {type: 'week', seconds: 604800}, 
    //     {type: 'month', seconds: 2419200},
    //     {type: 'year', seconds: 29030400}
    // ];

    function durationCalculate() {
        return number * time.seconds;
    }

    // $stmt = $conn->prepare('INSERT INTO tasks (task, duration, list_id) VALUES (:task, :duration, :list_id)');

    // $stmt->bindParam(':task', $_POST['title']);
    // $stmt->bindParam(':duration', $_POST['duration']);
    // $stmt->bindParam(':list_id', $_POST['list_id']);
  
    // $stmt->execute();
  
    // $conn = null;



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Local CSS -->
    <link rel="stylesheet" href="../css/todostyle.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>To do list</title>
  </head>
  <body>

    <div class="main-content">
        <div class="list" style="margin-top: 0; padding-top: 12.5rem">
            <div class="card" style="min-height: 0;">
                <div class="card-body">
                    <h5 class="card-title">Taak succesvol toegevoegd</h5>
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

<?php header('Refresh:1; url=../index.php'); }?>