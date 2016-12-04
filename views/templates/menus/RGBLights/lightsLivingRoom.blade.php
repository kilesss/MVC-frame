        <div class="row">
            <div class="col-md-12  btn rgblichtsBackground" id="light11Main">
                <div class="row" style="border-bottom: 1px solid silver; ">
                     RGB Lights living room 1
                </div>
                <div class="row">
                	<div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
                        <img src="images/lightOff.gif" style="height: 90px;margin-left: -20px;">
                    </div>
                    <div class="col-md-8">
                        <div class="switch demo3" >
                    	    <input type="checkbox" id="lightsLivingRgb1" onchange="RGBswitchLights('lightsLiving','Rgb1')">
                    		<label><i></i></label>
                    	</div>
                    </div>
                </div>
                    <div class="row" style=" margin-top: 10px; border-bottom: 1px solid silver;border-top: 5px solid silver; ">
                       RGB Lights living room 2
                    </div>
                    <div class="row">
                    	<div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
                            <img src="images/lightOff.gif" style="height: 90px;margin-left: -20px;">
                        </div>
                        <div class="col-md-8">
                            <div class="switch demo3" >
                        	    <input type="checkbox" id="lightsLivingRgb2" onchange="RGBswitchLights('lightsLiving','Rgb2')">
                        		<label><i></i></label>
                        	</div>
                        </div>
                    </div>
                    <div class="row" style="border-top: 5px solid silver; margin-top: 10px">
                        <div class="col-md-6">
                            <div class="switch demo3"  style="height: 25px">
                                <input type="checkbox" id="RgbgenerallightsLiving" onchange="RGBswitchLights('lightsLiving','Rgbgeneral')">
                                    <label><i></i></label>
                             </div>
                        </div>
                {{--<div class="row" style="border-top: 1px solid silver">--}}
                                    <button   class="col-md-6 btnEditLights" type="button" data-toggle="modal" data-target="#RGBlivingRoomLight1">
                                        Edit
                                    </button>
                                </div>
                                    {{--</div>--}}
                         </div>

                    </div>
@include('modal.rgblights.livingRoomModal')
