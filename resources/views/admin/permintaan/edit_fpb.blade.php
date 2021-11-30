@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Edit Request</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    <strong>Edit Request</strong>
                </li>
            </ol>
    </div>
</div>

<br>

<!-- data tables -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
    <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Edit Request</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12 b-r">
                                <form role="form" action="{{ route('admin.fpb_update', $permintaan->id) }}" method="post">
                                {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>Product Name</label> 
                                            <input type="text" class="form-control" name="product_name" value="{{$permintaan->product_name}}" autofocus required>
                                    </div>

                                    <div class="form-group">
                                        <label>Spesification</label> 
                                            <input type="text" class="form-control" name="spec" value="{{$permintaan->spec}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Qty</label> 
                                            <input type="text" class="form-control" name="qty" value="{{$permintaan->qty}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Unit</label> 
                                            <input type="text" class="form-control" name="unit" value="{{$permintaan->unit}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label> 
                                            <input type="text" class="form-control" name="desc" value="{{$permintaan->desc}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Date Request</label> 
                                            <input type="text" class="form-control datepicker"  name="use_date" value="{{$permintaan->use_date}}" required>
                                    </div>
                                    
                                    <div>
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong> Save </strong></button>
                                    </div>
                                </form>
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

</script>
@endsection