@extends('supplier.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
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
                    <strong>Contact Person</strong>
                    <p class="text-muted">{{ $supplier->contact_person }}</p>
                    <hr/>

                    <strong>Email</strong>
                    <p class="text-muted">{{ $supplier->email }}</p>
                    <hr/>

                    <strong>Contact No</strong>
                    <p class="text-muted">{{ $supplier->contact_no }}</p>
                    <hr/>

                    <strong>Address</strong>
                    <p class="text-muted">{{ $supplier->address }}</p>
                    <hr/>

                    <strong>Postal Code</strong>
                    <p class="text-muted">{{ $supplier->postal_code }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection