
 {*{{--<link rel="stylesheet" type="text/css" href="css/audio/demo.css" />--}}*}
 <link rel="stylesheet" type="text/css" href="css/audio/style.css" />

 <script type="text/javascript" src="js/audio/jquery.jplayer.js"></script>
 <script type="text/javascript" src="js/audio/myplaylist.js"></script>
 <script type="text/javascript" src="js/audio/ttw-music-player.js"></script>
 {*{{--<script type="text/javascript" src="js/audio/jquery-1.6.1.min.js"></script>--}}*}
{literal}
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
 {/literal}

    {*{{--<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>--}}*}
    {*{{--<script type="text/javascript" src="../plugin/jquery-jplayer/jquery.jplayer.js"></script>--}}*}
    {*{{--<script type="text/javascript" src="../plugin/ttw-music-player-min.js"></script>--}}*}
    {*{{--<script type="text/javascript" src="js/myplaylist.js"></script>--}}*}



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
 {literal}

            <script type="text/javascript">
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
            </script>
 {/literal}
