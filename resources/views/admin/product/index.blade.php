@extends('admin.layout.index')


@section('content')

    <div class="col-md-9 mB">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Product</li>
        </ul>
        <div class="cN">
            <fieldset>
                <legend>
                    Product List
                    <a href="product/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New Product</a>
                </legend>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->pro_title}}</td>
                            <td>{{$p->pro_stock}}</td>
                            <td>{{$p->pro_price}}</td>
                            <td>{{$p->pro_status==1?'Active':'Inactive'}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
