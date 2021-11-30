@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Decline Order</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    <strong>Decline Order</strong>
                </li>
            </ol>
    </div>
</div>

<br>

<!-- data tables -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
    <div class="col-lg-7">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Decline Order <small>Please provide your refusal information</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12 b-r">
                                <form role="form" action="{{ route('admin.decline_post', $decline->id) }}" method="post">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Note Decline</label> 
                                            <input type="text" class="form-control" name="note_decline" required>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit" onclick="return confirm('Anda Yakin Untuk Menolak Permintaan Berikut ?')" ><strong>Decline Order</strong></button>
                                    </div>
                                 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
    </div>
</div>
@endsection