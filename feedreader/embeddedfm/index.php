<?php
require '../FeedReader.php';

// http://embedded.fm/episodes?format=JSON
// $json = '
// {
//     "audioData": [
//         {
//             "title": "191: WHAT, YOGURT!?!",
//             "url" : "https://traffic.libsyn.com/makingembeddedsystems/embedded-ep191.mp3"
//         },
//         {
//             "title": "190: Trust Me, I’m Right",
//             "url" : "https://traffic.libsyn.com/makingembeddedsystems/embedded-ep190.mp3"
//         },
//         {
//             "title": "189: The Squishiness Factor",
//             "url" : "https://traffic.libsyn.com/makingembeddedsystems/embedded-ep189.mp3"
//         }
//     ]
// }
// ';

$reader = new FeedReader('http://embedded.fm/?format=rss');

header('Content-Type: application/json');
print $reader->getAudioData();
