@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>New order</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>New Order</strong>
                </li>
            </ol>
    </div>

    <div class="col-lg-4">
        <div class="title-action">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick="addForm()"><i class="fa fa-plus"> Add Request</i></button>
            
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
                	<h5>New Order</h5>
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
                                    <th><center>Doc.Id </center></th>
			                        <th><center>Name Product </center></th>
			                        <th><center>Specificatin </center></th>
                                    <th><center>Qty </center></th>
                                    <th><center>Unit</center></th>
			                        <th><center>Date Required </center></th>
                                    <th><center>Approval</center></th>
                                    <th><center>Information</center></th>
			                        <th width="14%"><center> ACTION</center></th>
			                    </tr>
			                    </thead>
		                    <tbody>
		                    @foreach($permintaan as $permin)
		                    <tr >
                                <td><center>{{$permin->id}}</center></td>
		                        <td><center>{{$permin->product_name}}</center></td>
		                        <td><center>{{$permin->spec}}</center></td>
                                <td><center>{{$permin->qty}}</center></td>
                                <td><center>{{$permin->unit}}</center></td>
                                <td><center>{{ \Carbon\Carbon::parse($permin->use_date)->format('j M Y')}}
                                </center></td>
                                <!-- approval info -->
                                <td>
                                    @if($permin->approval == '1')
                                    <span class="float-left label label-info">Not Approved </span>   
                                    <p><p><small> Belum Disetujui Oleh Manager Kantor</small></p></p> 
                                    @elseif($permin->approval == '0')
                                    <span class="float-left label label-warning">Not Approved </span>   
                                    <p><p><small> Belum Disetujui Oleh Manager Terkait</small></p></p>
                                    @elseif($permin->approval == '2')
                                    <span class="float-left label label-success">Aproved </span>   
                                    <p><p><small> Telah Disetujui Oleh Manager Kantor</small></p></p>
                                    @elseif($permin->approval == '3')
                                    <span class="float-left label label-danger">Decline </span>   
                                    <p><p><small> {{$permin->note_declinementer}}</small></p></p>
                                    @endif 
                               </td>     
                                <!-- end aproval info -->
		                        <td>
                                <!-- percabangan untuk progres pengajuan -->
                                @if($permin->status == '0')
                                    <span class="float-left label label-warning">On Progress</span> 
                                @elseif($permin->status == '1')
                                    <span class="float-left label label-success">Finish</span>
                                @endif
                                <!-- end percabangan progres pengajuan -->
                                <p><small> Diajukan Oleh {{$permin->users->division->divisi}} {{$permin->users->name}}</small>
                                </td>
                                
                                <!-- action -->
                                <td><center>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Action</button>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        @if($permin->approval=='3' || $permin->approval == '2' || $permin->approval=='1')
                                        <a class="dropdown-item" href="{{ route('admin.fpb_show', $permin->id) }}">Detail</a>
                                        @elseif($permin->approval == '0')
                                        <a class="dropdown-item" href="{{ route('admin.fpb_show', $permin->id) }}">Detail</a>
                                        <a class="dropdown-item" href="{{ route('admin.fpb_edit', $permin->id) }}">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('admin.fpb_delete', $permin->id) }}" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" >Delete</a>
                                        @endif
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
                                    	<form role="form" method="POST" action="{{ route('admin.fpb_store') }}" enctype="multipart/form-data">
                                    		{{csrf_field()}}  {{method_field('POST')}}

                                            <input type="hidden" id="id" name="id"></input>

                                            <div class="form-group">
		                                    	<label>Request Category</label>
			                                    	<select class="form-control " name="category_id">
                                                        <option>Choose Request Category</option>
			                                    		@foreach ($cat as $category)
    				                                        <option value="{{ $category->id }}" >{{ $category->category}}</option>
				                                        @endforeach
			                                    	</select>
                                            </div>

                                    		<div class="form-group">
		                                    	<label>Product Name</label> 
		                                    	<input type="text" placeholder="Enter Product Name" class="form-control" name="product_name" autofocus required>
                                                <span class="help-block with-errors"></span>
                                            </div>
                                            
                                            <div class="form-group">
		                                    	<label>Spec</label> 
		                                    	<input type="text" placeholder="Enter Spesification" class="form-control" name="spec" autofocus required>
                                                <span class="help-block with-errors"></span>
                                            </div>
                                            
                                            <div class="form-group">
		                                    	<label>Qty</label> 
		                                    	<input type="number" placeholder="Enter Qty" class="form-control" name="qty" autofocus required>
                                                <span class="help-block with-errors"></span>
                                            </div>

                                            <div class="form-group">
		                                    	<label>Unit</label> 
		                                    	<input type="text" placeholder="Enter Unit" class="form-control" name="unit" autofocus required>
                                                <span class="help-block with-errors"></span>
                                            </div>

                                            <div class="form-group">
		                                    	<label>Description</label> 
		                                    	<input type="text" placeholder="Enter Description Request" class="form-control" name="desc" autofocus required>
                                                <span class="help-block with-errors"></span>
                                            </div>

                                            <div class="form-group">
		                                    	<label>Date Required</label> 
		                                    	<input type="text" class="form-control datepicker" name="use_date" autofocus required>
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
        $('.modal-title').text('New Order');
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


