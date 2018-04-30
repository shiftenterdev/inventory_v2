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
                        <td> : <strong>{{$invoice->customer->name or ''}}</strong></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : <strong>{{$invoice->customer->email or ''}}</strong></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td> : <strong>{{$invoice->customer->address or ''}}</strong></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td> : <strong>{{$invoice->customer->mobile or ''}}</strong></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h5>Invoice Information</h5>
                <table>
                    <tr>
                        <td>Invoice date</td>
                        <td> : <strong>{{$invoice->invoice_date}}</strong></td>
                    </tr>
                    <tr>
                        <td>Invoice No</td>
                        <td> : <strong>{{$invoice->invoice_no}}</strong></td>
                    </tr>
                    <tr>
                        <td>Invoice Sl</td>
                        <td> : <strong>{{$invoice->invoice_sl}}</strong></td>
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
            @foreach($invoice->products as $k => $p)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$p->product->title}}</td>
                    <td class="text-center">{{$p->quantity}}</td>
                    <td class="text-right">{{money($p->product->price)}}</td>
                    <td class="text-right">{{money($p->product->price * $p->quantity)}}</td>
                    <?php $total += $p->product->price * $p->quantity ?>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right">Net Total</td>
                <td class="total text-right">{{money($total)}}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Delivery Charge</td>
                <td class="total text-right">{{money($invoice->delivery_charge)}}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Tax({{$invoice->tax}}%)</td>
                <td class="total text-right">{{money($invoice->tax/100*$total)}}</td>
            </tr>

            <tr>
                <td colspan="4" class="text-right">Gross Total</td>
                <td class="g-t text-right">{{money($total + $invoice->delivery_charge + $invoice->tax/100*$total)}}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Paid</td>
                <td class="g-t text-right">{{money($invoice->payments->sum('amount'))}}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Total Due</td>
                <td class="g-t text-right">{{money($total + $invoice->delivery_charge + $invoice->tax/100*$total - $invoice->payments->sum('amount'))}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <h5>Payment Details</h5>
    @if(count($invoice->payments)>0)
        <div id="payment">
            <table class="table table-bordered table-stripped">
                <thead>
                <tr class="t-imp">
                    <th>SL</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Trx No</th>
                    <th>Date</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoice->payments as $k => $p)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$p->amount}}</td>
                        <td>{{$p->method}}</td>
                        <td>{{$p->trx_id}}</td>
                        <td>{{$p->updated_at}}</td>
                        <td><a href="payment/delete/{{$p->id}}" class="btn btn-danger"><i
                                        class="fa fa-times"></i></a></td>
                    </tr>
                @endforeach
            </table>
            </table>
        </div>
    @endif
    <form class="form-inline" method="post" action="payment/store">
        {{csrf_field()}}
        <input type="hidden" name="invoice_no" value="{{$invoice->invoice_no}}">
        <div class="form-group">
            <label for="exampleInputName2">Amount</label>
            <input type="text" class="form-control" id="exampleInputName2" name="amount" placeholder="Amount">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Method</label>
            <select name="payment_method" id="" class="form-control" required>
                <option value="">Select Method</option>
                <option value="Cash">Cash</option>
                <option value="Card">Card</option>
                <option value="bKash">bKash</option>
                <option value="Cheque">Cheque</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Trx Id</label>
            <input type="text" class="form-control" id="exampleInputEmail2" name="trx_id" placeholder="Trx ID">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Other Info</label>
            <input type="text" class="form-control" id="exampleInputEmail2" name="info" placeholder="Other Info">
        </div>
        <button type="submit" class="btn btn-default">Save Payment</button>
    </form>
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