
    <div id="MenusVentilation" class="col-lg-11 btn" style="display: none; margin-top: -5%; width: 99%;">
           <div class="row" style="border-bottom: 1px solid silver;">
           <div class="col-md-11" >
                Ventilation Menus
           </div>
           <div class="col-md-1" style="float: right"  onclick="GeneralClose()">
               <p style="font-size: x-large; margin: 0px">
               X
               </p>
           </div>
           </div>
            <div class="col-md-2">
                @include('...menus.lights.lightsLivingRoom')
                <br>
                @include('...menus.lights.lightsKitchenRoom')
            </div>
            <div class="col-md-2" style="margin-left: 10px">
                @include('...menus.lights.lightsTerraceRoom')
                <br>
                @include('...menus.lights.lightsEntranceHallRoom')
            </div>
        </div>