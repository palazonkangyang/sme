@extends('buyer.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         src="{!! url("dist/img/user2-160x160.jpg") !!}"
                         alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $buyer->name }}</h3>
                    <p class="text-muted text-center">{{ $buyer->company_name }}</p>


                    <a href="{{ Route("buyer.auth.profile.edit") }}" class="btn btn-primary btn-block"><i
                                class="fa fa-edit"></i> <b>Edit
                            Profile</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Account Information</h3>
                </div>
                <div class="box-body">
                    <strong>Name</strong>
                    <p class="text-muted">{{ $buyer->name }}</p>
                    <hr/>

                    <strong>Company Name</strong>
                    <p class="text-muted">{{ $buyer->company_name }}</p>
                    <hr/>

                    <strong>Email</strong>
                    <p class="text-muted">{{ $buyer->email }}</p>
                    <hr/>

                    <strong>Contact No</strong>
                    <p class="text-muted">{{ $buyer->contact_no }}</p>
                    <hr/>

                    <strong>Address</strong>
                    <p class="text-muted">{{ $buyer->address }}</p>
                    <hr/>

                    <strong>Postal Code</strong>
                    <p class="text-muted">{{ $buyer->postal_code }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection