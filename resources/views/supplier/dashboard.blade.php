@extends('supplier.layouts.main')
@section('content')
	<div class="row">
        <div class="col-lg-3 col-xs-6">
        	<div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         src="{!! url("dist/img/user2-160x160.jpg") !!}"
                         alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $supplier->company_name }}</h3>
                    <p class="text-muted text-center">{{ $supplier->contact_person }}</p>


                    <a href="{{ Route("supplier.auth.profile.edit") }}" class="btn btn-primary btn-block"><i
                                class="fa fa-edit"></i> <b>Edit
                            Profile</b></a>
                </div>
            </div>
        </div>
    </div>
@endsection