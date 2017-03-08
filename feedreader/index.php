<?php

$json = '
{
  "audioData": [
    {
      "title": "#338, An Interview with Jørgen Jakobsen",
      "url" : "https://traffic.libsyn.com/theamphour/TheAmpHour-338-AnInterviewWithJorgenJakobsen.mp3"
    }
  ]
}
';

header('Content-Type: application/json');
print $json;
