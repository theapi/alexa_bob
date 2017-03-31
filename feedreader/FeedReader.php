<?php
require 'vendor/autoload.php';

use PicoFeed\Reader\Reader;

Class FeedReader {
    protected $url;
    protected $db;

    protected $out = ['audioData' => []];

    public function __construct($url, $db = null) {
        $this->url = $url;
        $this->db = $db;
    }

    public function getAudioData() {
        try {

            //see https://github.com/fguillot/picoFeed/blob/master/docs/feed-parsing.markdown
            $reader = new Reader;
            $resource = $reader->download($this->url);

            $parser = $reader->getParser(
                $resource->getUrl(),
                $resource->getContent(),
                $resource->getEncoding()
            );

            $feed = $parser->execute();
            foreach ($feed->items as $item) {
                $data = [];
                $data['title'] = $item->getTitle();
                $data['url'] = str_replace('http:', 'https:', $item->getEnclosureUrl());
                $this->out['audioData'][] = $data;
                // For the db cache.
                $data['date'] = $item->getPublishedDate()->format('U');

                if ($this->db instanceof PDO) {
                    if (!$this->db->itemExists($data['title'])) {
                        echo "Adding " . $data['title'] . "\n";
                        $this->db->addAudioData($data['title'], $data['url'], $data['date']);
                    }
                }
            }
            //return json_encode($this->out);
        }
        catch (Exception $e) {
            // Do something...
        }
    }

}
