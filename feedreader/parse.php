<?php

require 'vendor/autoload.php';

use PicoFeed\Reader\Reader;

if (empty($argv[1])) {
    echo "Feed url?\n";
    exit(1);
} else {
    $url = $argv[1];
}

try {

    $reader = new Reader;
    $resource = $reader->download($url);

    $parser = $reader->getParser(
        $resource->getUrl(),
        $resource->getContent(),
        $resource->getEncoding()
    );

    $feed = $parser->execute();
    $etag = $resource->getEtag();
    $last_modified = $resource->getLastModified();
    echo "etag: $etag last_modified: $last_modified\n";
    foreach ($feed->items as $item) {
        //echo $item->getTitle() . ',' . $item->getEnclosureUrl() . "\n";

    }

}
catch (Exception $e) {
    // Do something...
}
