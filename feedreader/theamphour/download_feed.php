<?php
require '../Db.php';
require '../FeedReader.php';

try {
    $db = new Db('theamphour');
    $db->init();

    $reader = new FeedReader('http://theamphour.com/feed/podcast/', $db);
    $reader->getAudioData();
    
} catch(PDOException $e) {
    echo $e->getMessage();
    echo $e->getTraceAsString();
}


//header('Content-Type: application/json');
//print $reader->getAudioData();
