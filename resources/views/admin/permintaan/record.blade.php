@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>All order</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>All Order</strong>
                </li>
            </ol>
    </div>

    <div class="col-lg-4">
        <div class="title-action">
              <a href="{{ route('admin.fpb_pdf') }}" type="button" class="btn btn-primary" target="_blank"><i class="fa fa-plus"> PDF</i> </a>
            
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
                	<h5>All Order</h5>
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
                                    <th><center>Unit </center></th>
                                    <th><center>Category</center></th>
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
                                <td>.
                                <!-- category request -->
                                @if($permin->category_id == '1')
                                    <span class="float-left label label-info">{{ $permin->category->category }} </span> 
                                    <p><p><small> Silahkan Atur Jadwal untuk pembelian barang</small></p></p>
                                    @elseif($permin->category_id == '2')
                                    <span class="float-left label label-warning">{{$permin->category->category}} </span>   
                                    <p><p><small> Harap untuk segera di proses</small></p></p>
                                    @elseif($permin->category_id == '3')
                                    <span class="float-left label label-danger">{{$permin->category->category}} </span>
                                    <p><small> Harap untuk segera di proses</small></p>
                                    @endif 
                               </td>
                                <!-- end category request -->
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
                                <!-- progress info -->
                                <td>
                                @if($permin->status == '0')
                                    <span class="float-left label label-warning">On Progress</span> 
                                @elseif($permin->status == '1')
                                    <span class="float-left label label-success">Finish</span>
                                @endif
                                <!-- end Progress info -->
                                <p><small> Diajukan Oleh Admin {{$permin->users->division->divisi}} {{$permin->users->name}}</small></p>
                                </td>
                                
                                <td width="25%"><center>
                                    
		                        	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Action</button>
                                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="{{ route('admin.detail_record', $permin->id) }}"> <i class="fa fa-list"> Detail </i></a>
                                                @if($permin->approval == '0')
                                                <a class="dropdown-item" href="{{route('admin.men_approve', $permin->id)}}" onclick="return confirm('Anda Yakin Untuk Menyetujui Permintaan Berikut ?')" > <i class="fa fa-newspaper-o"> Approve</i></a>
                                                <a class="dropdown-item" href="{{route('admin.declinementer',$permin->id)}}"><i class="fa fa-refresh"> Decline</i></a>
                                                @elseif($permin->approval == '1')
                                                <a class="dropdown-item" href="{{route('admin.approve', $permin->id)}}" onclick="return confirm('Anda Yakin Untuk Menyetujui Permintaan Berikut ?')" > <i class="fa fa-newspaper-o"> Approve</i></a>
                                                <a class="dropdown-item" href="{{route('admin.declinemenkan',$permin->id)}}" ><i class="fa fa-refresh"> Decline</i></a>
                                                @elseif($permin->approval == '2')
                                                <a class="dropdown-item" href="#"> <i class="fa fa-newspaper-o"> Process</i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>

                                    <!-- <div class="btn-group">
                                        <button type="button" class="btn btn-default">Action</button>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#">Process</a>
                                            <a class="dropdown-item" href="{{ route('admin.fpb_show', $permin->id) }}">Detail</a>
                                            <a class="dropdown-item" href="{{ route('admin.fpb_edit', $permin->id) }}">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div> -->
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
                                            <small class="font-bold">System Form Request Order</small>
                                    </div>
                                    <div class="modal-body">
                                    	<form role="form" method="POST" action="{{ route('admin.fpb_store') }}" enctype="multipart/form-data">
                                    		{{csrf_field()}}  {{method_field('POST')}}

                                            <input type="hidden" id="id" name="id"></input>

                                    		<div class="form-group">
		                                    	<label>Product Name</label> 
		                                    	<input type="text" placeholder="Enter Product Name" class="form-control" name="product_name" autofocus required>
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
							<!--end modal  -->
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
        $('.modal-title').text('Decline Order');
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


