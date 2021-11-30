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
          <span class="label label-warning float-right">Orders Process</span>
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
@endsection