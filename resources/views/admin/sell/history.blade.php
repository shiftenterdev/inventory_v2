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
                Sells History
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Payment Opt</th>
                    <th>Date</th>
                    <th>Invoice</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sells as $s)
                    <tr>
                        <td>{{$s->invoice_no}}</td>
                        <td>{{$s->customer_id}}</td>
                        <td>{{$s->customer->customer_name}}</td>
                        <td>{{$s->payment_option}}</td>
                        <td>{{date('d F, Y',strtotime($s->updated_at))}}</td>
                        <td>
                            <a href="sell/view/{{$s->invoice_id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-file-text"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </fieldset>

    </div>

@endsection
