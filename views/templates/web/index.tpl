
    <!DO0CTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Dark Admin</title>

    <link rel="stylesheet" type="text/css" href="views/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="views/css/style.css" />

    {*{{--<link rel="stylesheet" type="text/css" href="css/local.css" />--}}*}


<style>

.colpick {
  z-index: 9999;
}
</style>

    <script type="text/javascript" src="views/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="views/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="views/js/jscolor.js"></script>
    <script type="text/javascript" src="views/js/thistle.js"></script>
    <script type="text/javascript" src="views/js/minicolors.js"></script>
    <script type="text/javascript" src="views/js/custom.js"></script>
    <script type="text/javascript" src="views/js/custom2.js"></script>
</head>


<body>
<div class="row margin0" id="GeneralMenu">
    <div class="col-lg-2 btn"  onclick="GeneralMenuOpen('lights')">
    <div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
        <img src="views/images/generalMenu/lightOff.gif" style="height: 90px;margin-left: -20px;">
    </div>
    <p>
        Lights
    </p>
    </div>

    <div class="col-lg-2 btn" onclick="GeneralMenuOpen('heating')">
    <div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
        <img src="views/images/generalMenu/heating.png" style="height: 90px;margin-left: -20px;">
    </div>
    <p>
      Heating
    </p>
    </div>

    <div class="col-lg-2 btn" onclick="GeneralMenuOpen('ventilation')">
    <div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
        <img src="views/images/generalMenu/ventilation.png" style="height: 90px;margin-left: -20px;">
    </div>
    <p>
      Ventilation
    </p>
    </div>

    <div class="col-lg-2 btn" onclick="GeneralMenuOpen('notes')">
    <div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
        <img src="views/images/generalMenu/notes.png" style="height: 90px;margin-left: -20px;">
    </div>
    <p>
      Notes
    </p>
    </div>

    <div class="col-lg-2 btn" onclick="GeneralMenuOpen('audio')">
    <div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
        <img src="views/images/generalMenu/audio.png" style="height: 90px;margin-left: -20px;">
    </div>
    <p>
      Audio
    </p>
    </div>

    <div class="col-lg-2 btn" onclick="GeneralMenuOpen('cooking')">
    <div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
        <img src="views/images/generalMenu/cooking.png" style="height: 90px;margin-left: -20px;">
    </div>
    <p>
      Cooking
    </p>
    </div>
</div>
<div class="row" style="margin-top: 10px; margin-left: 10px">
   {*{include file='GeneralMenu/GeneralMenuLights.tpl'}*}
   {*{include file='GeneralMenu/GeneralMenuHeating.tpl'}'*}
   {*{include file='GeneralMenu/GeneralMenuVentilation.tpl'}*}
   {*{include file='GeneralMenu/GeneralMenuNotes.tpl'}'*}
   {*{include file='GeneralMenu/GeneralMenuAudio.tpl'}*}
   {*{include file='GeneralMenu/GeneralMenuCooking.tpl'}'*}
</div>
{*{include file='modals.tpl'}*}


<script>
    {literal}
var menus = {
lights:{switch0:0,menu:'MenusLights'},
heating:{switch0:0,menu:'MenusHeating'},
ventilation:{switch0:0,menu:'MenusVentilation'},
notes:{switch0:0,menu:'MenusNotes'},
audio:{switch0:0,menu:'MenusAudio'},
cooking:{switch0:0,menu:'MenusCooking'}
};

function GeneralMenuOpen(id){
switchMenus(id);
}

function GeneralClose(){
    for (var key in menus) {
        if (menus.hasOwnProperty(key)){
             var obj = menus[key];
              document.getElementById(menus[key]['menu']).style.display = "none";
        }
    }
}

function switchMenus(id){
if (id = 'audio'){

startAudio()
}
    for (var key in menus) {
        if (menus.hasOwnProperty(key)){
             var obj = menus[key];
            if (key == id ){
                    document.getElementById(menus[key]['menu']).style.display = "block";
           }else{
              document.getElementById(menus[key]['menu']).style.display = "none";
           }
        }
    }
}
    {/literal}
</script>
</body>
</html>
