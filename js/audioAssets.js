'use strict';

var config = require('./config.json');
var request = require("request");


exports.audioData = function() {
    this.getAudioData('foo')
    .then(function (value) {
        //console.log(value);
        return value;
    })
    .catch(function (reason) {
        console.error('getAudioData failed: ', reason);
        return [];
    });
}

exports.getAudioData = function(feed) {
    // Grrr need static. Execute request only once.

    return new Promise(
    function (resolve, reject) {
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
                // Something went wrong (404 etc.)
                reject(error);
            } else {
                console.log('REQUESTED');
                var d = JSON.parse(body);
                if (d.audioData) {
                    resolve(d.audioData);
                } else {
                    reject(error);
                }
            }
        });
    });
}
