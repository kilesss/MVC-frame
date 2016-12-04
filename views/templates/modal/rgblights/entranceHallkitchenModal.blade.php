
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="RGBentranceHallLight1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content btn" style="width: 100%">
          <div class="modal-header ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">RGB Entrance Hall Edit</h4>
          </div>
          <div class="modal-body">
     {{------------------------------------------}}
     <div class="row">
      <div class="col-md-6  btn" id="light11Main">
                     <div class="row" style="border-bottom: 1px solid silver; ">
                           Light 1 switch off after:
                     </div>
                     <div class="row">
                     	<div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
                             <img src="images/lightOff.gif" style="height: 90px;margin-left: -20px;">
                         </div>
                         <div class="col-md-8">
                            <div style="margin-top: 13%">
                                <select name="hours" class=" col-md-6 btnSelect">
                                    <option value="1">1 hour</option>
                                    <option value="2">2 hours</option>
                                    <option value="3">3 hours</option>
                                    <option value="4">4 hours</option>
                                    <option value="5">5 hours</option>
                                    <option value="6">6 hours</option>
                                </select>
                                <select name="minutes" class=" col-md-6 btnSelect">
                                    <option value="1">1 min</option>
                                    <option value="2">10 min</option>
                                    <option value="3">20 min</option>
                                    <option value="4">30 min</option>
                                    <option value="5">40 min</option>
                                    <option value="6">50 min</option>
                                </select>
                                <br>
                                <p>
                                    Time left : <i class="btnSelect" style=" padding-left: 13px; padding-right: 16px;">1:24</i>
                                </p>
                          </div>

                         	    {{--<input type="checkbox" id="lightsLivinglight1" onchange="switchLights('lightsLiving','light1')">--}}
                         		{{--<label><i></i></label>--}}
                         </div>
                     </div>
                                       <div class="row" style="border-top: 1px solid silver">
                                             <div class="switch demo3 col-md-6" style="    margin-left: 10%;">
                                                  <input type="checkbox" id="lightsLivinglight1" onchange="switchLights('lightsLiving','light1')">
                                                      <label><i></i></label>
                                             </div>
                                             <button   class="col-md-6 btnEditLights" type="button">
                                                                     Reset
                                                                 </button>

                                       </div>

      </div>
     {{--</div>--}}
     {{--<div class="row">--}}


      <div class="col-md-6  btn" id="light11Main">
                           <div class="row" style="border-bottom: 1px solid silver; ">
                                 Light 2 switch off after:
                           </div>
                           <div class="row">
                           	<div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
                                   <img src="images/lightOff.gif" style="height: 90px;margin-left: -20px;">
                               </div>
                               <div class="col-md-8">
                                  <div style="margin-top: 13%">
                                      <select name="hours" class=" col-md-6 btnSelect">
                                          <option value="1">1 hour</option>
                                          <option value="2">2 hours</option>
                                          <option value="3">3 hours</option>
                                          <option value="4">4 hours</option>
                                          <option value="5">5 hours</option>
                                          <option value="6">6 hours</option>
                                      </select>
                                      <select name="minutes" class=" col-md-6 btnSelect">
                                          <option value="1">1 min</option>
                                          <option value="2">10 min</option>
                                          <option value="3">20 min</option>
                                          <option value="4">30 min</option>
                                          <option value="5">40 min</option>
                                          <option value="6">50 min</option>
                                      </select>
                                      <br>
                                      <p>
                                          Time left : <i class="btnSelect" style=" padding-left: 13px; padding-right: 16px;">1:24</i>
                                      </p>
                                </div>

                               	    {{--<input type="checkbox" id="lightsLivinglight1" onchange="switchLights('lightsLiving','light1')">--}}
                               		{{--<label><i></i></label>--}}
                               </div>
                           </div>
                                  <div class="row" style="border-top: 1px solid silver">
                                        <div class="switch demo3 col-md-6" style="    margin-left: 10%;">
                                             <input type="checkbox" id="lightsLivinglight1" onchange="switchLights('lightsLiving','light1')">
                                                 <label><i></i></label>
                                        </div>
                                        <button   class="col-md-6 btnEditLights" type="button">
                                                                Reset
                                                            </button>

                                  </div>

      </div>
      </div>
      <div class="row">
      <div class="col-md-6  btn" id="light11Main">
                           <div class="row" style="border-bottom: 1px solid silver; ">
                                 Lights General switch off after:
                           </div>
                           <div class="row">
                           	<div class="col-md-4" id="light11image" style="border-right: 1px solid silver;">
                                   <img src="images/lightOff.gif" style="height: 90px;margin-left: -20px;">
                               </div>
                               <div class="col-md-8">
                                  <div style="margin-top: 13%">
                                      <select name="hours" class=" col-md-6 btnSelect">
                                          <option value="1">1 hour</option>
                                          <option value="2">2 hours</option>
                                          <option value="3">3 hours</option>
                                          <option value="4">4 hours</option>
                                          <option value="5">5 hours</option>
                                          <option value="6">6 hours</option>
                                      </select>
                                      <select name="minutes" class=" col-md-6 btnSelect">
                                          <option value="1">1 min</option>
                                          <option value="2">10 min</option>
                                          <option value="3">20 min</option>
                                          <option value="4">30 min</option>
                                          <option value="5">40 min</option>
                                          <option value="6">50 min</option>
                                      </select>
                                      <br>
                                      <p>
                                          Time left : <i class="btnSelect" style=" padding-left: 13px; padding-right: 16px;">1:24</i>
                                      </p>
                                </div>

                               	    {{--<input type="checkbox" id="lightsLivinglight1" onchange="switchLights('lightsLiving','light1')">--}}
                               		{{--<label><i></i></label>--}}
                               </div>
                           </div>
                           <div class="row" style="border-top: 1px solid silver">
                                 <div class="switch demo3 col-md-6" style="margin-left: 30%">
                                      <input type="checkbox" id="lightsLivinglight1" onchange="switchLights('lightsLiving','light1')">
                                          <label><i></i></label>
                                 </div>
                                 <button   class="col-md-4 btnEditLights" type="button">
                                                         Reset
                                                     </button>

                           </div>
            </div>

            <div class="col-md-6  btn" id="light11Main">


<p>Choice RGB color<br><hr>
<input class="jscolor col-md-12" onchange="update(this.jscolor)" value="cc66ff">
<br>
<p class="col-md-12" id="rect" style="border:1px solid gray;  height:100px;">

<script>
function update(jscolor) {
    // 'jscolor' instance can be used as a string
    alert(jscolor);
    document.getElementById('rect').style.backgroundColor = '#' + jscolor
}
</script>
          <br>


                        </div>
</div>
<div class="row">
{{--<button class="col-md-4"><button>--}}
<button class="col-md-4 btnEditLights">blinking color</button>
<button class="col-md-4 btnEditLights">Flash</button>
<button class="col-md-4 btnEditLights">changing colors quickly</button>
<button class="col-md-4 btnEditLights">changing colors medium</button>
<button class="col-md-4 btnEditLights">changing colors slowly</button>
<button class="col-md-4 btnEditLights">changing colors quickly</button>
<button class="col-md-4 btnEditLights">changing colors medium</button>
<button class="col-md-4 btnEditLights">changing colors slowly</button>
<button class="col-md-4 btnEditLights">RGB Flash</button>



</div>
     {{-----------------------------------------}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
  </div>
</div>

