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
                        <input type="text" class="department form-control">
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
                    <input type="text" id="editDepartment" class="department form-control">
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




<div class="container-fluid">
    <!-- DataTales Example -->
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
                    <input type="text" name="employedId" class="form-control form-control-mb3" placeholder="ID">
                </div>
                <div class="col-md-2">
                    <p>Search by department: </p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="production">Production</option>
                        <option value="Human Resource Management">Human Resource Management</option>
                        <option value="Research and Development">Research and Development</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <p>Search by name: </p>
                    <input type="text" name="name" class="form-control form-control-mb3" placeholder="Name">
                </div>
                <div class="col-md-2">
                    <p>Search by last name: </p>
                    <input type="text" name="lastName" class="form-control form-control-mb3" placeholder="Last name">
                </div>
                <div class="col-md-4">
                    <br>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addEmployedModal" style="float: right" class="btn btn-success">ADD <i class="fas fa-user-plus"></i></a>
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
                    <tbody>
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
            $.ajax({
                type: "GET",
                url: "{{route('employed.load')}}",
                dataType: "json",
                success: function(response){
                    $('tbody').html("");

                    

                    $.each(response.employeds, function(key, item){
                        var accessButton = "";
                        console.log(item.access);
                        if(item.access){
                            accessButton = '<button type="button" value="'+item.employedID+'" class="access_employed btn btn-success">Enabled <i class="fas fa-user"></i></button>';
                        }else{
                            accessButton = '<button type="button" value="'+item.employedID+'" class="access_employed btn btn-danger">Disabled <i class="fas fa-user-alt-slash"></i></button>';
                        }
                        $('tbody').append('<tr>\
                            <td>'+item.employedID+'</td>\
                            <td>'+item.department+'</td>\
                            <td>'+item.lastName+'</td>\
                            <td>'+item.middleName+'</td>\
                            <td>'+item.firstName+'</td>\
                            <td>'+"na"+'</td>\
                            <td>'+"na"+'</td>\
                            <td><button type="button" value="'+item.employedID+'" class="edit_employed btn btn-primary"><i class="fas fa-edit"></i></button> <button type="button" value="'+item.employedID+'" class="delete_employed btn btn-danger"><i class="fas fa-trash-alt"></i></button> '+accessButton+' </td>\
                        </tr>'
                        );

                    });
                }

            });
        }


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
            $('#editEmployedModal').find('input').val("");

        });



        $(document).on('click', '.add_employed',function(e){

            e.preventDefault();
            
            var data = {
                'employedID': $('.employedId').val(),
                'department': $('.department').val(),
                'lastName': $('.lastName').val(),
                'middleName': $('.middleName').val(),
                'firstName': $('.firstName').val(),
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



        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


        $(document).on('click','.delete_employed_confirm',function(e){
            e.preventDefault();

            var empl_id = $('#deleteEmployedId').val();

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
                        fetchemployed();
                    }
                    else{
                        $('#updateform_errorList').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }
                }
            });
        });

    });

</script>



@endsection