@extends('admin.layout.index')


@section('content')

    <div class="col-md-9 mB">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="sell">Sell</a></li>
            <li class="active">History</li>
        </ul>
        <div class="cN">
            <fieldset>
                <legend>
                    Sells History
                </legend>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Invoice ID</th>
                        <th>Customer ID</th>
                        <th>Payment Opt</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sells as $s)
                        <tr>
                            <td>{{$s->invoice_id}}</td>
                            <td>{{$s->customer_id}}</td>
                            <td>{{$s->payment_option}}</td>
                            <td>
                                    <a href="brand/view/{{$s->id}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </fieldset>

        </div>
    </div>

@endsection
