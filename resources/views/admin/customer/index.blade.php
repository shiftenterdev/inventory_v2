@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Customer</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Customer List
                <a href="customer/create" class="btn btn-sm btn-primary nB pull-right">
                    <i class="fa fa-plus"></i> New Customer</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Current Balance</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $c)
                    <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->customer_no}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->email}}</td>
                        <td>{{$c->mobile}}</td>
                        <td>{{money($c->balance)}}</td>
                        <td>{!! $c->status==1?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>' !!}</td>
                        <td>
                                <a href="customer/edit/{{$c->id}}" class="btn btn-xs btn-info"><i
                                            class="fa fa-pencil"></i> Edit</a>
                            <a href="customer/payment/{{$c->id}}" class="btn btn-xs btn-success"><i
                                            class="fa fa-money"></i> Payment</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </fieldset>

    </div>

@endsection
