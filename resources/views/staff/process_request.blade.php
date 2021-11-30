@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Process Order</h2>
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
                    <form method="post" action="{{ route('staff.post_process') }}" >   	
                    {{ csrf_field() }}
                        <div class="hr-line-dashed"></div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Product name</label>
                                <div class="col-lg-10"><input type="text" disabled="" class="form-control" value="{{ $proses->product_name }}"></div>
                        </div>

                        <div class="hr-line-dashed"></div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Specification</label>
                                <div class="col-lg-10"><input type="text" disabled="" class="form-control" value="{{ $proses->spec }}"></div>
                        </div>

                        <div class="hr-line-dashed"></div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Qty</label>
                                <div class="col-lg-10"><input type="text" disabled="" class="form-control" value="{{ $proses->qty }}"></div>
                        </div>

                        <div class="hr-line-dashed"></div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Unit</label>
                                <div class="col-lg-10"><input type="text" disabled="" class="form-control" value="{{ $proses->unit }}"></div>
                        </div>

                        <div class="hr-line-dashed"></div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Information</label>
                                <div class="col-lg-10"><input type="text" disabled="" class="form-control" value="{{ $proses->desc }}"></div>
                        </div>

                        <input type="hidden" id="request_id" name="request_id" value="{{$proses->id}}" ></input>

                        <div class="hr-line-dashed"></div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Category Proses</label>
                                <div class="col-lg-10">
                                    <select class="form-control " name="category_id" autofocus required>
                                        <option disabled selected>Pilih Category Proses</option>
                                        @foreach ($category as $cat)                  
                                            <option value="{{ $cat->id }}" autofocus required> Request {{ $cat->category}}</option>             
                                        @endforeach
                                    </select>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>

                        <div class="hr-line-dashed"></div>
                            <div class="form-group row"><label class="col-lg-2 col-form-label">Note</label>
                                <div class="col-lg-10">
                                    <input type="textarea" class="form-control" name="catatan">
                                </div>
                            </div>
                        
                        <div class="hr-line-dashed"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Process Request Order</strong></button>
                                </div>
                            </div>

                    </form>
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


