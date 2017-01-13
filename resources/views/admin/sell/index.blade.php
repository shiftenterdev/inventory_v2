@extends('admin.layout.index')

@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Sell</li>
    </ul>
    <fieldset style="margin-bottom: 200px">
        <legend>
            Customer Info
        </legend>
        <form action="sell/save-invoice" method="post" id="customerForm" class="form-horizontal">
            <div class="row">
                {{csrf_field()}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Mobile</label>

                        <div class="col-lg-8">
                            <input type="text" name="customer_phone" class="form-control" placeholder="Mobile"
                                   required>
                        </div>
                        <div class="col-lg-1">
                            <button class="btn btn-primary check-customer" type="button"><i
                                        class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Name" type="text" name="customer_name"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Address" type="text" name="customer_address"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Email" type="text" name="customer_email">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="col-lg-3 control-label">Invoice Date</label>

                    <div class="col-lg-6">
                        <input type="text" name="invoice_date" class="form-control date" placeholder="Date"
                               required>
                    </div>
                </div>
            </div>
            <legend>
                Product List
            </legend>

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
                    } else {
                        $('input[name=customer_address]').val(result.customer_address);
                        $('input[name=customer_name]').val(result.customer_name);
                        $('input[name=customer_email]').val(result.customer_email);
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
                    pro_code: $(this).val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                };

                $.post('sell/add-product', product).done(function (result) {
                    $('.spo').val('');
                    $('#productList').load('sell/product-list', function () {
                        $('.select').selectize();
                        load.off();
                    });
                });
            }
        });

        $('#productList').on('click', '.rSI', function () {
            load.on();
            var v = $(this).data('code');
            $.get('sell/remove-product/' + v).done(function (result) {
                $('#productList').load('sell/product-list', function () {
                    $('.select').selectize();
                    load.off();
                });
            });
        });

        $('#productList').on('change', '.pq-s', function () {
            load.on();
            var v = $(this).data('code');
            var q = $(this).val();
            $.get('sell/update-product/' + v + '/' + q).done(function (result) {
                $('#productList').load('sell/product-list', function () {
                    $('.select').selectize();
                    load.off();
                });
            });
        });

        $('#productList').on('change', '.pd-s', function () {
            load.on();
            var v = $(this).data('code');
            var q = $(this).val();
            $.get('sell/discount-product/' + v + '/' + q).done(function (result) {
                $('#productList').load('sell/product-list', function () {
                    $('.select').selectize();
                    load.off();
                });
            });
        });
        $('#productList').on('change', '.tax', function () {
            load.on();
            var q = $(this).val();
            $.get('sell/add-tax/' + q).done(function (result) {
                $('#productList').load('sell/product-list', function () {
                    $('.select').selectize();
                    load.off();
                });
            });
        });
        $('#productList').on('change', '.dc', function () {
            load.on();
            var q = $(this).val();
            $.get('sell/add-charge/' + q).done(function (result) {
                $('#productList').load('sell/product-list', function () {
                    $('.select').selectize();
                    load.off();
                });
            });
        });
    </script>
@endsection
