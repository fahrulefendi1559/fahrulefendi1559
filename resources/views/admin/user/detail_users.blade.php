@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>All Users</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>
 
                <li class="breadcrumb-item active">
                    <strong>Detail All Users</strong>
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
        
        @foreach($detail as $det)
        <div class="col-lg-3">
            <div class="contact-box center-version">
                <a href="profile.html">
                    <img alt="image" class="rounded-circle" src="{{ asset('asset/img/kirana.png') }}">
                        <h3 class="m-b-xs"><strong>{{ $det->name }}</strong></h3>

                        <div class="font-bold">
                            NIK : {{ $det->nik }}
                            <br>
                            POSITION: {{ $det->namarole }}
                        
                        </div>
                        <address class="m-t-md">
                        <abbr title="Phone">mail:</abbr> {{ $det->email }}
                        </address>
                </a>

                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a href="#"  class="btn btn-xs btn-info"><i class="fa fa-eye"></i> View Activity </a>
                        <a href="{{route('admin.edit_users', ['id' => $det->id] )}}" class="btn btn-simple btn-primary btn-xs " ><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.delete_users', ['id' => $det->id])}}" class="btn btn-simple btn-danger btn-xs delete" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" ><i class="fa fa-trash"></i></a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

    </div>
</div>


<script type="text/javascript">
    //date picker tgl terima
        $(function(){
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
        });

 //datepicker tgl surat
        $(function(){
        $(".datepicker1").datepicker({
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
        $('.modal-title').text('Input New User');
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