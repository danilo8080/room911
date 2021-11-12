@extends('plantilla')
@section('info')

    <!-- Modal add employed-->
    <div class="modal fade" id="addEmployedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add employed</h5>
                    <button type="button" class="btn-close close_employed" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="saveform_errorList"></ul>
                    <div class="form-group">
                        <label for="">Employed ID</label>
                        <input type="text" class="employedId form-control">
                    </div>
        
                    <div class="form-group">
                        <label for="">Department</label>
                        <select class="department form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="production">Production</option>
                            <option value="Human Resource Management">Human Resource Management</option>
                            <option value="Research and Development">Research and Development</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Last name</label>
                        <input type="text" class="lastName form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Middle name</label>
                        <input type="text" class="middleName form-control">
                    </div>
                    <div class="form-group">
                        <label for="">First name</label>
                        <input type="text" class="firstName form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Access</label>
                        <select class="access form-select" aria-label="Default select example">
                            <option selected>access</option>
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_employed" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_employed">Save </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal add employed end-->

<!-- Modal edit employed-->
<div class="modal fade" id="editEmployedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit employed</h5>
                <button type="button" class="btn-close close_employed" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="updateform_errorList"></ul>

                <div class="form-group">
                    <input type="hidden" id="editEmployedId" class="employedId form-control">
                </div>
                <div class="form-group">
                    <label for="">Department</label>
                    <select class="form-select" aria-label="Default select example" id="editDepartment">
                        <option selected>Open this select menu</option>
                        <option value="production">Production</option>
                        <option value="Human Resource Management">Human Resource Management</option>
                        <option value="Research and Development">Research and Development</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Last name</label>
                    <input type="text" id="editLastName" class="lastName form-control">
                </div>
                <div class="form-group">
                    <label for="">Middle name</label>
                    <input type="text" id="editMiddleName" class="middleName form-control">
                </div>
                <div class="form-group">
                    <label for="">First name</label>
                    <input type="text" id="editFirstName" class="firstName form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_employed" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_employed">Update </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit employed end-->


<!-- Modal delete employed-->
<div class="modal fade" id="deleteEmployedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete employed</h5>
                <button type="button" class="btn-close close_employed" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="updateform_errorList"></ul>

                <input type="hidden" id="deleteEmployedId" class="employedId form-control">

                <h4>Are you sure ? want to delete this data ? </h4>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_employed" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_employed_confirm">Yes delete </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal delete employed end-->

<!-- Modal access employed-->
<div class="modal fade" id="accessEmployedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Access employed</h5>
                <button type="button" class="btn-close close_employed" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="updateform_errorList"></ul>

                <input type="hidden" id="accessEmployedId" class="employedId form-control">

                <h4 id="textAccess"></h4>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_employed" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary access_employed_confirm">Yes confirm </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal access employed end-->

<!-- Modal record employed-->
<div class="modal fade" id="recordEmployedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Record employed</h5>
                <button type="button" class="btn-close close_employed" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="hidden" id="recordEmployedId" class="employedId form-control">
            <div class="modal-body">
                <h4 class="fullName"></h4>
                <br>
                <form action="{{route('employed.download')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="recordEmployedId" class="employedId form-control" name="id">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="">From: </label>
                                <input type="date" class="start" name="start">
                            </div>
                            <div class="form-group">
                                <label for="">To: </label>
                                <input type="date" class="end" name="end">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-danger" style="float: right; margin: 2px"><i class="far fa-file-pdf"></i></button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered" id="employedsTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Hour</th>
                                <th>Access</th>
                            </tr>
                        </thead>
                        <tbody class="tbodyRecord">
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_employed" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal record employed end-->


<!-- Modal import employed-->
<div class="modal fade" id="importEmployedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import employeds</h5>
                <button type="button" class="btn-close close_employed" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="hidden" id="recordEmployedId" class="employedId form-control">
            <div class="modal-body">
                <form action="{{route('employed.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file">

                    <button class="send"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="save btn btn-success">Save <i class="far fa-save"></i></button>
                <button type="button" class="btn btn-secondary close_employed" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal import employed end-->




<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" ALIGN="center">Access Control ROOM_911 </h6>
            <br>
            
        </div>

        <div class="card-body">
            <div id="success_message"></div>
            <div class="row">
                <div class="col-md-2">
                    <p>Search by employed ID: </p>
                    <input type="text" name="employedId" id="searchID" class="searchID form-control form-control-mb3" placeholder="ID">
                </div>
                <div class="col-md-2">
                    <p>Search by department: </p>
                    <select class="searchDepartment form-select" aria-label="Default select example" id="searchDepartment">
                        <option value="" selected>All</option>
                        <option value="production">Production</option>
                        <option value="Human Resource Management">Human Resource Management</option>
                        <option value="Research and Development">Research and Development</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <p>Search by name: </p>
                    <input type="text" name="name" value=" " class="searchName form-control form-control-mb3" placeholder="Name" id="searchName">
                </div>
                <div class="col-md-2">
                    <p>Search by last name: </p>
                    <input type="text" name="lastName" value=" " class="searchLastName form-control form-control-mb3" placeholder="Last name" id="searchLastName">
                </div>
                <div class="col-md-4">
                    <br>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#importEmployedModal" style="float: right; margin: 2px" class="btn btn-success">Import <i class="fas fa-file-upload"></i> </a>
                    
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addEmployedModal" style="float: right; margin: 2px" class="btn btn-success"> ADD <i class="fas fa-user-plus"></i> </a>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="employedsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Employed ID</th>
                            <th>Department</th>
                            <th>Last name</th>
                            <th>Middle name</th>
                            <th>First name</th>
                            <th>Last access</th>
                            <th>Total access</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tbodyEmployed">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@endsection

@section('scripts')
<script>
    $(document).ready(function (){

        fetchemployed();

        function fetchemployed()
        {
            var data = {
                'searchID': $('#searchID').val(),
                'searchDepartment': $('#searchDepartment').val(),
                'searchName': $('#searchName').val(),
                'searchLastName': $('#searchLastName').val(),
            }
            $.ajax({
                type: "GET",
                url: "{{route('employed.load')}}",
                data: data,
                dataType: "json",
                success: function(response){
                    console.log(response.employeds);

                    $('.tbodyEmployed').html("");
                    $.each(response.employeds, function(key, item){
                        
                        var accessButton = "";
                        if(item.access){
                            accessButton = '<button type="button" value="'+item.employedID+'-'+item.access+'" class="access_employed btn btn-success">Enabled <i class="fas fa-user"></i></button>';
                        }else{
                            accessButton = '<button type="button" value="'+item.employedID+'-'+item.access+'" class="access_employed btn btn-danger">Disabled <i class="fas fa-user-alt-slash"></i></button>';
                        }
                        $('.tbodyEmployed').append('<tr>\
                            <td>'+item.employedID+'</td>\
                            <td>'+item.department+'</td>\
                            <td>'+item.lastName+'</td>\
                            <td>'+item.middleName+'</td>\
                            <td>'+item.firstName+'</td>\
                            <td>'+item.lastAccess+'</td>\
                            <td>'+item.totalAccess+'</td>\
                            <td><button type="button" value="'+item.employedID+'" class="edit_employed btn btn-primary"><i class="fas fa-edit"></i></button> <button type="button" value="'+item.employedID+'" class="delete_employed btn btn-danger"><i class="fas fa-trash-alt"></i></button> <button type="button" value="'+item.employedID+'" class="record_employed btn btn-warning"><i class="far fa-clipboard"></i></button> '+accessButton+' </td>\
                        </tr>'
                        );

                    });
                }

            });
        }

        $('.send').hide();
        $(document).on('click','.save', function (e) {
            e.preventDefault();
            $('.send').click();
            $('#importEmployedModal').modal('hide');
        });

        $(document).on('change', '.searchID', function () {
            fetchemployed();
        });

        $(document).on('change', '.searchName', function () {
            fetchemployed();
        });

        $(document).on('change', '.searchLastName', function () {
            fetchemployed();
        });
        $(document).on('change', '.searchDepartment', function () {
            fetchemployed();
        });


        $(document).on('click','.record_employed', function (e) {
            e.preventDefault();
            var empl_id = $(this).val();
            //$('#recordEmployedId').val(empl_id);
            $('.employedId').val(empl_id);
            fetchemployedRecord();
            $('#recordEmployedModal').modal('show');
        });




        function fetchemployedRecord()
        {
            var data = {
                'start': $('.start').val(),
                'end': $('.end').val(),
                'empl_id': $('#recordEmployedId').val(),
            }
            $.ajax({
                type: "GET",
                url: "{{route('employed.record')}}",
                data: data,
                dataType: "json",
                success: function(response){
                    $('.tbodyRecord').html("");
                    if(response.status == 404){
                        $('.fullName').text(response.employed.firstName+" "+response.employed.middleName+" "+response.employed.lastName);
                        $('.tbodyRecord').append('<tr>\
                                <td colspan="2">The employed has no records</td>\
                                </tr>'
                            );
                    }else{
                        $('.fullName').text(response.employed[0].firstName+" "+response.employed[0].middleName+" "+response.employed[0].lastName);
                        $.each(response.employed, function(key, item){
                            if(item.access){
                                var access = 'success';
                            }else{
                                var access = 'denied';
                            }
                            $('.tbodyRecord').append('<tr>\
                                <td>'+item.date+'</td>\
                                <td>'+item.hour+'</td>\
                                <td>'+access+'</td>\
                                </tr>'
                            );

                        });
                        
                    }
                }

            });
        }

        function download()
        {
            var data = {
                'start': $('.start').val(),
                'end': $('.end').val(),
                'empl_id': $('#recordEmployedId').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "GET",
                url: "{{route('employed.download')}}",
                data: data,
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(response){
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "Sample.pdf";
                    link.click();
                }
            });
        }

        $(document).on('click','.download', function (e) {
            e.preventDefault();
            download()
        });

        $(document).on('change','.start', function () {
            fetchemployedRecord()
        });

        $(document).on('change','.end', function () {
            fetchemployedRecord()
        });


        $(document).on('click', '.access_employed', function (e) {
            e.preventDefault();

            var text = "";
            var info = $(this).val();
            var arrayInfo = info.split('-');
            var access = arrayInfo[1];
            var id = arrayInfo[0];
            
            $('#accessEmployedId').val(id);

            if(access == 1){
                text = "Are you sure? do you want to take away access?"
            }
            else{
                text = "Are you sure? do you want to give it access?"
            }

            $('#textAccess').text(text);
            $('#accessEmployedModal').modal('show');


        });


        $(document).on('click', '.access_employed_confirm', function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $('#accessEmployedId').val();
            $.ajax({
                type: "PUT",
                url: "/access/"+id,
                success: function (response) {
                    $('#updateform_errorList').html("");
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#accessEmployedModal').modal('hide');
                    fetchemployed();
                }
            });
        });





        $(document).on('click', '.edit_employed',function(e){

            e.preventDefault();

            var empl_id = $(this).val();
            

            $('#editEmployedModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/editEmployed/"+empl_id,
                success: function (response){
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }
                    else{
                        $('#editEmployedId').val(response.employed.employedID);
                        $('#editDepartment').val(response.employed.department);
                        $('#editLastName').val(response.employed.lastName);
                        $('#editMiddleName').val(response.employed.middleName);
                        $('#editFirstName').val(response.employed.firstName);

                    }
                }

            });

        });


        $(document).on('click','.update_employed', function(e){
            e.preventDefault();
            var empl_id = $('#editEmployedId').val();

            var data = {
                'employedID': $('#editEmployedId').val(),
                'department': $('#editDepartment').val(),
                'lastName': $('#editLastName').val(),
                'middleName': $('#editMiddleName').val(),
                'firstName': $('#editFirstName').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: "/updateEmployed/"+empl_id,
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 400){
                        $('#updateform_errorList').html("");
                        $('#updateform_errorList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) { 
                            $('#updateform_errorList').append('<li>'+err_values+'</li>');
                        });
                    }
                    else if(response.status == 404){
                            $('#updateform_errorList').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                    }
                    else{
                        $('#updateform_errorList').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('#editEmployedModal').modal('hide');
                        fetchemployed();
                    }
                }
            });

        });



        $(document).on('click', '.close_employed',function(e){

            e.preventDefault();
            $('#addEmployedModal').find('input').val("");
            $('#addEmployedModal').find('select').val(3);
            $('#editEmployedModal').find('input').val("");
            $('#recordEmployedModal').find('input').val("");


        });



        $(document).on('click', '.add_employed',function(e){

            e.preventDefault();
            
            var data = {
                'employedID': $('.employedId').val(),
                'department': $('.department').val(),
                'lastName': $('.lastName').val(),
                'middleName': $('.middleName').val(),
                'firstName': $('.firstName').val(),
                'access': $('.access').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('employed.add')}}",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status == 400){
                        $('#saveform_errorList').html("");
                        $('#saveform_errorList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) { 
                        $('#saveform_errorList').append('<li>'+err_values+'</li>');
                        });
                    }
                    else{
                        $('#saveform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#addEmployedModal').modal('hide');
                        $('#addEmployedModal').find('input').val("");
                        fetchemployed();

                    }
                }
            });

        });


        $(document).on('click', '.delete_employed', function (e) {
            e.preventDefault();

            var empl_id = $(this).val();
            $('#deleteEmployedId').val(empl_id);
            $('#deleteEmployedModal').modal('show');

        });





        $(document).on('click','.delete_employed_confirm',function(e){
            e.preventDefault();

            var empl_id = $('#deleteEmployedId').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/deleteEmployed/"+empl_id,
                success: function (response) {
                    if(response.status == 200){
                        $('#deleteform_errorList').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('#deleteEmployedModal').modal('hide');
                    }
                    else{
                        $('#updateform_errorList').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }
                }
            });

            fetchemployed();
        });


        


    });

</script>



@endsection