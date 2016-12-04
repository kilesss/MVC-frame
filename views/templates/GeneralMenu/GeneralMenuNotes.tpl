<style>
table, th, td {
   border: 1px solid silver;
}

</style>
    <div id="MenusNotes" class="col-lg-11 btn" style="display: none;margin-top: -5%; width: 99%;">
       <div class="row" style="border-bottom: 1px solid silver;">
       <div class="col-md-11" >
            Notes Menus
       </div>
       <div class="col-md-1" style="float: right"  onclick="GeneralClose()">
           <p style="font-size: x-large; margin: 0px">
           X
           </p>
       </div>
       </div>
        <div class="row" style="height: 50em">
            <div class="row">
            <button class="col-md-3 btnEditLights"style="float: right;     margin-right: 2%;background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);">
                Edit
            </button>
            </div>
            <br>            <br>            <br>
            <div class="row" style="margin: 0;  margin-left: 1%;">
                <table class="col-md-11">
                <thead>
                <td>Title</td>
                <td>Notification time</td>
                <td>Edit</td>
                <td>Delete </td>
                </thead>
                <tbody>
            <tr>
                <td class="col-md-6">Title Notes
                    <div id="title1"></div>
                </td>
                <td>25:11:2016 14:443
                <div id="notification1"></div>
                </td>
                <td>
                <div id="edit1">
                </div>
                </td>
                <td><button class="col-md-6 btnEditLights"style="float: right;     margin-right: 2%;background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);">
                                    delete
                                </button> </td>
            </tr>


</tr>
<script>
var notification = '                 <div class="row "  style=" margin-top: 2%; margin-bottom: 2%; ">'
+'                                                            <input class="btn col-md-6" style=" margin-left: 5%;">'
+'                                                             <button class="col-md-2 btnEditLights" style="  margin-top: 0%;">  Save    </button>'
+'                                                         </div>'
+'                                     <div class="row"  style=" margin-top: 2%; margin-bottom: 2%; ">'
+'                                                             <button class="col-md-3 btnEditLights" style="  margin-left: 5%; margin-top: 0%;">By Sms    </button>'
+'                                                             <button class="col-md-3 btnEditLights" style="  margin-top: 0%;">By Email    </button>'
+'                                                             <button class="col-md-3 btnEditLights" style="  margin-top: 0%;">Just alarm  </button>'
+'                                                         </div>';

var title = '                    <div class="row"  style=" margin-top: 2%; margin-bottom: 2%; ">'
+'                                     <input class="btn col-md-8">'
+'                                      <button class="col-md-4 btnEditLights" style="  margin-top: 0%;">  Save    </button>'
+'                                  </div> ';
var btnSave = ' <button class="col-md-6 btnEditLights" onclick="saveNotes(1)" style="float: right;     margin-right: 2%;background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);">Save </button>';
var btnEdit = ' <button class="col-md-6 btnEditLights" onclick="EditNotes(1)" style="float: right;     margin-right: 2%;background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);"> Edit </button>'
function EditNotes(id){
    div = document.getElementById( 'title'+id );
    div.insertAdjacentHTML( 'beforeend', title );

    div = document.getElementById( 'notification'+id );
    div.insertAdjacentHTML( 'beforeend', notification );

    div = document.getElementById( 'edit'+id );
div.insertAdjacentHTML( 'beforeend', btnSave );
}
function saveNotes(id){
    div = document.getElementById( 'edit'+id );
    div.insertAdjacentHTML( 'beforeend', btnEdit );

}
$( document ).ready(function() {
   saveNotes(1);
});

</script>

   <tr>
                   <td class="col-md-6">Title Notes</td>
                   <td>25:11:2016 14:443</td>
                   <td><button class="col-md-6 btnEditLights"style="float: right;     margin-right: 2%;background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);">
                                       Edit
                                   </button></td>
                   <td><button class="col-md-6 btnEditLights"style="float: right;     margin-right: 2%;background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);background-image: linear-gradient(to bottom, rgba(255,255,255,.15), #1fa006);">
                                       delete
                                   </button> </td>
      </tr>

                </tbody>
                </table>
            </div>
        </div>
    </div>