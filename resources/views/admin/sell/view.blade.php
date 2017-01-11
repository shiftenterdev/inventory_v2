@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Sell Invoice</li>
    </ul>
    <div class="cN" id="printDiv">
        <fieldset>
            <legend>
                Sell Invoice
                <div class="pull-right">
                    Invoice # {{$result->invoice_id}}
                    <button class="btn btn-info btn-sm print"><i class="fa fa-print"></i> Print Invoice</button>
                </div>

            </legend>
            <div class="customer-info">
                <table>
                    <tr>
                        <td>Name</td>
                        <td> : <strong>{{$result->customer->customer_name}}</strong></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td> : <strong>{{$result->customer->customer_address}}</strong></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : <strong>{{$result->customer->customer_email}}</strong></td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td> : <strong>{{$result->customer->customer_phone}}</strong></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td> : <strong>{{date('d F, Y',strtotime($result->updated_at))}}</strong></td>
                    </tr>
                </table>
            </div>
            <hr>
            <?php $total = 0; ?>
            <div class="product-info">
                <table class="table">
                    <thead style="background-color: #ddd">
                    <th>SL</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Unit Prict</th>
                    <th>Total Prict</th>
                    </thead>
                    <tbody>
                    @foreach($result->products as $k => $p)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$p->pro_code}}</td>
                            <td>{{$p->pro_quantity}}</td>
                            <td>{{$p->pro_price}}</td>
                            <td>{{$p->pro_price * $p->pro_quantity}}</td>
                            <?php $total += $p->pro_price * $p->pro_quantity ?>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <?php $tax = $total / 100 * $result->sells_discount ?>
                        <td colspan="4" class="text-right">Tax ({{$result->sells_discount}}%)</td>
                        <td>{{$tax}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Grand Total</td>
                        <td>{{$total+$tax}}</td>
                    </tr>
                    </tfoot>
                </table>
                <br>
                <hr>
                <div class="condition">
                    <ul>
                        <li>Return Product applicable within 1 weeks.(condithon apply)</li>
                        <li>Product replacement available within 2 weeks.(condition apply)</li>
                    </ul>
                </div>
                <br>
                <h5 class="text-center">
                    Thank you for your patience
                </h5>
            </div>
        </fieldset>

    </div>

@endsection
