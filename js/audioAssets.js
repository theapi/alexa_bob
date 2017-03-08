'use strict';


var audioData = [];

var options = {
  url: config.feedreader,
  rejectUnauthorized: false,
  agent: false,
  headers: {
    'Authorization' : 'Bearer ' + config.token
  }
};
request.get(options, function(error, response, body) {
  //console.log(body);
  var d = JSON.parse(body);
  if (d.audioData) {
    audioData = d.audioData;
  } 
});

module.exports = audioData;
