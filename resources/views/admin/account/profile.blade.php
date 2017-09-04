@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                         src="{!! url("dist/img/user2-160x160.jpg") !!}"
                         alt="User profile picture">

                    <h3 class="profile-username text-center">{{ $user->getName() }}</h3>
                    <p class="text-muted text-center">{{ $user->getRole() }}</p>
                    <a href="{{ Route("admin.account.profile.edit", $user->id) }}" class="btn btn-primary btn-block"><i
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
                    <strong>Email</strong>
                    <p class="text-muted">{{ $user->email }}</p>
                    <hr />

                    <strong>Role</strong>
                    <p class="text-muted">{{ $user->getRole() }}</p>
                    <hr />

                    <strong>Status</strong>
                    <p class="text-muted">{{ $user->getStatus() }}</p>

                </div>
            </div>
        </div>
    </div>
@endsection