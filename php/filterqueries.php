<?php

if (isset($_POST['durationup'])) {
    $sql = 'SELECT * FROM `tasks` WHERE list_id =:listid ORDER BY duration ASC';
    $query = $conn->prepare($sql);
    $query->bindParam(':listid', $_GET['listid']);
    $query->execute();
    $taskresult = $query->fetchAll();
}

if (isset($_POST['durationdown'])) {
    $sql = 'SELECT * FROM `tasks` WHERE list_id =:listid ORDER BY duration DESC';
    $query = $conn->prepare($sql);
    $query->bindParam(':listid', $_GET['listid']);
    $query->execute();
    $taskresult = $query->fetchAll();
}

if (isset($_POST['finishedup'])) {
    $sql = 'SELECT * FROM `tasks` WHERE list_id =:listid ORDER BY finished ASC';
    $query = $conn->prepare($sql);
    $query->bindParam(':listid', $_GET['listid']);
    $query->execute();
    $taskresult = $query->fetchAll();
}

if (isset($_POST['finisheddown'])) {
    $sql = 'SELECT * FROM `tasks` WHERE list_id =:listid ORDER BY finished DESC';
    $query = $conn->prepare($sql);
    $query->bindParam(':listid', $_GET['listid']);
    $query->execute();
    $taskresult = $query->fetchAll();
}