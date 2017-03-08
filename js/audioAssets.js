'use strict';

var config = require('./config.json');
var request = require("request");


exports.getAudioData = function (feed, callback) {

//@todo static cache

  var data = [];
  var options = {
    url: config.feedreader,
    rejectUnauthorized: false,
    agent: false,
    headers: {
      'Authorization' : 'Bearer ' + config.token
    }
  };
  request.get(options, function(error, response, body) {
    if (error) {
      callback(data);
    } else {
      //console.log(body);
      var d = JSON.parse(body);
      if (d.audioData) {
        callback(d.audioData);
      } else {
        callback(data);
      }
    }
  });
}
