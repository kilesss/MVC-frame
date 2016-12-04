<?php
/* Smarty version 3.1.30, created on 2016-11-30 20:56:14
  from "C:\xampp\htdocs\softHouse\views\templates\modals.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583f2ede82cdc8_84926799',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec28392c5f4a0ac0db65ba66e7167758a7447d1c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\softHouse\\views\\templates\\modals.tpl',
      1 => 1480535774,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583f2ede82cdc8_84926799 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="modal fade" id="lightsKitchen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content btn modalShadow">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="v2myModalLabel">Lights living room </h4>
      </div>
      <div class="modal-body">
          <div class="row">
                <div class="col-md-6" style="border-bottom: 1px solid silver; border-right: 1px solid silver; ">
                    <div class="row">
                        Light 1
                    </div>
                <div class="row">
                    <div class="switch demo3" id="v2light11switch" style="width: 137px;height: 33px;">
                        <input type="checkbox" onchange="FLivingRoomLights1()">
                        <label><i></i></label>
                    </div>
                </div>
                </div>
                <div class="col-md-6" style="border-bottom: 1px solid silver;">
                  <div class="row">
                      Light 2
                  </div>
                <div class="row">
                    <div class="switch demo3" id="v2light11switch" style="width: 137px;height: 33px;">
                        <input type="checkbox" onchange="FLivingRoomLights2()">
                        <label><i></i></label>
                    </div>
                </div>

                </div>
          </div>
          <div class="row">
                <div class="col-md-6">
                <br>
                    <div class="well btn" style="width: 103%">
                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                    <input type="text" id="v2inlinecolors221" class="form-control" data-inline="true" value="#4fc8db">
                    </div>
                    </div>
                    <div class="row">
                    <div id="v2inlinecolorhex" style="float: right" class="col-md-8">
                        <h3 style="float: right">Current selection: <small>#4fc8db</small></h3>
                    </div>
                    <div class="col-md-9" id="v2rgbColorKitchen" style="background-color: #4fc8db; float: right; margin-right: 12%">
                          <br>
                          <br>
                          <br>
                    </div>
                    </div>

                    </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="well btn" style="width: 103%">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="v2inlinecolors222" class="form-control" data-inline="true" value="#4fc8db">
                                </div>
                            </div>
                            <div class="row">
                            <div id="v2inlinecolorhex" style="float: right" class="col-md-8">
                                <h3 style="float: right">Current selection: <small>#4fc8db</small></h3>
                            </div>
                            <div class="col-md-9" id="v2rgbColorKitchen2" style="background-color: #4fc8db; float: right; margin-right: 12%">
                                  <br>
                                  <br>
                                  <br>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="row">
             <button   class="col-md-12 btnEditLights" id="v2LightsGeneralColorLivingroom" type="button" onclick="setAllLamps('v2LightsGeneralColorLivingroom', 'v2varLightsGeneralColorLivingroom')">
                 Set program from RGB light 1 to all</button>
          </div>
          <div class="row">
              <div class="col-md-6" style="border-bottom: 1px solid silver; border-top: 1px solid silver; border-right: 1px solid silver; ">
                 <div class="row">
                        RGB Light 1
                 </div>
                 <div class="row">
                     <div class="switch demo3" id="v2light11switch" style="width: 137px;height: 33px;">
                         <input type="checkbox" onchange="FLivingRoomLightsRgb1()">
                         <label><i></i></label>
                     </div>
                 </div>
              </div>
              <div class="col-md-6" style="border-bottom: 1px solid silver; border-top: 1px solid silver;">
                   <div class="row">
                      RGB Light 2
                   </div>
                   <div class="row">
                     <div class="switch demo3" id="v2light11switch" style="width: 137px;height: 33px;">
                         <input type="checkbox" onchange="FLivingRoomLightsRgb2()">
                         <label><i></i></label>
                     </div>
                   </div>
              </div>
           </div>
                <br>
          <div class="row">
            <div class="col-md-6" style="border-bottom: 1px solid silver; border-top: 1px solid silver;">
                              <div class="row">
                                 RGB General
                              </div>
                            <div class="row">
                                <div class="switch demo3"  style="width: 137px;height: 33px;">
                                    <input type="checkbox" id="v2light11Rgbswitch" onchange="LivingRgbGeneral()">
                                    <label><i></i></label>
                                </div>
                            </div>
                        </div>
                      <div class="col-md-6" style="border-bottom: 1px solid silver; border-top: 1px solid silver;">
                                        <div class="row">
                                           Time & Programs
                                        </div>
                                      <div class="row">
                                          <div class="switch demo3"  style="width: 137px;height: 33px;">

                                            <p data-toggle="modal" data-target="#lightsEntranseHallSetings2">
                                                 <img src="http://findicons.com/files/icons/1055/aqua_gloss/128/settings1.png" style="height: 101px; margin-top: -37px;">
                                             </p>
                                             </div>
                                      </div>
                                  </div>
                                </div>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="lightsEntranseHallSetings2" tabindex="-1" role="dialog" aria-labelledby="lightsEntranseHallSetings" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content btn modalShadow">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="v2myModalLabel">Lights living room </h4>
      </div>
      <div class="modal-body">
          <div class="row">
                <div class="col-md-6" style="border-bottom: 1px solid silver; border-right: 1px solid silver; ">
                    <div class="row">
                        Light 1
                    </div>
                <div class="row">
                <div class="col-md-8">
                <input type="text" id="v2inputLight1Living" class="col-md-9 btn" style=" margin-top: 26%; margin-left: 35%;">
                </div>
                <div class="col-md-4">
               <ul class="list-items">
                       <li  style=" margin-left: 16.9091%; margin-bottom: 1%;" onclick="uptemp('v2inputLight1Living' ,'v2tempLamp1Living')"><i class="arrow arrow-up">&nbsp;</i></li>
                       <br>
                       <li  onclick="downtemp('v2inputLight1Living' ,'v2tempLamp1Living')"><i class="arrow arrow-down">&nbsp;</i></li>
                   </ul>
                   </div>
                 </div>
                <div class="row">
               <small>Set time to switch off</small>
                 </div>
                </div>
                <div class="col-md-6" style="border-bottom: 1px solid silver;">
                  <div class="row">
                      Light 2
                  </div>
                <div class="row">
                       <div class="col-md-8">
                                 <input type="text" id="v2inputLight2Living" class="col-md-9 btn" style=" margin-top: 26%; margin-left: 35%;">
                                 </div>
                                 <div class="col-md-4">
                                <ul class="list-items">
                                        <li  style=" margin-left: 16.9091%; margin-bottom: 1%;" onclick="uptemp('v2inputLight2Living' ,'v2tempLamp2Living')"><i class="arrow arrow-up">&nbsp;</i></li>
                                        <br>
                                        <li  onclick="downtemp('v2inputLight2Living' ,'v2tempLamp2Living')"><i class="arrow arrow-down">&nbsp;</i></li>
                                    </ul>
                                    </div>
                                  </div>
                                 <div class="row">
                                <small>Set time to switch off</small>
                                  </div>
                                 </div>

                </div>
          </div>
          <div class="row">
                         <button   class="col-md-12 btnEditLights" id="v2LightsGeneralLivingroom" type="button" onclick="setAllLamps('v2LightsGeneralLivingroom', 'v2varLightsGeneralLivingroom')">
                                                       Set program from light 1 to all</button>
                    </div>

          <div class="row">
                <div class="col-md-6" style="border-bottom: 1px solid silver; border-right: 1px solid silver; ">
                    <input type="radio" class="btn" value="hakuna" name="hakuna"> Program1<br>
                    <input type="radio" class="btn" value="hakuna" name="hakuna"> Program2<br>
                    <input type="radio" class="btn" value="hakuna" name="hakuna"> Program3<br>
                    <input type="radio" class="btn" value="hakuna" name="hakuna"> Program4<br>
                                 <div class="row">
                                 <br>
                                <small>Set time to switch off</small>
                                  </div>

                </div>

                <div class="col-md-6" style="border-bottom: 1px solid silver; ">
                    <input type="radio" class="btn" value="hakuna" name="hakuna"> Program1<br>
                    <input type="radio" class="btn" value="hakuna" name="hakuna"> Program2<br>
                    <input type="radio" class="btn" value="hakuna" name="hakuna"> Program3<br>
                    <input type="radio" class="btn" value="hakuna" name="hakuna"> Program4<br>
                                                 <div class="row">
                                                <br>
                                                <small>Set time to switch off</small>
                                                  </div>

                </div>
          </div>

          <div class="row">
                <div class="col-md-6" style="border-bottom: 1px solid silver; border-right: 1px solid silver; ">
                                  <div class="row">
                                      Light RGB 1
                                  </div>
                              <div class="row">
                              <div class="col-md-8">
                              <input type="text" id="v2inputLightRgb1Living" class="col-md-9 btn" style=" margin-top: 26%; margin-left: 35%;">
                              </div>
                              <div class="col-md-4">
                             <ul class="list-items">
                                     <li  style=" margin-left: 16.9091%; margin-bottom: 1%;" onclick="uptemp('v2inputLightRgb1Living' ,'v2tempLampRgb1Living')"><i class="arrow arrow-up">&nbsp;</i></li>
                                     <br>
                                     <li  onclick="downtemp('v2inputLightRgb1Living' ,'v2tempLampRgb1Living')"><i class="arrow arrow-down">&nbsp;</i></li>
                                 </ul>
                                 </div>
                               </div>
                              <div class="row">
                             <small>Set time to switch off</small>
                               </div>
                              </div>
                              <div class="col-md-6" style="border-bottom: 1px solid silver;">
                                <div class="row">
                                    Light RGB 2
                                </div>
                              <div class="row">
                                     <div class="col-md-8">
                                               <input type="text" id="v2inputLightRgb2Living" class="col-md-9 btn" style=" margin-top: 26%; margin-left: 35%;">
                                               </div>
                                               <div class="col-md-4">
                                              <ul class="list-items">
                                                      <li  style=" margin-left: 16.9091%; margin-bottom: 1%;" onclick="uptemp('v2inputLightRgb2Living' ,'v2tempLampRgb2Living')"><i class="arrow arrow-up">&nbsp;</i></li>
                                                      <br>
                                                      <li onclick="downtemp('v2inputLightRgb2Living' ,'v2tempLampRgb2Living')"><i class="arrow arrow-down" >&nbsp;</i></li>
                                                  </ul>
                                                  </div>
                                                </div>
                                               <div class="row">
                                              <small>Set time to switch off</small>
                                                </div>
                                               </div>
                </div>

          <div class="row">
                         <button   class="col-md-12 btnEditLights" id="v2RGBLightsGeneralLivingroom" type="button" onclick="setAllLamps('v2RGBLightsGeneralLivingroom', 'v2varRGBLightsGeneralLivingroom')">
                                                       Set program from RGB light 1 to all</button>
                    </div>
                     <div class="row">
            <div class="col-md-12" >
                              <div class="row">
                                 RGB General
                              </div>
                            <div class="row">
                              <div class="col-md-8">
                                                            <input type="text" id="v2inputLightGeneral1Living" class="col-md-9 btn" style=" margin-top: 12%; margin-left: 35%;">
                                                            </div>
                                                            <div class="col-md-4">
                                                           <ul class="list-items">
                                                                   <li  style=" margin-left: 16.9091%; margin-bottom: 1%;" onclick="uptemp('v2inputLightGeneral1Living' ,'v2tempLampGeneral1Living')"><i class="arrow arrow-up">&nbsp;</i></li>
                                                                   <br>
                                                                   <li  onclick="downtemp('v2inputLightGeneral1Living' ,'v2tempLampGeneral1Living')"><i class="arrow arrow-down">&nbsp;</i></li>
                                                               </ul>
                                                               </div>
                                                             </div>
                                                            <div class="row">
                                                           <small>Set time to switch off</small>
                                                             </div>
             </div>
                        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>









<?php }
}
