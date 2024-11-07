@extends('layouts.admin')
@section('header', 'Member')

@section('css')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                        Create New member
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table class="table table-stripped table-bordered" id="datatable">
                        <thead>
                            <tr>
                            <th style="width: 10px">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Phone Number</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div> -->
            </div>
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                            <div class="modal-header">
                                <h4 class="modal-title">Member</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf

                                <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" :value="data.name" required="">
                                    <label>Gender</label>
                                    <input type="text" name="gender" class="form-control" placeholder="Enter Name" :value="data.gender" required="">
                                        <!-- <select class="form-control" name="gender" form="gender" :value="data.gender" required="">
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select> -->
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" placeholder="08xxx" :value="data.phone_number" required="">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Address" :value="data.address" required="">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email" :value="data.email" required="">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                    <!-- /.modal-dialog -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bo') }}otstrap4.min.js"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.re') }}sponsive.min.js"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bo') }}otstrap4.min.js"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.bu') }}ttons.min.js"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bo') }}otstrap4.min.js"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript">
    var actionUrl = '{{ url('members') }}';
    var apiUrl = '{{ url('api/members') }}';

    var columns = [
        {data: 'DT_RowIndex', class: 'text-center', orderable:true},
        {data: 'name', class: '', orderable:true},
        {data: 'gender', class: 'text-center', orderable:true},
        {data: 'phone_number', class: 'text-center', orderable:true},
        {data: 'address', class: '', orderable:true},
        {data: 'email', class: '', orderable:true},
        {render:function(index, row, data, meta){
            return `
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
                Edit
            </a>
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.deleteData(event, ${data.id})">
                Delete
            </a>`;
            }, orderable: false, width: '200px', class: 'text-center'},
    ];
</script>
<script src="{{ asset('js/data.js') }}"></script>
@endsection