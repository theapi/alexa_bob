'use strict';

var Alexa = require('alexa-sdk');
var request = require("request");
var constants = require('./constants');
var stateHandlers = require('./stateHandlers');
var audioEventHandlers = require('./audioEventHandlers');
var config = require('./config.json');

exports.handler = function(event, context, callback){
    var alexa = Alexa.handler(event, context);
    alexa.appId = config.app_id;
    alexa.dynamoDBTableName = constants.dynamoDBTableName;
    alexa.registerHandlers(
        stateHandlers.startModeIntentHandlers,
        stateHandlers.playModeIntentHandlers,
        stateHandlers.remoteControllerHandlers,
        stateHandlers.resumeDecisionModeIntentHandlers,
        audioEventHandlers
    );
// //console.log(audioAssets.getAudioDataPromise()));
//     // Wait for audio data to load (errm blocking)
//     audioAssets.getAudioDataPromise().then(function (value) {
//         alexa.execute();
//     })
//     .catch(function (reason) {
//         // Erm how to handle the error?
//     });

    alexa.execute();
};
