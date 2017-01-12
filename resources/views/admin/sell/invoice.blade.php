@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Product</li>
    </ul>
    <div class="cN">
        <div class="row">
            <div class="col-md-6">
                <h5>Customer Information</h5>

                <table>
                    <tr>
                        <td>Name</td>
                        <td> : <strong>{{$invoice->customer->customer_name}}</strong></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td> : <strong>{{$invoice->customer->customer_address}}</strong></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td> : <strong>{{$invoice->customer->customer_phone}}</strong></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h5>Invoice Information</h5>
                <table>
                    <tr>
                        <td>Invoice date</td>
                        <td> : <strong>{{date('d-m-Y',strtotime($invoice->created_at))}}</strong></td>
                    </tr>


                </table>
            </div>
        </div>

        <br>
        <h5>Product Details</h5>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>SL</th>
                <th>Product Info</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th width="20%">Total Price</th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0; ?>
            @foreach($invoice->details as $k => $p)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$p->product->pro_title}}</td>
                    <td class="text-center">{{$p->quantity}}</td>
                    <td class="text-right">{{money($p->product->pro_price)}}</td>
                    <td class="text-right">{{money($p->product->pro_price * $p->quantity)}}</td>
                    <?php $total += $p->product->pro_price * $p->quantity ?>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right">Net Total</td>
                <td class="total text-right">{{money($total)}}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Delivery Charge</td>
                <td class="total text-right">{{$invoice->delivery_charge}}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Tax({{$invoice->tax}}%)</td>
                <td class="total text-right">{{money($invoice->tax/100*$total)}}</td>
            </tr>

            <tr>
                <td colspan="4" class="text-right">Gross Total</td>
                <td class="g-t text-right">{{money($total + $invoice->delivery_charge + $invoice->tax/100*$total)}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="margin-bottom: 150px"></div>

@endsection

@section('script')
    @parent
    <script>
        $('.s-t').on('keyup', function () {
            var tax = $(this).val() == '' ? 0 : $(this).val();
            tax = parseFloat(tax);
            var total = parseFloat($('.total').text());
            $('.g-t').text((total + tax * total / 100).toFixed(2));
        });
    </script>
@endsection