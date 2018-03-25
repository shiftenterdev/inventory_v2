@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Role</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Role
                <a href="role/create" class="btn btn-sm btn-primary nB pull-right">
                    <i class="fa fa-plus"></i> New Role</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $k => $b)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$b->title}}</td>
                        <td>{{$b->slug}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="role/edit/{{$b->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="role/delete/{{$b->id}}" class="btn btn-sm btn-danger confirm"><i
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
