@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Edit User</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    <strong>Edit User</strong>
                </li>
            </ol>
    </div>

    <div class="col-lg-4">
        <div class="title-action">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" onclick="addForm()"><i class="fa fa-plus">Add</i></button>
            
        </div>
    </div>
</div>

<br>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
            <div class="ibox-title">
                <h5>Edit User</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                    </div>
                </div>
            
                <div class="ibox-content">
                            <form role="form" method="post" action="{{ route('admin.update_user', $user->id) }}" >
                                {{ csrf_field() }}
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="nik" value="{{$user->nik}}">
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>

                                <!-- <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Role User</label>
                                    <div class="col-sm-10"><select class="form-control m-b" name="role_user">
                                        
                                        <option>Select Your Role</option>
                                        foreach(role as roles)
                                            <option></option>
                                        endforeach
                                    </select>
                                    </div>
                                </div> -->

                                <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <a href="{{route('admin.users')}}" class="btn btn-white btn-sm" type="button" >Cancel</a>
                                            <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                        </div>                                   
                                </div>
                            </form>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection


