@extends('admin.layout.index')


@section('content')

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
                        <input class="form-control" placeholder="Username" type="text" name="name"
                               value="{{$user->name}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Email" type="email" name="email"
                               value="{{$user->email}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Mobile</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Mobile" type="text" name="mobile"
                               value="{{$user->mobile}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Role</label>

                    <div class="col-lg-8">
                        <select name="role_id" class="form-control select" required>
                            <option value="">Select Role</option>
                            @foreach($roles as $r)
                                <option value="{{$r->id}}" {{$user->roles[0]->id == $r->id ?'selected':''}}>{{$r->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Status</label>

                    <div class="col-lg-8">
                        <div class="radio">
                            <input name="status" value="1" id="radio1"
                                   type="radio" {{$user->status=='1'?'checked':''}}>
                            <label for="radio1">
                                <mark></mark>
                                Active
                            </label>
                        </div>
                        <div class="radio">
                            <input name="status" value="2" id="radio2"
                                   type="radio" {{$user->status=='2'?'checked':''}}>
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

