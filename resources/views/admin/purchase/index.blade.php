@extends('admin.layout.index')

@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Purchase</li>
    </ul>
    <fieldset style="margin-bottom: 200px">
        <legend>
            Customer Info
        </legend>
        <form action="purchase/save" method="post" id="customerForm" class="form-horizontal">
            @include('admin.common.invoice_head')


            <legend>Product List</legend>

            <div class="row">
                <div class="col-md-12">
                    <div id="productList">
                        @include('admin.common.product_list')
                    </div>
                    @if(count($invoice->payments)>0)
                    <div id="payment">
                        <legend>Payment</legend>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="t-imp">
                                <th>SL</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Trx No</th>
                                <th>Date</th>
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
                                </tr>
                            @endforeach
                        </table>
                        </table>
                    </div>
                    @endif
                    <div class="text-center">
                        <button type="button" class="btn btn-danger openRight"><i class="fa fa-money"></i> Payment
                        </button>
                        <button type="submit" class="btn btn-info">Save Invoice</button>
                    </div>
                </div>
            </div>
            <hr>
        </form>
    </fieldset>
    @extends('admin.layout.right',['title'=>'Order Payment'])
@section('slot')
    <form action="payment/store" class="form-horizontal" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="invoice_no" value="{{request()->invoice}}">
        <div class="first-option">
            <div class="form-group">
                <label for="">Amount</label>
                <input type="text" name="amount" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Method</label>
                <select name="payment_method" id="" class="form-control select">
                    <option value="Cash">Cash</option>
                    <option value="Card">Card</option>
                    <option value="bKash">bKash</option>
                    <option value="Cheque">Cheque</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Trx ID/Chq No</label>
                <input type="text" name="trx_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Other Info</label>
                <input type="text" class="form-control" name="info">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Payment</button>
        </div>
    </form>
@stop
@endsection

@section('script')
    @parent
    <script>

        $('#productList').on('change', '#pro_code', function () {
            // e.preventDefault();
            if ($(this).val() !== '') {
                load.on();
                var product = {
                    code: $(this).val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                };

                $.post('purchase/product/add/', product).done(function (result) {
                    $('.spo').val('');
                    reloadTable();
                });
            }
        });

        $('#productList').on('click', '.rSI', function () {
            load.on();
            var v = $(this).data('code');
            $.get('purchase/product/remove/' + v).done(function (result) {
                reloadTable();
            });
        });

        $('#productList').on('change', '.pq-s', function () {
            load.on();
            var v = $(this).data('code');
            var q = $(this).val();
            $.get('purchase/product/update/' + v + '/' + q).done(function (result) {
                reloadTable();
            });
        });

        $('#productList').on('change', '.pd-s', function () {
            load.on();
            var v = $(this).data('code');
            var q = $(this).val();
            $.get('purchase/product/discount/' + v + '/' + q).done(function (result) {
                reloadTable();
            });
        });
        $('#productList').on('change', 'input[name=other_discount]', function () {
            load.on();
            var q = $(this).val();
            $.get('purchase/other_discount/' + q).done(function (result) {
                reloadTable();
            });
        });

        $('#productList').on('change', 'input[name=tax]', function () {
            load.on();
            var q = $(this).val();
            $.get('purchase/tax/' + q).done(function (result) {
                reloadTable();
            });
        });

        $('#productList').on('change', 'input[name=delivery_charge]', function () {
            load.on();
            var q = $(this).val();
            $.get('purchase/charge/' + q).done(function (result) {
                reloadTable();
            });
        });

        var reloadTable = function () {
            $('#productList').load('purchase/products', function () {
                $('.select').selectize();
                load.off();
            });
        };
    </script>
@endsection
