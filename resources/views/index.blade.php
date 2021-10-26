@extends('plantilla')
@section('info')

    <!-- Modal add employed-->
    <div class="modal fade" id="addEmployedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add employed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_employed">Save </button>
                </div>
            </div>
        </div>
    </div>





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
                    <input type="text" name="employedId" class="form-control form-control-lg" placeholder="ID">
                </div>
                <div class="col-md-2">
                    <p>Search by department: </p>
                    <input type="text" name="department" class="form-control form-control-lg" placeholder="Department">
                </div>
                <div class="col-md-2">
                    <p>Initial access date: </p>
                    <input type="date" name="initialDate" class="form-control form-control-lg">
                </div>
                <div class="col-md-2">
                    <p>Final access date: </p>
                    <input type="date" name="finalDate" class="form-control form-control-lg">
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a type="button" value="" class="editEmployed btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a type="button" value="" class="deleteEmployed btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
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
                        $('tbody').append('<tr>\
                            <td>'+item.employedID+'</td>\
                            <td>'+item.department+'</td>\
                            <td>'+item.lastName+'</td>\
                            <td>'+item.middleName+'</td>\
                            <td>'+item.firstName+'</td>\
                            <td>'+"na"+'</td>\
                            <td>'+"na"+'</td>\
                            <td><a type="button" value="'+item.employedID+'" class="editEmployed btn btn-primary"><i class="fas fa-edit"></i></a> <a type="button" value="'+item.employedID+'" class="deleteEmployed btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>\
                        </tr>'
                        );

                    });
                }

            });
        }







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
                url: "{{route('user.add')}}",
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

    });

</script>



@endsection