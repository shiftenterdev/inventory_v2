@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="sell">Sell</a></li>
        <li class="active">History</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Purchase History
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Customer Mobile</th>
                    <th>Customer Name</th>
                    <th>Invoice Date</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($purchases as $s)
                    <tr>
                        <td>{{$s->invoice_no}}</td>
                        <td>{{$s->customers[0]->mobile}}</td>
                        <td>{{$s->customers[0]->name}}</td>
                        <td>{{app_date($s->invoice_date)}}</td>
                        <td>{{money($s->total_amount)}}</td>
                        <td>{{money($s->paid)}}</td>
                        <td>{{money($s->total_amount - $s->paid)}}</td>
                        <td>
                            <a href="sell/show/{{$s->invoice_no}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-file-text"></i> View</a>
                            <a href="sell/print/{{$s->invoice_no}}" class="btn btn-sm btn-info" target="_blank"><i
                                        class="fa fa-print"></i> Print</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </fieldset>

    </div>

@endsection
