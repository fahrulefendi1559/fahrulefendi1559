@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Approve order</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tables</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Approve Order</strong>
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

        <!-- tabs -->
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> 
                            Need Approval 
                            <span class="label label-warning">{{$count}}</span>
                        </a></li>
                        


                        <li><a class="nav-link" data-toggle="tab" href="#tab-2">Approved</a></li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                              <!-- start body  -->  	
                                    <!-- Table data suratmasuk-->
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th><center>Doc.Id </center></th>
                                                    <th><center>Name Product </center></th>
                                                    <th><center>Specificatin </center></th>
                                                    <th><center>Qty </center></th>
                                                    <th><center>Unit</center></th>
                                                    <th><center>Date Required </center></th>
                                                    <th><center>Description</center></th>
                                                    <th><center>User Create</center></th>
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
                                                <td><center>{{$permin->desc}}</center></td>
                                                <td><center>{{$permin->users->name}} 
                                                <p><small> {{$permin->users->division->divisi}}</small></p>
                                                </center></td>
                                                <td><center>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default">Action</button>
                                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            <a class="dropdown-item" href="{{ route('admin.detail_record', $permin->id) }}"> <i class="fa fa-list"> Detail </i></a>
                                                            @if($permin->approval == '0')
                                                            <a class="dropdown-item" href="{{route('admin.approve_menter', $permin->id)}}" onclick="return confirm('Anda Yakin Untuk Menyetujui Permintaan Berikut ?')" > <i class="fa fa-newspaper-o"> Approve</i></a>
                                                            <a class="dropdown-item" href="{{route('admin.decline_menter',$permin->id)}}"><i class="fa fa-refresh"> Decline</i></a>
                                                            @elseif($permin->approval == '1')
                                                            <a class="dropdown-item" href="{{route('admin.approve_menkan', $permin->id)}}" onclick="return confirm('Anda Yakin Untuk Menyetujui Permintaan Berikut ?')" > <i class="fa fa-newspaper-o"> Approve</i></a>
                                                            <a class="dropdown-item" href="{{route('admin.decline_menkan',$permin->id)}}" ><i class="fa fa-refresh"> Decline</i></a>
                                                            @endif
                                                        </div>
                                                </div>
                                                </center></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    <!-- end tabel -->                             
                              <!-- end body  -->
                            </div>
                        </div>

                        <div role="tabpanel" id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <!-- body -->
                                    <!-- Table data suratmasuk-->
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th><center>Doc.Id </center></th>
                                                    <th><center>Name Product </center></th>
                                                    <th><center>Specificatin </center></th>
                                                    <th><center>Qty </center></th>
                                                    <th><center>Unit</center></th>
                                                    <th><center>Date Required </center></th>
                                                    <th><center>Description</center></th>
                                                    <th><center>User Create</center></th>
                                                    <th width="14%"><center> ACTION</center></th>
                                                </tr>
                                                </thead>
                                            <tbody>
                                            @foreach($permin_approve as $permin)
                                            <tr >
                                                <td><center>{{$permin->id}}</center></td>
                                                <td><center>{{$permin->product_name}}</center></td>
                                                <td><center>{{$permin->spec}}</center></td>
                                                <td><center>{{$permin->qty}}</center></td>
                                                <td><center>{{$permin->unit}}</center></td>
                                                <td><center>{{ \Carbon\Carbon::parse($permin->use_date)->format('j M Y')}}
                                                </center></td>
                                                <td><center>{{$permin->desc}}</center></td>
                                                <td><center>{{$permin->users->name}} 
                                                <p><small> {{$permin->users->division->divisi}}</small></p>
                                                </center></td>
                                                <td><center>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default">Action</button>
                                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            <a class="dropdown-item" href="{{ route('admin.detail_record', $permin->id) }}"> <i class="fa fa-list"> Detail </i></a>
                                                        </div>
                                                </div>
                                                </center></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    <!-- end tabel -->  
                                <!-- end bodi -->
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        <!-- end tabs -->
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


