@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Upload Data PR PO</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Upload Data</strong>
                </li>
            </ol>
    </div>

    <div class="col-lg-4">
        <div class="title-action">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick="addForm()"><i class="fa fa-plus"> Upload Data PR PO</i></button>
            
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
                	<h5>Upload Data</h5>
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
                                    <th><center>PO</center></th>
			                        <th><center>Nama Nama Barang </center></th>
			                        <th><center>Jumlah</center></th>
                                    <th><center>Satuan </center></th>
                                    <th><center>Harga</center></th>
			                        <th><center>Total harga </center></th>
                                    <th><center>Vendor</center></th>
			                        <th width="14%"><center> ACTION</center></th>
			                    </tr>
			                    </thead>
		                    <tbody>
		                    
		                    <tr >
                                <td><center>1</center></td>
		                        <td><center>1</center></td>
		                        <td><center>1</center></td>
                                <td><center>1</center></td>
                                <td><center>1</center></td>
                                <td><center>1</center></td>
                                <td><center>1</center></td>

                                <td><center>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Action</button>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item fa fa-list" href="#"> Detail</a>
                                        
                                        <a class="dropdown-item fa fa-pencil" href="#"> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        
                                        <a class="dropdown-item fa fa-upload" href="#"  > Upload Doc.</a>
                                        
                                    </div>
                                </div>
                                </center></td>
		                    </tr>
		                   
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
                                    	<form role="form" method="POST" action="#" enctype="multipart/form-data">
                                    		{{csrf_field()}}  {{method_field('POST')}}

                                            <input type="hidden" id="id" name="id"></input>

                                    		<div class="form-group">
		                                    	<label>Upload File</label> 
		                                    	<input type="file" placeholder="Upload File PR PO" class="form-control" name="" autofocus required>
                                                <span class="help-block with-errors"></span>
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
    //date required
        $(function(){
        $(".datepicker").datepicker({
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
        $('.modal-title').text('Upload Data');
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


