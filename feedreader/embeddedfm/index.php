<?php
require dirname(__DIR__) . '/Db.php';

try {
    $db = new Db(__DIR__ . '/embeddedfm');
    $db->init();

    $latest = $db->getLatest();

    $audio_data  = json_encode(["audioData" => $latest]);

} catch (PDOException $e) {
    //echo $e->getMessage();
    //echo $e->getTraceAsString();
}

header('Content-Type: application/json');
print $audio_data;
