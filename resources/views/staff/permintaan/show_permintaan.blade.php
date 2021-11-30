@extends('layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Detail Order</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    <strong>Detail Order</strong>
                </li>
            </ol>
    </div>
</div>

<br>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Order</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <!-- <th>Doc.Id</th> -->
                    <th>Product Name</th>
                    <th>Specification</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Date Required</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Approval</th>
                  </tr>
                </thead>
                <tbody>

                  <tr data-widget="expandable-table" aria-expanded="true">
                    <td>{{$req->product_name}}</td>
                    <td>{{$req->spec}}</td>
                    <td>{{$req->qty}}</td>
                    <td>{{$req->unit}}</td>
                    <td>{{$req->use_date->format('j M Y')}}</td>
                    <td>{{$req->category->category}}</td>
                    <td>{{$req->desc}}</td>
                    <td>
                    @if($req->approval == '1')
                      <span class="float-left label label-info">Not Approved </span>   
                      <p><small> Belum Disetujui Oleh Manager Kantor</small></p>
                    @elseif($req->approval == '0')
                      <span class="float-left label label-warning">Not Approved </span>   
                      <p><small> Belum Disetujui Oleh Manager Terkait</small></p>
                    @elseif($req->approval == '2')
                      <span class="float-left label label-success">Aproved </span>   
                   <p><small> Telah Disetujui Oleh Manager Kantor</small></p>
                    @endif 
                    </td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="8">
                      <p>
                          <strong>Note ***</strong>
                          <p>
                            {{$req->desc}} 
                          </p>
                      </p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
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