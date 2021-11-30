@extends('layouts.app')
@section('content')
  <div class="row">
    <!-- Boc Pertama untuk informasi pesanan selesai -->
    <div class="col-lg-3">
      <div class="ibox ">
        <div class="ibox-title">
          <span class="label label-success float-right">Orders Finish</span>
            <h5>Goods</h5>
        </div>
        
        <div class="ibox-content">
          <h1 class="no-margins">40 886,200</h1>
            <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
              <small>Total Orders</small>
        </div>
      </div>
    </div>
    
    <!-- Box  Kedua Untuk Informasi Pesanan Dalam Proses -->
    <div class="col-lg-3">
      <div class="ibox ">
        <div class="ibox-title">
          <span class="label label-info float-right">Orders Process</span>
            <h5>Goods</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">275,800</h1>
            <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
              <small>Total orders</small>
        </div>
      </div>
    </div>
  
    <!-- Box  Kedua Untuk Informasi Pesanan Dibatalkan -->
    <div class="col-lg-3">
      <div class="ibox ">
        <div class="ibox-title">
          <span class="label label-danger float-right">Orders Decline</span>
            <h5>Goods</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">275,800</h1>
            <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
              <small>Total orders</small>
        </div>
      </div>
    </div>

  </div>


  @if($status != 0  )
    <div class="alert alert-warning col-lg-12">
    You Have {{$status}} Request to Complete
    </div>
  @endif  
   

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
        @if($status != 0  )
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
                    <!-- start box table -->
                    <div class="ibox-content">    	
	                    <div class="table-responsive">
                         <!-- Table data suratmasuk-->
		                    <table class="table table-striped table-bordered table-hover dataTables-example" >
			                    <thead>
			                    <tr>
                              <th><center>Doc.Id </center></th>
			                        <th><center>Name Product </center></th>
			                        <th><center>Specificatin </center></th>
                              <th><center>Qty </center></th>
                              <th><center>Keterangan</center></th>
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
                            @if($permin->status ==0)
                              <td><center><label class="btn btn-warning">On Progress</label> <p><small>Masih Dikerjakan Oleh Admin Gudang/Procurement</small></center></td>
                            @endif
                            <td><center>
                                    
		                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                              <a href="#" class="btn btn-simple btn-info btn-xs update"><i class="fa fa-edit"></i></a>
                              <a href="#" class="btn btn-simple btn-danger btn-xs delete" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" ><i class="fa fa-trash"></i></a>
                            </form>
                            </center></td>
                        </tr>
		                   @endforeach
							          </tbody>
		                    </table>
                      </div>
                    </div>
                    <!-- end table -->
              </div> 
              <!-- end ibox -->
            </div>
            <!-- endcol -->
            @endif
    </div>
    <!-- end Row -->
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