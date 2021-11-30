@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Edit Department</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    <strong>Edit Department</strong>
                </li>
            </ol>
    </div>
</div>

<br>

<!-- data tables -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-5">
        <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Edit Department <small>All Department Can Your Update</small></h5>
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
                                <form role="form" action="{{ route('admin.update_department', $department->id) }}" method="post">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Department</label> 
                                            <input type="text" class="form-control" name="department" value="{{ $department->department }}">
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Save</strong></button>
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