<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    <style>
        table.main-table{
            border-collapse: collapse;
            width: 100%;
        }
        table.main-table td{
            border: 1px solid #ddd;
        }
        h4{margin-bottom: 5px}
        h3{margin-bottom: 10px}
    </style>
</head>
<body class="container-fluid">
<h2 style="text-align: center;text-decoration: underline">Sell Invoice # {{$invoice->invoice_no}}</h2>
{{--<h4 style="text-align: center;text-decoration: underline">Invoice # {{$invoice->invoice_no}}</h4>--}}

<table style="float: left">
    <tr>
        <td>Name</td>
        <td> : <strong>{{$invoice->customers[0]->name or ''}}</strong></td>
    </tr>
    <tr>
        <td>Address</td>
        <td> : <strong>{{$invoice->customers[0]->address or ''}}</strong></td>
    </tr>
    <tr>
        <td>Email</td>
        <td> : <strong>{{$invoice->customers[0]->email or ''}}</strong></td>
    </tr>
    <tr>
        <td>Mobile</td>
        <td> : <strong>{{$invoice->customers[0]->mobile or ''}}</strong></td>
    </tr>

</table>
<table style="float: right">
    <tr>
        <td>Invoice No</td>
        <td> : {{$invoice->invoice_no}}</td>
    </tr>
    <tr>
        <td>Invoice Sl</td>
        <td> : {{$invoice->invoice_sl}}</td>
    </tr>
    <tr>
        <td>Date</td>
        <td> : {{date('d F, Y',strtotime($invoice->updated_at))}}</td>
    </tr>

</table>
<div style="clear: both;height: 5px"></div>
<h4 style="text-decoration: underline">Product Details:</h4>
<table class="main-table">
    <thead style="background-color: #ddd">
    <tr>
        <th>SL</th>
        <th>Title</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total Price</th>
    </tr>
    </thead>
    <tbody>
    <?php $total =0 ?>
    @foreach($invoice->products as $k => $p)
        <tr>
            <td style="text-align: center">{{$k+1}}</td>
            <td>{{$p->product->title}}</td>
            <td style="text-align: center">{{$p->quantity}}</td>
            <td style="text-align: center">{{$p->price}}</td>
            <td style="text-align: right">{{__d(($p->price * $p->quantity),2)}}</td>
            <?php $total += ($p->price * $p->quantity); ?>
        </tr>
    @endforeach
    <tr>
        <td colspan="4" style="text-align: right">Net Total</td>
        <td style="text-align: right">{{__d($total)}}</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right">Delivery Charge</td>
        <td style="text-align: right">{{__d($invoice->delivery_charge)}}</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right">Tax({{$invoice->tax}}%)</td>
        <td style="text-align: right">{{($invoice->tax/100*$total)}}</td>
    </tr>

    <tr>
        <td colspan="4" style="text-align: right">Gross Total</td>
        <td style="text-align: right">{{__d($total + $invoice->delivery_charge + $invoice->tax/100*$total)}}</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right">Paid</td>
        <td style="text-align: right">{{__d($invoice->payments->sum('amount'))}}</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right">Total Due</td>
        <td style="text-align: right">{{__d($total + $invoice->delivery_charge + $invoice->tax/100*$total - $invoice->payments->sum('amount'))}}</td>
    </tr>
    </tbody>

</table>
<br>
<h4 style="text-decoration: underline">Payment Details:</h4>
@if(count($invoice->payments)>0)
    <div id="payment">
        <table class="main-table">
            <thead style="background-color: #ddd">
            <tr>
                <th>SL</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Trx No</th>
                <th>Date</th>
                <th>Info</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoice->payments as $k => $p)
                <tr>
                    <td style="text-align: center">{{$k+1}}</td>
                    <td style="text-align: center">{{$p->amount}}</td>
                    <td style="text-align: center">{{$p->method}}</td>
                    <td style="text-align: center">{{$p->trx_id}}</td>
                    <td style="text-align: center">{{date('d-m-y h:i a',strtotime($p->updated_at))}}</td>
                    <td style="text-align: center">{{$p->info}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endif
<h4 style="text-decoration: underline">Conditions:</h4>
<div class="condition">
    <ul>
        <li>Return Product applicable within 1 weeks.(condition apply)</li>
        <li>Product replacement available within 2 weeks.(condition apply)</li>
    </ul>
</div>
<br>
<h5 style="text-align: center">
    Thank you for your patience
</h5>
</body>
</html>