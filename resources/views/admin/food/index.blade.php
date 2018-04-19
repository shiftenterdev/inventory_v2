@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Product</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Food List
                <a href="food/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New
                    Food</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Thumb</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($foods as $p)
                    <tr>
                        <td>{{$p->code}}</td>
                        <td><img src="{{$p->image}}" alt="" style="width: 50px"></td>
                        <td>{{$p->title}}</td>
                        <td>{{$p->category->title}}</td>
                        <td>{{money($p->price)}}</td>
                        <td>{{$p->status==1?'Active':'Inactive'}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="food/edit/{{$p->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="food/delete/{{$p->id}}" class="btn btn-sm btn-danger confirm"><i
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
