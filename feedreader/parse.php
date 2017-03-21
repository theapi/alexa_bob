<?php

require 'vendor/autoload.php';

use PicoFeed\Reader\Reader;

try {

    $reader = new Reader;
    $resource = $reader->download('http://theamphour.com/feed/podcast/');

    $parser = $reader->getParser(
        $resource->getUrl(),
        $resource->getContent(),
        $resource->getEncoding()
    );

    $feed = $parser->execute();

    echo $feed;
}
catch (Exception $e) {
    // Do something...
}

