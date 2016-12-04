<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<body>
{if isset($temp['success']) && $temp['success'] ==true}
    <div class="alert alert-success">
        <strong>Success!</strong> User is added successfully.
    </div>
{/if}
{if isset($temp['sameEmail']) && $temp['sameEmail'] ==true}
    <div class="alert alert-danger">
        <strong>Error!</strong> The email is exist.
    </div>
{/if}

{if !empty($temp['errors'])}

    {foreach from=$temp['errors'] item=err}
        <div class="alert alert-danger">
            <strong>Error!</strong> Please check {$err} field.
        </div>
    {/foreach}
{/if}


<div class="bd-example bd-example-padded-bottom text-center">
    <br>
    <br>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal" onclick="clearInputs()">
        Add user
    </button>
    <br>
    <br>
</div>
<div class="container text-center">

    <table data-toggle="table"
           data-classes="table table-hover table-condensed"
           data-row-style="rowColors"
           data-striped="true"
           {*data-sort-name="Quality"*}
           {*data-sort-order="desc"*}
           {*data-pagination="true"*}
           data-click-to-select="true"
            >
        <thead>
        <tr>
            <th class="col-xs-2" >Name <p style="float: right"><i class="fa fa-sort-desc" onclick="descSort(1)"></i>  <i class="fa fa-sort-asc" onclick="ascSort(1)"></i></p></th>
            <th class="col-xs-2" >Email   <p style="float: right"><i class="fa fa-sort-desc" onclick="descSort(2)"></i>  <i class="fa fa-sort-asc" onclick="ascSort(2)"></i></p></th>
            <th class="col-xs-2" >Phone   <p style="float: right"><i class="fa fa-sort-desc" onclick="descSort(3)"></i>  <i class="fa fa-sort-asc" onclick="ascSort(3)"></i></p></th>
            <th class="col-xs-2" >City   <p style="float: right"><i class="fa fa-sort-desc" onclick="descSort(4)"></i>  <i class="fa fa-sort-asc" onclick="ascSort(4)"></i></p></th>
            <th class="col-xs-4"  >Adress  <p style="float: right"><i class="fa fa-sort-desc" onclick="descSort(5)"></i>  <i class="fa fa-sort-asc" onclick="ascSort(5)"> </i></p></th>
            <th class="col-xs-2"  >Update </th>
            <th class="col-xs-2"  >Delete </th>
        </tr>
        </thead>
        <tbody id="tableUsers">

        {if !empty($temp['users'])}
            {foreach from=$temp['users'] item=user}
                <tr>
                    <td>{$user['username']}</td>
                    <td>{$user['email']}</td>
                    <td>{$user['phone']}</td>
                    <td>{$user['city']}</td>
                    <td>{$user['adress']}</td>
                    <td> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="updateUser({$user['id']})" data-target="#gridSystemModal">Update</button></td>
                    <td> <button type="button" class="btn btn-error btn-lg" onclick="deleteUser({$user['id']})">Delete</button></td>
                    </tr>
            {/foreach}
        {/if}
        <tr>
            <td></td>
            <td>Wheat</td>
            <td>Good</td>
            <td>200 Bags</td>
        </tr>

        <tr>
            <td></td>
            <td>Rice</td>
            <td>Good</td>
            <td>100 Bags</td>
        </tr>

        </tbody>
    </table>
    <br>
    {if isset($temp['pages']) && $temp['pages'] > 1}

        <nav aria-label="Page navigation">
            <ul class="pagination">
                {for $page=1 to $temp['pages']}
                        <li class="page-item"><a class="page-link" onclick="listPage({$page})">{$page}</a></li>
                {/for}

            </ul>
        </nav>
    {/if}
</div>


<div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <form method="get" action="home">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridModalLabel">Add user</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input type="text" class="form-control" name="usr" id="usr" required="required">
                <small>This field is required</small>

            </div>
            <div class="form-group">
                <label for="usr">Email:</label>
                <input type="text" class="form-control" name="email" id="email" required="required">
                <small>This field is required</small>
            </div>
            <div class="form-group">
                <label for="usr">Phone:</label>
                <input type="text" class="form-control" name="phone" id="phone">
            </div>
            <div class="form-group">
                <label for="usr">City:</label>
                <input type="text" class="form-control" name="city" id="city">
            </div>
            <div class="form-group">
                <label for="usr">Address:</label>
                <input type="text" class="form-control" name="address" id="address">
            </div>
            <input type="hidden" name="update" id="update">
            <input type="hidden" name="id" id="id">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>
        </form>
</div>
<script>
    var page = 1;
    var sort;
    var sortBy = '';
    function listPage(id) {
        console.log(sort);
        console.log(sortBy);
        page = id;
        if (sort ==1){
            ascSort(sortBy);
        }else if(sort == 2){
            descSort(sortBy);
        }else {
            var arrToSend = {};
            arrToSend["id"] = id;
            jQuery.ajax({
                url: 'pageUsers',
                type: 'GET',
                assync: false,
                dataType: 'json',
                data: arrToSend,
                success: function (data) {
                    var text = '';
                    for (var key in data) {
                        if (data.hasOwnProperty(key)) {
                            text = text + ' <tr>' +
                            '<td>' + data[key]['username'] + '</td>' +
                            '<td>' + data[key]['email'] + '</td>' +
                            '<td>' + data[key]['phone'] + '</td>' +
                            '<td>' + data[key]['city'] + '</td>' +
                            '<td>' + data[key]['adress'] + '</td>' +
                            '<td> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="updateUser(' + data[key]['id'] + ')" data-target="#gridSystemModal">Update</button></td>' +
                            '<td> <button type="button" class="btn btn-error btn-lg" onclick="deleteUser(' + data[key]['id'] + ')">Delete</button></td>' +
                            '</tr>';
                        }
                    }
                    removeAllRows();
                    fillNewRows(text);
                }
            });
        }
    }
    function descSort(id){
        sort = 2;
        sortBy = id;
        var arrToSend = {};
        arrToSend["id"] = id;
        arrToSend["sort"] = 2;
        arrToSend["page"] = page;
        jQuery.ajax({
            url: 'sortUsers',
            type: 'GET',
            assync: false,
            dataType: 'json',
            data: arrToSend,
            success: function (data) {
                var text = '';
                for (var key in data) {
                    if (data.hasOwnProperty(key)) {
                        text = text + ' <tr>'+
                        '<td>'+data[key]['username']+'</td>'+
                        '<td>'+data[key]['email']+'</td>'+
                        '<td>'+data[key]['phone']+'</td>'+
                        '<td>'+data[key]['city']+'</td>'+
                        '<td>'+data[key]['adress']+'</td>'+
                        '<td> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="updateUser('+data[key]['id']+')" data-target="#gridSystemModal">Update</button></td>'+
                        '<td> <button type="button" class="btn btn-error btn-lg" onclick="deleteUser('+data[key]['id']+')">Delete</button></td>'+
                        '</tr>';
                    }
                }
                removeAllRows();
                fillNewRows(text);
            }
        });
    }
    function ascSort(id){
        sortBy = id;
        sort = 1;
        var arrToSend = {};
        arrToSend["id"] = sortBy;
        arrToSend["sort"] = 1;
        arrToSend["page"] = page;

        jQuery.ajax({
            url: 'sortUsers',
            type: 'GET',
            assync: false,
            dataType: 'json',
            data: arrToSend,
            success: function (data) {
                var text = '';
                for (var key in data) {
                    if (data.hasOwnProperty(key)) {
                        text = text + ' <tr>'+
                        '<td>'+data[key]['username']+'</td>'+
                        '<td>'+data[key]['email']+'</td>'+
                        '<td>'+data[key]['phone']+'</td>'+
                        '<td>'+data[key]['city']+'</td>'+
                        '<td>'+data[key]['adress']+'</td>'+
                        '<td> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" onclick="updateUser('+data[key]['id']+')" data-target="#gridSystemModal">Update</button></td>'+
                        '<td> <button type="button" class="btn btn-error btn-lg" onclick="deleteUser('+data[key]['id']+')">Delete</button></td>'+
                        '</tr>';
                    }
                }
                removeAllRows();
                fillNewRows(text);
            }
        });

    }


    function fillNewRows(text){
        var myNode = document.getElementById("tableUsers");
        myNode.innerHTML = text;
    }
    function removeAllRows(){
        var myNode = document.getElementById("tableUsers");
        while (myNode.firstChild) {
            myNode.removeChild(myNode.firstChild);
        }
    }
  function deleteUser(id){
      var arrToSend = {};
      arrToSend["id"] = id;

      jQuery.ajax({
          url: 'deleteUser',
          type: 'GET',
          assync: false,
          dataType: 'json',
          data: arrToSend,
          success: function (data) {
            location.reload();
          }
      });
  }



  function updateUser(id){
      var arrToSend = {};
      arrToSend["id"] = id;

      jQuery.ajax({
          url: 'getUserInfo',
          type: 'GET',
          assync: false,
          dataType: 'json',
          data: arrToSend,
          success: function (data) {
              document.getElementById("usr").value = data['username'];
              document.getElementById("email").value = data['email'];
              document.getElementById("phone").value = parseInt(data['phone']);
              document.getElementById("city").value = data['city'];
              document.getElementById("address").value = data['adress'];
              document.getElementById("update").value = 1;
              document.getElementById("id").value = id;
          }
      });
  }
function clearInputs(){
    document.getElementById("usr").value = '';
    document.getElementById("email").value = '';
    document.getElementById("phone").value = '';
    document.getElementById("city").value = '';
    document.getElementById("address").value = '';
    document.getElementById("update").value = '';
    document.getElementById("id").value = '';
}

    function queryParams() {
        return {
            type: 'owner',
            sort: 'updated',
            direction: 'desc',
            per_page: 100,
            page: 1
        };
    }
    function rowColors(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];

        if (index % 2 === 0 && index / 2 < classes.length) {
            return {
                classes: classes[index / 2]
            };
        }
        return {};
    }
</script>

</body>
</html>

