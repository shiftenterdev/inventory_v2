@extends('admin.layout.index')


@section('content')

    <div class="col-md-9 mB">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">User</li>
        </ul>
        <div class="cN">
            <fieldset>
                <legend>
                    Edit User
                </legend>
                <form action="user/update/{{$user->id}}" class="form-horizontal" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Username</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Username" type="text" name="username" value="{{$user->username}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Email" type="email" name="user_email" value="{{$user->user_email}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Mobile</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Mobile" type="text" name="user_mobile" value="{{$user->user_mobile}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-8">
                            <div class="radio">
                                <label>
                                    <input name="user_status" value="1" type="radio" {{$user->user_status=='1'?'checked':''}}>
                                    Active
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="user_status" value="2" type="radio" {{$user->user_status=='2'?'checked':''}}>
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>

                    
                    <hr>
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </fieldset>

        </div>
    </div>
@endsection

