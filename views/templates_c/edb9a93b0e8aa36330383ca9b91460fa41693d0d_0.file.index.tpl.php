<?php
/* Smarty version 3.1.30, created on 2016-12-04 19:22:13
  from "/opt/lampp/htdocs/frame/views/templates/web/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58445ed5533c52_76755938',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edb9a93b0e8aa36330383ca9b91460fa41693d0d' => 
    array (
      0 => '/opt/lampp/htdocs/frame/views/templates/web/index.tpl',
      1 => 1480500474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58445ed5533c52_76755938 (Smarty_Internal_Template $_smarty_tpl) {
?>

    <!DO0CTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Dark Admin</title>

    <link rel="stylesheet" type="text/css" href="views/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="views/css/style.css" />

    


<style>

.colpick {
  z-index: 9999;
}
</style>

    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/jquery-1.10.2.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/jscolor.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/thistle.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/minicolors.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/custom.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="views/js/custom2.js"><?php echo '</script'; ?>
>
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
   
   
   
   
   
   
</div>



<?php echo '<script'; ?>
>
    
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
    
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
