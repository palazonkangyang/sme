@extends('admin.layouts.main')
@section('content')
	<div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{!! route("admin.buyer.all") !!}" style="color: #fff">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h2>{!! $buyer !!} active buyers</h2>
                            <p>List of Buyers</p>
                        </div>
                         <div class="icon">
	                        <i class="ion ion-stats-bars"></i>
	                    </div>                        
                    </div>
                </a>
            </div>

             <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{!! route("admin.supplier.all") !!}" style="color: #fff">
                <div class="small-box bg-green">
                    <div class="inner">
                         <h2>{!! $supplier !!} active suppliers</h2>
                            <p>List of Suppliers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{!! route("admin.account.all") !!}" style="color: #fff">
                <div class="small-box bg-blue">
                    <div class="inner">
                         <h2>{!! $admin !!} active Admin Users</h2>
                            <p>List of Admin Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
                </a>
            </div>
    </div>

   
@endsection