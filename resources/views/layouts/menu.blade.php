<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{ asset('asset/img/kirana.png') }}" width="50px" height="50px""/>
                    
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                        </span> 
                        <span class="text-muted text-xs block">Option <b class="caret"></b></span> </span> </a>

                        @if(Auth::user()->role_user == 1 || Auth::user()->role_user == 2 || Auth::user()->role_user == 3 )
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a data-toggle="modal" data-target="#gantiPassword">Change Password</a></li>
                        </ul>
                        @endif

                </div>
                <div class="logo-element">
                    FPB+
                </div>
            </li>

            <!-- menu untuk admin -->
            @if(Auth::user()->role_user == 999)
                <!-- menu home admin -->
                <li class="{{ Request::segment(1) == 'home' ? ' active' : '' }}">
                    <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <!-- menu order pengajuan -->
                <!-- <li>
                    <a href="#"> <i class="fa fa-book"></i> <span class="nav-label">Order </span></a>
                </li> -->
                <li>
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Order</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('admin.fpb_index') }}">Request Order</a></li>
                        <li><a href="{{route('admin.fpb_record')}}">Process Order</a></li>
                        <li><a href="{{route('admin.menu.approve')}}">Approve Order</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.category') }}"> <i class="fa fa-list"></i> <span class="nav-label">Category </span></a>
                </li>

                <li>
                    <a href="{{ route('admin.department') }}"> <i class="fa fa-users"></i> <span class="nav-label">Department </span></a>
                </li>

                <li>
                    <a href="{{ route('admin.division') }}"> <i class="fa fa-users"></i> <span class="nav-label">Division </span></a>
                </li>

                <li>
                    <a href="#"> <i class="fa fa-newspaper-o"></i> <span class="nav-label">Report </span></a>
                </li>

                <!-- menu management user -->
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Management Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('admin.users') }}">All Users</a></li>
                        <li><a href="{{ route('admin.detail_users') }}">View Detail User</a></li>

                    </ul>
                </li>
                <!-- menu upload data rekapan pr dan po  -->
                 <li>
                    <a href="{{route('admin.upload.prpo')}}"> <i class="fa fa-upload"></i> <span class="nav-label">Upload Data PR/PO </span></a>
                </li>
            
            <!-- menu Untuk Staff -->
            @elseif(Auth::user()->role_user == 1)
            <li class="{{ Request::segment(1) == 'home' ? ' active' : '' }}">
                    <a href="{{ route('staff.home') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <!-- menu order pengajuan -->
                <!-- <li>
                    <a href="#"> <i class="fa fa-book"></i> <span class="nav-label">Order </span></a>
                </li> -->
                <li>
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Order</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{route('staff.permintaan')}}">New Order</a></li>
                        <li><a href="{{route('staff.process')}}">Process Order</a></li>
                        <li><a href="#">View Request Order</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"> <i class="fa fa-newspaper-o"></i> <span class="nav-label">Report </span></a>
                </li>

                <!-- menu upload data rekapan pr dan po  -->
                 <li>
                    <a href="#"> <i class="fa fa-upload"></i> <span class="nav-label">Upload Data PR/PO </span></a>
                </li>
            <!-- end Menu Staff -->


            <!-- menu Manager -->
             @elseif(Auth::user()->role_user == 881 || Auth::user()->role_user == 882 || Auth::user()->role_user == 883)
            <li class="{{ Request::segment(1) == 'home' ? ' active' : '' }}">
                    <a href="#"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <!-- menu order pengajuan -->
                <!-- <li>
                    <a href="#"> <i class="fa fa-book"></i> <span class="nav-label">Order </span></a>
                </li> -->
                <li>
                    <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Order</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="#
                        ">Process Order</a></li>
                        <li><a href="#">View Request Order</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"> <i class="fa fa-newspaper-o"></i> <span class="nav-label">Report </span></a>
                </li>

                <!-- menu upload data rekapan pr dan po  -->
                 <li>
                    <a href="#"> <i class="fa fa-upload"></i> <span class="nav-label">Upload Data PR/PO </span></a>
                </li>
                <!-- end menu manager -->

                @endif
                
        </ul>

    </div>
</nav>

<!-- Modal Ganti Password -->
<div class="modal inmodal" id="gantiPassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
          <h4 class="modal-title" id="noteModalLabel">Ganti Password</h4>
        </div>

        <form class="form-horizontal" action="{{ route('forgot_password') }}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <br>

          
            <div class="form-group col-lg-12">
                <label>Password</label> 
		            <input type="password" placeholder="Password Baru Anda" class="form-control" name="pw1">
		    </div>

            <div class="form-group col-lg-12">
                <label>Password</label> 
		            <input type="password" placeholder="Ulangi Password Baru Anda" class="form-control" name="pw2">
		    </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-default">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
</div>
