@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Category</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Category List
                <a href="category/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New
                    Category</a>
            </legend>
            <table class="table">
                <thead>
                <tr>
                    <th>Sl.</th>
                    <th>Title</th>
                    <th>Full Category</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $k=>$c)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$c->cat_title}}</td>
                        <td>{{$c->full_category}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="category/edit/{{$c->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="category/delete/{{$c->id}}" class="btn btn-sm btn-danger confirm"><i
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
