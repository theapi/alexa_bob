<?php

// http://theamphour.com/feed/podcast/
$json = '
{
    "audioData": [
        {
            "title": "#339, Look at nature and meet nerds",
            "url" : "https://traffic.libsyn.com/theamphour/TheAmpHour-339-LookAtNatureAndMeetNerds.mp3"
        },
        {
            "title": "#338, An Interview with Jørgen Jakobsen",
            "url" : "https://traffic.libsyn.com/theamphour/TheAmpHour-338-AnInterviewWithJorgenJakobsen.mp3"
        }
    ]
}
';

header('Content-Type: application/json');
print $json;
