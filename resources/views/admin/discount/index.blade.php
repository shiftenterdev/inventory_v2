@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Product Discount</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Discount List
                <a href="discount/create" class="btn btn-sm btn-primary nB pull-right">
                    <i class="fa fa-plus"></i> New Discount</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Product</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($discount as $k => $b)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$b->product->title}}</td>
                        <td>{{$b->discount_type=='1'?'Percentage':'Flat'}}</td>
                        <td>{{$b->discount}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="discount/edit/{{$b->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="discount/delete/{{$b->id}}" class="btn btn-sm btn-danger confirm"><i
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
