@extends('admin.layout.index')


@section('content')

    <div class="col-md-9 mB">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Category</li>
        </ul>
        <div class="cN">
            <fieldset>
                <legend>
                    Category List
                    <a href="category/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New Category</a>
                </legend>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Parent</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->cat_title}}</td>
                            <td>{{$c->parent}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="category/edit/{{$c->id}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="category/delete/{{$c->id}}" class="btn btn-sm btn-danger confirm"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </fieldset>

        </div>
    </div>

@endsection
