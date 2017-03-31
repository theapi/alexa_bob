<?php
require dirname(__DIR__) . '/Db.php';
require dirname(__DIR__) . '/FeedReader.php';

try {
    $db = new Db(__DIR__ . '/embeddedfm');
    $db->init();

    $reader = new FeedReader('http://embedded.fm/?format=rss', $db);
    $reader->getAudioData();

} catch(PDOException $e) {
    echo $e->getMessage();
    echo $e->getTraceAsString();
}


//header('Content-Type: application/json');
//print $reader->getAudioData();
