@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">User</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                All User
                <a href="user/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New
                    User</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $u)
                    <tr>
                        <td>{{$u->id}}</td>
                        <td>{{$u->username}}</td>
                        <td>{{$u->user_email}}</td>
                        <td>{{$u->user_mobile}}</td>
                        <td>{{$u->user_status==1?'Active':'Inactive'}}</td>
                        <td>{{ucfirst($u->role->role)}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="user/edit/{{$u->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="user/delete/{{$u->id}}" class="btn btn-sm btn-danger confirm"><i
                                            class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </fieldset>

    </div>

@endsection
