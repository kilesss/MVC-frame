var lights = {
    livingLight1: 0,
    livingLight2: 0,
    livingRgb1: 0,
    livingRgb2: 0,
    tempLamp1Living:0,
    tempLamp2Living:0,
    tempLampRgb1Living:0,
    tempLampRgb2Living:0,
    tempLampGeneral1Living: 0,
    varRGBLightsGeneralLivingroom:0,
    varLightsGeneralLivingroom: 0,
    varLightsGeneralColorLivingroom:0,

    v2livingLight1: 0,
    v2livingLight2: 0,
    v2livingRgb1: 0,
    v2livingRgb2: 0,
    v2tempLamp1Living:0,
    v2tempLamp2Living:0,
    v2tempLampRgb1Living:0,
    v2tempLampRgb2Living:0,
    v2tempLampGeneral1Living: 0,
    v2varRGBLightsGeneralLivingroom:0,
    v2varLightsGeneralLivingroom: 0,
    v2varLightsGeneralColorLivingroom:0
};

function setAllLamps(id, variable){
//    'RGBLightsGeneralLivingroom', ''
    if(lights[variable] == 0) {
        lights[variable] = 1;
        changeColor(id, lights[variable])
    }else{
        lights[variable] = 0;
        changeColor(id, lights[variable])
    }
}

function changeColor(id,type){
    if (type == 1){
        document.getElementById(id).style.background = "greenyellow";

    }else{
        document.getElementById(id).style.background = "";
    }
}
function downtemp(id, variable){

    if(lights[variable] > 0) {
        lights[variable] = lights[variable] - 1;
        fillTempInput(id, lights[variable])
    }
}
function uptemp(id, variable){
        lights[variable] = lights[variable] + 1;
        fillTempInput(id, lights[variable]);
}
function fillTempInput(id, valu){
    document.getElementById(id).value = valu;

}
function FLivingRoomLights1(id,variable){
    lights['livingLight1'] = switchLamps(lights['livingLight1']);
    switchGeneral();
    console.log(lights['livingLight1']);
}
function FLivingRoomLights2(id,variable){
    lights['livingLight2'] = switchLamps(lights['livingLight2']);
    switchGeneral();
    console.log(lights['livingLight2']);

}
function FLivingRoomLightsRgb1(id,variable){
    lights['livingRgb1'] = switchLamps(lights['livingRgb1']);
    switchGeneral();
    LivingRgbGeneral();
    console.log(lights['livingRgb1']);

}
function FLivingRoomLightsRgb2(id,variable){
    LivingRgbGeneral();
    lights['livingRgb2'] = switchLamps(lights['livingRgb2']);
    switchGeneral();
    console.log(lights['livingRgb2']);
}
function LivingRgbGeneral(id,variable){
    var id = 'light11Rgbswitch';
    if(lights['livingRgb1'] == 1 || lights['livingRgb2'] == 1){
        document.getElementById(id).checked = true;
    }else {
        document.getElementById(id).checked = false;

    }
}
function switchLamps(id){
        if(id == 1){
            id = 0;
        } else {
            id = 1;
        }
    return id;
}
function switchGeneral(){
    var id = 'light11switch';
    if(lights['livingLight2'] == 1 || lights['livingLight1'] == 1 || lights['livingRgb1'] == 1 || lights['livingRgb2'] == 1){
        document.getElementById(id).checked = true;
    }else {
        document.getElementById(id).checked = false;

    }
}


$(function(){
    var $inlinehex = $('#inlinecolorhex h3 small');


    $('#inlinecolors').minicolors({
        inline: true,
        theme: 'bootstrap',
        change: function(hex) {
            if(!hex) return;
            document.getElementById( 'rgbColorKitchen' ).style.backgroundColor  = hex;
        }
    });
    $('#inlinecolors2').minicolors({
        inline: true,
        theme: 'bootstrap',
        change: function(hex) {
            if(!hex) return;
            document.getElementById( 'rgbColorKitchen2' ).style.backgroundColor  = hex;
        }
    });

    $('#inlinecolors221').minicolors({
        inline: true,
        theme: 'bootstrap',
        change: function(hex) {
            if(!hex) return;
            document.getElementById( 'rgbColorKitchen' ).style.backgroundColor  = hex;
        }
    });
    $('#inlinecolors222').minicolors({
        inline: true,
        theme: 'bootstrap',
        change: function(hex) {
            if(!hex) return;
            document.getElementById( 'rgbColorKitchen2' ).style.backgroundColor  = hex;
        }
    });

    $('#inlinecolorsEntranseHall1').minicolors({
        inline: true,
        theme: 'bootstrap',
        change: function(hex) {
            if(!hex) return;
            document.getElementById( 'rgbColor' ).style.backgroundColor  = hex;
        }
    });


    $('#inlinecolorsKitchen').minicolors({
        inline: true,
        theme: 'bootstrap',
        change: function(hex) {
            if(!hex) return;
            document.getElementById( 'rgbColor' ).style.backgroundColor  = hex;
        }
    });

    $('#inlinecolorsTerrace').minicolors({
        inline: true,
        theme: 'bootstrap',
        change: function(hex) {
            if(!hex) return;
            document.getElementById( 'rgbColor' ).style.backgroundColor  = hex;
        }
    });
});