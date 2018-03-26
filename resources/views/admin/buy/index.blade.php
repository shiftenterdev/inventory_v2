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
            {{csrf_field()}}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Mobile</label>

                        <div class="col-lg-8">
                            <input type="text" name="customer_phone" class="form-control" placeholder="Mobile">
                        </div>
                        <div class="col-lg-1">
                            <button class="btn btn-primary check-customer" type="button"><i
                                        class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Name" type="text" name="customer_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email</label>

                        <div class="col-lg-8">
                            <input type="email" name="customer_email" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Address" type="text" name="customer_address">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Invoice No</label>

                        <div class="col-lg-6">
                            <input type="text" name="invoice_no" class="form-control" placeholder="Invoice No"
                                   required value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Invoice SL</label>

                        <div class="col-lg-6">
                            <input type="text" name="invoice_sl" class="form-control" placeholder="Invoice Sl"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Invoice Date</label>

                        <div class="col-lg-6">
                            <input type="text" name="invoice_date" class="form-control date" placeholder="Date"
                                   required>
                        </div>
                    </div>
                </div>



            </div>
            <legend>Product List</legend>

            <div class="row">
                <div class="col-md-12">
                    <div id="productList">
                        @include('admin.common.product_list')
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Invoice</button>
                    </div>
                </div>
            </div>
            <hr>
        </form>
    </fieldset>
@endsection
@section('script')
    @parent
    <script>
        $(".check-customer").on('click', function (e) {
            var phone = $('input[name=customer_phone]').val();
            if (phone != '') {
                load.on();
                $.get('ajax/customer-by-phone/' + phone).done(function (result) {

                    if (result.length == 0) {
                        load.off();
                        // alert('No Result');
                        $('input[name=customer_address]').val('');
                        $('input[name=customer_name]').val('');
                        $('input[name=customer_id]').val('');
                    } else {
                        $('input[name=customer_address]').val(result.customer_address);
                        $('input[name=customer_name]').val(result.customer_name);
                        $('input[name=customer_id]').val(result.customer_id);
                        load.off();
                    }
                });
            } else {
                alert('Please enter customer phone number.');
            }
        });

        $('#productList').on('change', '#pro_code', function () {
            // e.preventDefault();
            if ($(this).val() !== '') {
                load.on();
                var product = {
                    code: $(this).val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                };

                $.post('purchase/add-product', product).done(function (result) {
                    $('.spo').val('');
                    reloadTable();
                });
            }
        });

        $('#productList').on('click', '.rSI', function () {
            load.on();
            var v = $(this).data('code');
            $.get('purchase/remove-product/' + v).done(function (result) {
                reloadTable();
            });
        });

        $('#productList').on('change', '.pq-s', function () {
            load.on();
            var v = $(this).data('code');
            var q = $(this).val();
            $.get('purchase/update-product/' + v + '/' + q).done(function (result) {
                reloadTable();
            });
        });

        $('#productList').on('change', '.pd-s', function () {
            load.on();
            var v = $(this).data('code');
            var q = $(this).val();
            $.get('purchase/discount-product/' + v + '/' + q).done(function (result) {
                reloadTable();
            });
        });
        $('#productList').on('change', '.tax', function () {
            load.on();
            var q = $(this).val();
            $.get('purchase/add-tax/' + q).done(function (result) {
                reloadTable();
            });
        });
        $('#productList').on('change', '.dc', function () {
            load.on();
            var q = $(this).val();
            $.get('purchase/add-charge/' + q).done(function (result) {
                reloadTable();
            });
        });

        var reloadTable = function () {
            $('#productList').load('purchase/product-list', function () {
                $('.select').selectize();
                load.off();
            });
        }
    </script>
@endsection
