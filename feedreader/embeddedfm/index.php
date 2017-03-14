<?php

// Hard coded for now
// http://embedded.fm/episodes?format=JSON
$json = '
{
    "audioData": [
        {
            "title": "190: Trust Me, I’m Right",
            "url" : "https://traffic.libsyn.com/makingembeddedsystems/embedded-ep190.mp3"
        },
        {
            "title": "189: The Squishiness Factor",
            "url" : "https://traffic.libsyn.com/makingembeddedsystems/embedded-ep189.mp3"
        }
    ]
}
';

header('Content-Type: application/json');
print $json;
