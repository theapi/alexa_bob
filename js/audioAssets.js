'use strict';

var config = require('./config.json');
var request = require("request");

/**
 * Use the same promise for getting data so the request is only called once.
 */
const audioDataPromise = new Promise(
function (resolve, reject) {
    var options = {
        url: config.feedreader,
        rejectUnauthorized: false,
        // agent: false,
        // headers: {
        //     'Authorization' : 'Bearer ' + config.token
        // }
    };
    request.get(options, function(error, response, body) {
        if (error) {
            // Something went wrong (404 etc.)
            reject(error);
        } else {
            //console.log(options.url);
            var d = JSON.parse(body);
            if (d.audioData) {
                resolve(d.audioData);
            } else {
                reject(error);
            }
        }
    });
});

/**
 * Returns the audio data as a JSON object.
 */
exports.audioData = function() {
    return audioDataPromise.then(function (value) {
        //console.log(value);
        return value;
    })
    .catch(function (reason) {
        console.error('getAudioData failed: ', reason);
        return [];
    });
}

exports.getAudioDataPromise = function() {
    return audioDataPromise;
}
