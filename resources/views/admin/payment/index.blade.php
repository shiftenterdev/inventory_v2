@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Payment</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Payment History
                <div class="pull-right">
                    <a href="payment/create" class="btn btn-sm btn-primary nB">
                        <i class="fa fa-plus"></i> New Payment</a>
                    <a href="payment/history" class="btn btn-sm btn-warning">History</a>
                </div>

            </legend>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $c)
                    <tr>
                        <td>{{$c->customer_id}}</td>
                        <td>{{$c->customer_name}}</td>
                        <td>{{$c->customer_email}}</td>
                        <td>{{$c->customer_phone}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="customer/edit/{{$c->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="customer/delete/{{$c->id}}" class="btn btn-sm btn-danger confirm"><i
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
