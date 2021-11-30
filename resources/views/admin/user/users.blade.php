@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>All Users</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>All Users</strong>
                </li>
            </ol>
    </div>

    <div class="col-lg-4">
        <div class="title-action">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick="addForm()"><i class="fa fa-plus"> Add User</i></button>
            
        </div>
    </div>
</div>

<br>

<!-- data tables -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
		@if(session('sukses'))
		    <div class="alert alert-success col-lg-12">
            	{{session('sukses')}}
            </div>
        @endif

        @if(session('delete'))
            <div class="alert alert-info col-lg-12">
                {{session('delete')}}
            </div>
        @endif

        @if(session('update'))
            <div class="alert alert-info col-lg-12">
                {{session('update')}}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger col-lg-12">
                <ul>
                    @foreach ($errors-> all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-lg-12">
        	<div class="ibox ">
            	<div class="ibox-title">
                	<h5>All Users</h5>
                        <div class="ibox-tools">
                                                  
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                </div>
                    
                <div class="ibox-content">    	
                        <!-- Table data suratmasuk-->
	                    <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover dataTables-example" >
			                    <thead>
			                    <tr>
                                    <th><center>NIK </center></th>
			                        <th><center>NAME </center></th>
			                        <th><center>EMAIL </center></th>
			                        <th><center>POSITION </center></th>
			                        <th><center>DIVISION </center></th>
			                        <th><center>ACTION </center></th>
			                    </tr>
			                    </thead>
		                    <tbody>
		                    @foreach($users as $user)
		                    <tr >
                                <td><center>{{ $user->nik }}</center></td>
		                        <td><center>{{ $user->name }}</center></td>
		                        <td><center>{{ $user->email }}</center></td>
		                        <td><center>{{ $user->namarole }}</center></td>
		                        <td><center>{{ $user->divisi }}</center></td>

                                <td><center>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Action</button>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        
                                        <a class="dropdown-item fa fa-pencil" href="{{ route('admin.edit_users', $user->id) }}">  Edit</a>                                        
                                        <a class="dropdown-item fa fa-trash" href="{{ route('admin.delete_users', $user->id) }}" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" >  Delete</a>
                                      
                                    </div>
                                </div>
                                </center></td>
		                    </tr>
		                   @endforeach
							</tbody>
		                    </table>
                        </div>
                        <!-- modal create data -->
                        <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog ">
                            	<div class="modal-content animated bounceInRight">
                                	<div class="modal-header">
                                    	<button type="button" class="close" data-dismiss="modal">
                                    		<span aria-hidden="true">&times;</span>
                                    		<span class="sr-only">Close</span>
                                    	</button>
                                        <h4 class="modal-title"></h4>
                                            <small class="font-bold">Request Goods System</small>
                                    </div>
                                    <div class="modal-body">
                                    	<form role="form" method="POST" action="{{ route('admin.create_users') }}" enctype="multipart/form-data">
                                    		{{csrf_field()}}  {{method_field('POST')}}

                                            <input type="hidden" id="id" name="id"></input>

                                    		<div class="form-group">
		                                    	<label>Nik</label> 
		                                    	<input type="text" placeholder="NIK" class="form-control" name="nik" autofocus required>
                                                <span class="help-block with-errors"></span>
                                            </div>
                                            
                                            <div class="form-group">
		                                    	<label>Name</label> 
		                                    	<input type="text" placeholder="NAME" class="form-control" name="name" autofocus required>
                                                <span class="help-block with-errors"></span>
                                            </div>

                                            <div class="form-group">
		                                    	<label>Email</label> 
		                                    	<input type="email" placeholder="email@email.com" class="form-control" name="email" autofocus required>
                                                <span class="help-block with-errors"></span>
                                            </div>
                                            
                                            <div class="form-group">
		                                    	<label>Positions</label>
			                                    	<select class="form-control " name="role_user">
                                                        <option>Pilih Role User</option>
			                                    		@foreach ($role as $roles)
    				                                        <option value="{{ $roles->id }}" >{{ $roles->namarole}}</option>
				                                        @endforeach
			                                    	</select>
                                            </div>

                                            <div class="form-group">
		                                    	<label>Divisi</label>
			                                    	<select class="form-control " name="divisi_id">
                                                        <option>Pilih Divisi</option>
			                                    		@foreach ($divisi as $div)
    				                                        <option value="{{ $div->id }}" >{{ $div->divisi}}</option>
				                                        @endforeach
			                                    	</select>
                                            </div>
                                            
                                            <div class="form-group">
		                                    	<label>Password</label> 
		                                    	<input type="password" placeholder="PASSWORD" class="form-control" name="password">
		                                    </div>
                                            

                                    </div>

                                    <div class="modal-footer">
                                    	<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
							
                    </div>
                </div>
            </div>
        </div>
</div>


<script type="text/javascript">
    //date picker tgl terima
        $(function(){
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
        });

 //datepicker tgl surat
        $(function(){
        $(".datepicker1").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
        });

 //modalscript
    function addForm(){
        save_method = "add";
        $('input[name=_method]').val('POST'); 
        $('#myModal2 form')[0].reset();
        $('.modal-title').text('Input New User');
    }
// data table
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>1Tfgitp',
            buttons: []
        });
    });


</script>
@endsection