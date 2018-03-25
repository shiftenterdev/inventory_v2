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
                    <th>Status</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $u)
                    <tr>
                        <td>{{$u->id}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->mobile}}</td>
                        <td>{{$u->status==1?'Active':'Inactive'}}</td>
                        <td>{{$u->roles[0]->title or ''}}</td>
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
