<?php

require('../inc/dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$stmt = $conn->prepare('UPDATE tasks SET task=:task, duration=:duration, finished=:finished WHERE id = :id');

$stmt->bindParam(':id', $_POST['id']);
$stmt->bindParam(':task', $_POST['task']);
$stmt->bindParam(':duration', $_POST['duration']);
$stmt->bindParam(':finished', $_POST['finished']);

$id = $_POST['list_id'];

$stmt->execute();

$conn = null;

include('../inc/htmlstart.html');
?>

<div class="main-content">
    <div class="list" style="margin-top: 0; padding-top: 12.5rem">
        <div class="card" style="min-height: 0;">
            <div class="card-body">
                <h5 class="card-title">Taak succesvol bewerkt</h5>
            </div>
        </div>
    </div>
</div>

<?php
include('../inc/htmlend.html');
header('Refresh:1; url=../list.php?listid='.$id); }
?>