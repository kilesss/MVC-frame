        <div class="row">
            <div class="col-md-12  btn rgblichtsBackground" id="light11Main">
                <div class="row" style="border-bottom: 1px solid silver; ">
                     RGB Lights Balcony 1
                </div>
                <div class="row">
                	<div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
                        <img src="images/lightOff.gif" style="height: 90px;margin-left: -20px;">
                    </div>
                    <div class="col-md-8">
                        <div class="switch demo3" >
                    	    <input type="checkbox" id="lightsBalconyRgb1" onchange="RGBswitchLights('lightsBalcony','Rgb1')">
                    		<label><i></i></label>
                    	</div>
                    </div>
                </div>
                    <div class="row" style=" margin-top: 10px; border-bottom: 1px solid silver;border-top: 5px solid silver; ">
                       RGB Lights Balcony room 2
                    </div>
                    <div class="row">
                    	<div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
                            <img src="images/lightOff.gif" style="height: 90px;margin-left: -20px;">
                        </div>
                        <div class="col-md-8">
                            <div class="switch demo3" >
                        	    <input type="checkbox" id="lightsBalconyRgb2" onchange="RGBswitchLights('lightsBalcony','Rgb2')">
                        		<label><i></i></label>
                        	</div>
                        </div>
                    </div>
                    <div class="row" style="border-top: 5px solid silver; margin-top: 10px">
                        <div class="col-md-6">
                            <div class="switch demo3"  style="height: 25px">
                                <input type="checkbox" id="RgbgenerallightsBalcony" onchange="RGBswitchLights('lightsBalcony','Rgbgeneral')">
                                    <label><i></i></label>
                            </div>
                        </div>
                        <button   class="col-md-6 btnEditLights" type="button" data-toggle="modal" data-target="#RGBTerraceLight1">
                            Edit
                        </button>
                    </div>
                         </div>

                    </div>
