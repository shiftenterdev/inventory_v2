@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Refund & Return</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Refund/Return List
                <a href="refund/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New
                    Refund</a>
            </legend>
            <table class="table">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td>{{$p->pro_code}}</td>
                        <td>{{$p->pro_title}}</td>
                        <td>{{$p->pro_quantity}}</td>
                        <td>{{$p->customer_id}}</td>
                        <td>{{$p->date}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
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
