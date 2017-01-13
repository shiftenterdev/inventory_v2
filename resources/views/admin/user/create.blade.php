@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">User</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                New User
            </legend>
            <form action="user/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Username</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Username" type="text" name="username">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Email" type="email" name="user_email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Mobile</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Mobile" type="text" name="user_mobile">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Role</label>

                    <div class="col-lg-8">
                        <select name="role_id" class="form-control select" required>
                            <option value="">Select Role</option>
                            @foreach($roles as $r)
                                <option value="{{$r->id}}">{{$r->role}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Status</label>

                    <div class="col-lg-8">
                        <div class="radio">
                            <input name="user_status" id="radio1" value="1" checked="" type="radio">
                            <label for="radio1">
                                <mark></mark>
                                Active
                            </label>
                        </div>
                        <div class="radio">
                            <input name="user_status" id="radio2" value="2" type="radio">
                            <label for="radio2">
                                <mark></mark>
                                Inactive
                            </label>
                        </div>
                    </div>
                </div>


                <hr>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

