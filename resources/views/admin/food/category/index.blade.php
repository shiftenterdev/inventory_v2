@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Food</li>
        <li class="active">Category</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Food Category List
                <a href="food/category/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New
                    Food Category</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->title}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="food/category/edit/{{$p->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="food/category/delete/{{$p->id}}" class="btn btn-sm btn-danger confirm"><i
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
