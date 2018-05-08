@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Payment</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Payment
            </legend>
            <form action="payment/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Select Order/Invoice No</label>

                    <div class="col-lg-6">
                        <select name="invoice_no" class="form-control select">
                            <option value="">Select</option>
                            @foreach($invoices as $p)
                                <option value="{{$p->invoice_no}}">{{$p->invoice_no}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-lg-2 control-label">Amount</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Amount" type="text" name="amount">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Method</label>

                    <div class="col-lg-6">
                        <select name="payment_method" id="" class="form-control">
                            <option value="Cash">Cash</option>
                            <option value="Card">Card</option>
                            <option value="bKash">bKash</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">TRX ID/ CHQ NO</label>

                    <div class="col-lg-6">
                        <input type="text" name="trx_id" class="form-control" placeholder="Trx ID">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Bank/Other Info</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="info" placeholder="Bank / Other Info">
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Save Payment Information</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection
