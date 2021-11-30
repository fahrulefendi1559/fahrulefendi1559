@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Process All Orders</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Process Order</strong>
                </li>
            </ol>
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
                	<h5>Process Order</h5>
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
			                        <th><center>Information </center></th>
                                    <th><center>Date Required</center></th>
			                        <th width="14%"><center> ACTION</center></th>
			                    </tr>
			                    </thead>
		                    <tbody>
                            @foreach($permintaan as $permin)
                            @if($permin->status == 0)
		                    <tr >
                                <td><center>{{$permin->id}}</center></td>
		                        <td><center>{{$permin->product_name}}</center></td>
		                        <td><center>{{$permin->spec}}</center></td>
                                <td><center>{{$permin->qty}}</center></td>
                                <td><center>{{$permin->unit}}</center></td>
		                        <td><center>{{$permin->desc}}</center></td>
                                <td><center>{{\Carbon\Carbon::parse($permin->use_date)->format('j M Y')}}</center></td>
                                <td width="15%" ><center>
                                    
		                        	<!-- <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <a href="#" class="btn btn-simple btn-primary btn-xs view"><i class="fa fa-file-pdf-o"> View</i></a>
                                        <a href="#" class="btn btn-simple btn-info btn-xs proses"><i class="fa fa-check-square-o"> Process</i></a>
                                        <a href="#" class="btn btn-simple btn-danger btn-xs delete"><i class="fa fa-window-close"> Decline</i></a>

                                    </form> -->

                                    <div class="btn-group">
                                    <button type="button" class="btn btn-default">Action</button>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        @if($permin->approval == '2' )
                                        <a class="dropdown-item" href="{{ route('staff.fpb_show', $permin->id) }}"> <i class="fa fa-list"> Detail </i></a>
                                        <a class="dropdown-item" href="{{ route('staff.process_fpb', $permin->id) }}"> <i class="fa fa-send-o"> Process </i></a>
                                        @endif
                                    </div>
                                </div>
                                </center></td>
                            </tr>
                            @endif
		                   @endforeach
							</tbody>
		                    </table>
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


