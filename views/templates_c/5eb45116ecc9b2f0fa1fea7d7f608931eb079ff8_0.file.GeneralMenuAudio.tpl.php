<?php
/* Smarty version 3.1.30, created on 2016-11-30 20:55:29
  from "C:\xampp\htdocs\softHouse\views\templates\GeneralMenu\GeneralMenuAudio.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583f2eb1511761_34669058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5eb45116ecc9b2f0fa1fea7d7f608931eb079ff8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\softHouse\\views\\templates\\GeneralMenu\\GeneralMenuAudio.tpl',
      1 => 1480535725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583f2eb1511761_34669058 (Smarty_Internal_Template $_smarty_tpl) {
?>

 
 <link rel="stylesheet" type="text/css" href="css/audio/style.css" />

 <?php echo '<script'; ?>
 type="text/javascript" src="js/audio/jquery.jplayer.js"><?php echo '</script'; ?>
>
 <?php echo '<script'; ?>
 type="text/javascript" src="js/audio/myplaylist.js"><?php echo '</script'; ?>
>
 <?php echo '<script'; ?>
 type="text/javascript" src="js/audio/ttw-music-player.js"><?php echo '</script'; ?>
>
 

 <style>
	.listSong {
		background: #000000;
		background-image: -webkit-linear-gradient(top, #e6e6e6, #e6e6e6);
		background-image: -moz-linear-gradient(top, #e6e6e6, #e6e6e6);
		background-image: -ms-linear-gradient(top, #e6e6e6, #e6e6e6);
		background-image: -o-linear-gradient(top, #000000, #e6e6e6);
		background-image: linear-gradient(to bottom, #000000, #e6e6e6);
		-webkit-border-radius: 60;
		-moz-border-radius: 60;
		border-radius: 60px;
		text-shadow: 1px 1px 3px #ffffff;
		font-family: Arial;
		color: #25ff19;
		font-size: 20px;
		padding: 10px 20px 10px 20px;
		text-decoration: none;
	}
p{

margin: 0px;
    color: #88bdc5;
}
.listAudio{
  margin-top: 3%;
    border: silver 1px solid;


}
</style>
 

    
    
    
    



    <div id="MenusAudio" class="col-lg-11 btn" style="display: none;margin-top: -5%; width: 99%;">
           <div class="row" style="border-bottom: 1px solid silver;">
           <div class="col-md-11" >
                Audio Menus
           </div>
           <div class="col-md-1" style="float: right" onclick="GeneralClose()">
               <p style="font-size: x-large; margin: 0px">
               X
               </p>
           </div>
           </div>
            <div id="audioPlayer" class="col-md-3">
                       </div>
            <div  class="col-md-3 listAudio">
            <h4 style=" border-bottom: 1px silver solid;">Folders:</h4>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
                    </div>
            <div  class="col-md-3 listAudio">
            <h4 style=" border-bottom: 1px silver solid;">Songs:</h4>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
            <p>aaaaaaa</p>
                    </div>



        </div>
 

            <?php echo '<script'; ?>
 type="text/javascript">
                function startAudio(){
                    var description = '';

                    $('#audioPlayer').ttwMusicPlayer(myPlaylist, {
                        autoPlay:false,
                        description:description,
                        jPlayer:{
                            swfPath:'../plugin/jquery-jplayer' //You need to override the default swf path any time the directory structure changes
                        }
                    });
                }
            <?php echo '</script'; ?>
>
 
<?php }
}
