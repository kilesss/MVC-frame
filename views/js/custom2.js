var lights = {
    lightsLiving:{
        light1:0,
        light2:0,
        Rgb1:0,
        Rgb2:0,
        general:0,
        Rgbgeneral:0
    },
    lightsKitchen : {
        light1:0,
        light2:0,
        Rgb1:0,
        Rgb2:0,
        general:0,
        Rgbgeneral:0
    },
    lightsEntrance : {
        light1:0,
        light2:0,
        Rgb1:0,
        Rgb2:0,
        general:0,
        Rgbgeneral:0
    },
    lightsBalcony : {
        light1:0,
        light2:0,
        Rgb1:0,
        Rgb2:0,
        general:0,
        Rgbgeneral:0
    }
};
//rgblichtsBackground


function switchLights(room, lamp){
    if (lamp != 'general' ) {
        console.log(lamp);
        if (lights[room][lamp] == 0) {
            lights[room][lamp] = 1;
            document.getElementById(room + lamp).checked = true;
        } else {
            lights[room][lamp] = 0;
            document.getElementById(room + lamp).checked = false;
        }
        if (lights[room]['light1'] == 0 && lights[room]['light2'] == 0) {
            document.getElementById('general' + room).checked = false;
            lights[room]['general'] = 0;
        } else {
            document.getElementById('general' + room).checked = true;
            lights[room]['general'] = 1;
        }
    }else {
        if (lights[room]['general'] == 0){
            document.getElementById(room+'light1').checked = true;
            lights[room]['light1'] = 1;
            document.getElementById(room+'light2').checked = true;
            lights[room]['light2'] = 1;
            lights[room]['general'] = 1;
        }else{
            document.getElementById(room+'light1').checked = false;
            lights[room]['light1'] = 0;
            document.getElementById(room+'light2').checked = false;
            lights[room]['light2'] = 0;
            lights[room]['general'] = 0;
        }
    }
}

function RGBswitchLights(room, lamp){
    if (lamp != 'Rgbgeneral' ) {
        console.log(lamp);
        if (lights[room][lamp] == 0) {
            lights[room][lamp] = 1;
            document.getElementById(room + lamp).checked = true;
        } else {
            lights[room][lamp] = 0;
            document.getElementById(room + lamp).checked = false;
        }
        if (lights[room]['Rgb1'] == 0 && lights[room]['Rgb2'] == 0) {
            document.getElementById('Rgbgeneral' + room).checked = false;
            lights[room]['Rgbgeneral'] = 0;
        } else {
            document.getElementById('Rgbgeneral' + room).checked = true;
            lights[room]['Rgbgeneral'] = 1;
        }
    }else {
        if (lights[room]['Rgbgeneral'] == 0){
            document.getElementById(room+'Rgb1').checked = true;
            lights[room]['light1'] = 1;
            document.getElementById(room+'Rgb2').checked = true;
            lights[room]['Rgb2'] = 1;
            lights[room]['Rgbgeneral'] = 1;
        }else{
            document.getElementById(room+'Rgb1').checked = false;
            lights[room]['Rgb1'] = 0;
            document.getElementById(room+'Rgb2').checked = false;
            lights[room]['Rgb2'] = 0;
            lights[room]['Rgbgeneral'] = 0;
        }
    }
}


//if(lights['livingLight2'] == 1 || lights['livingLight1'] == 1 || lights['livingRgb1'] == 1 || lights['livingRgb2'] == 1){
//
//}else {
//    document.getElementById(id).checked = false;
//
//}
