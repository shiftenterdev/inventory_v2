@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Settings</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Update Password
            </legend>
            <form action="settings/update-passwordm" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Current Password</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Current Password" type="password"
                               name="current_password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">New Password</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="New Password" type="password" name="new_password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Confirm Password</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Confirm Password" type="password"
                               name="confirm_password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary" disabled>Update Password</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

