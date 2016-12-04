 <div id="MenusLights" class="col-lg-12 btn" style="display: none;margin-top: -5%; width: 99%;">

       <div class="row" style="border-bottom: 1px solid silver;">
       <div class="col-md-11" >
            Lights Menus
       </div>
       <div class="col-md-1" style="float: right"  onclick="GeneralClose()">
           <p style="font-size: x-large; margin: 0px">
           X
           </p>
       </div>
       </div>
       <br>
        <div class="col-md-2"  style="margin-left: 20px; width: 18%">
            @include('...menus.lights.lightsLivingRoom')
                <hr>
            @include('...menus.RGBLights.lightsLivingRoom')
        </div>

        <div class="col-md-2"  style="margin-left: 20px; width: 18%">
            @include('...menus/lights/lightsKitchenRoom')
                             <hr>

            @include('...menus.RGBLights.lightsKitchenRoom')
        </div>

        <div class="col-md-2" style="margin-left: 20px; width: 18%">
            @include('...menus.lights.lightsTerraceRoom')
                                       <hr>

             @include('...menus.RGBLights.lightsTerraceRoom')
        </div>

        <div class="col-md-2"  style="margin-left: 20px; width: 18%">
              @include('...menus.lights.lightsEntranceHallRoom')
                                     <hr>

              @include('...menus.RGBLights.lightsEntranceHallRoom')
        </div>
    </div>
