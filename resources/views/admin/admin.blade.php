@extends('plantilla')
@section('info')


<!-- Modal add admin-->
<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Administrator</h5>
                <button type="button" class="btn-close close_admin" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="saveform_errorList"></ul>
                <div class="form-group">
                    <label for="">User</label>
                    <input type="text" class="user form-control">
                </div>
    
                <div class="form-group">
                    <label for="">password</label>
                    <input type="text" class="password form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_admin" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_admin">Save </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal add admin end-->


<!-- Modal edit admin-->
<div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Administrator</h5>
                <button type="button" class="btn-close close_admin" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="hidden" class="id form-control">
            <div class="modal-body">
                <ul id="saveform_errorList"></ul>
                <div class="form-group">
                    <label for="">User</label>
                    <input type="text" class="editUser form-control">
                </div>
    
                <div class="form-group">
                    <label for="">password</label>
                    <input type="text" class="editPassword form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_admin" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_admin">Save </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit admin end-->

<!-- Modal delete employed-->
<div class="modal fade" id="deleteAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Administrator</h5>
                <button type="button" class="btn-close close_admin" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="updateform_errorList"></ul>

                <input type="hidden" id="deleteAdmin" class="adminId form-control">

                <h4>Are you sure ? want to delete this data ? </h4>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_admin" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_admin_confirm">Yes delete </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal delete employed end-->


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" ALIGN="center">Administrators </h6>
            <br>
        </div>

        <div class="card-body">
            <div id="success_message"></div>
            <br>
            <a href="#" data-bs-toggle="modal" data-bs-target="#addAdminModal" style="float: right; margin: 3px" class="btn btn-success">ADD <i class="fas fa-user-plus"></i></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="adminTable"  cellspacing="0">
                    <thead>
                        <tr>
                            <th>User</th>
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

        fetchadmin();

        function fetchadmin()
        {
            
            $.ajax({
                type: "GET",
                url: "{{route('admin.load')}}",
                dataType: "json",
                success: function(response){
                    $('.tbodyEmployed').html("");
                    $.each(response.admins, function(key, item){
                        
                        
                        $('.tbodyEmployed').append('<tr>\
                            <td>'+item.user+'</td>\
                            <td><button type="button" value="'+item.id+'" class="edit_admin btn btn-primary"><i class="fas fa-edit"></i></button> <button type="button" value="'+item.id+'" class="delete_admin btn btn-danger"><i class="fas fa-trash-alt"></i></button> </td>\
                        </tr>'
                        );

                    });
                }

            });
        }



        $(document).on('click', '.edit_admin',function(e){

            e.preventDefault();

            var admin_id = $(this).val();
            $('.id').val(admin_id);
            $('#editAdminModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/editAdmin/"+admin_id,
                success: function (response){
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }
                    else{
                        $('.editUser').val(response.admin.user);
                        
                    }
                }

            });

        });


        $(document).on('click','.update_admin', function(e){
            e.preventDefault();
            
            var admin_id = $('.id').val();
            var data = {
                'user': $('.editUser').val(),
                'password': $('.editPassword').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: "/updateAdmin/"+admin_id,
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

                        $('#editAdminModal').modal('hide');
                        fetchadmin();
                    }
                }
            });

        });



        $(document).on('click', '.close_admin',function(e){

            e.preventDefault();
            $('#addAdminModal').find('input').val("");
            $('#editAdminModal').find('input').val("");

        });



        $(document).on('click', '.add_admin',function(e){

            e.preventDefault();

            var data = {
                'user': $('.user').val(),
                'password': $('.password').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('admin.add')}}",
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
                        $('#addAdminModal').modal('hide');
                        $('#addAdminModal').find('input').val("");
                        fetchadmin();

                    }
                }
            });

        });


        $(document).on('click', '.delete_admin', function (e) {
            e.preventDefault();

            var admin_id = $(this).val();
            $('#deleteAdmin').val(admin_id);
            $('#deleteAdminModal').modal('show');

        });


        


        $(document).on('click','.delete_admin_confirm',function(e){
            e.preventDefault();

            var admin_id = $('#deleteAdmin').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/deleteAdmin/"+admin_id,
                success: function (response) {
                    if(response.status == 200){
                        $('#deleteform_errorList').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('#deleteAdminModal').modal('hide');
                    }
                    else{
                        $('#updateform_errorList').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }
                }
            });

            fetchadmin();
        });

    });

</script>


@endsection