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
                    {{--<th>Thumb</th>--}}
                    <th>Title</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Purchase Price</th>
                    <th>Sell Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td>{{$p->code}}</td>
                        {{--<td><img src="{{$p->image}}" alt="" style="width: 100px"></td>--}}
                        <td>{{$p->title}}</td>
                        <td>{{$p->category_names}}</td>
                        <td>{{$p->brand->title}}</td>
                        <td>{{money($p->purchase_price)}}</td>
                        <td>{{money($p->sell_price)}}</td>
                        <td>{{$p->quantity}}</td>
                        <td>{!! $p->status==1?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>' !!}</td>
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
