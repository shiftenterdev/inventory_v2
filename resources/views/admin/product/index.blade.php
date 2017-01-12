@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Product</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Product List
                <a href="product/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New
                    Product</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td>{{$p->pro_code}}</td>
                        <td>{{$p->pro_title}}</td>
                        <td>{{$p->category->cat_title}}</td>
                        <td>{{$p->brand->brand_title}}</td>
                        <td>{{money($p->pro_price)}}</td>
                        <td>{{$p->pro_status==1?'Active':'Inactive'}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="product/edit/{{$p->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="product/delete/{{$p->id}}" class="btn btn-sm btn-danger confirm"><i
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
