'use strict';

var Alexa = require('alexa-sdk');
var request = require("request");
var constants = require('./constants');
var stateHandlers = require('./stateHandlers');
var audioEventHandlers = require('./audioEventHandlers');
var config = require('./config.json');
//var audioAssets = require('./audioAssets');


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

    // audioAssets.getAudioData('foo', function(data) {
    //     audioData = data;
    //     console.log(data);
    //     alexa.execute();
    // });

    alexa.execute();
};
