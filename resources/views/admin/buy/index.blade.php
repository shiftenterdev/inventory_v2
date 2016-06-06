@extends('admin.layout.index')

@section('content')

<div class="col-md-9 mB">
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Purchase</li>
    </ul>
    <div class="cN">
        <fieldset style="margin-bottom: 200px">
            <legend>
                Customer Info
            </legend>
            <form action="javascript:" id="customerForm" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                                <input class="form-control" placeholder="Name" type="text" name="customer_name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Mobile</label>
                            <div class="col-lg-6">
                                <input type="text" name="customer_phone" class="form-control" placeholder="Mobile">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-primary check-customer" type="button"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Address</label>
                            <div class="col-lg-8">
                                <input class="form-control" placeholder="Address" type="text" name="customer_address">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-8">
                                <input type="email" name="customer_email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <legend>Product List</legend>
                <div id="productList">
                    @include('admin.buy.product_list')
                </div>
                <hr>
            </form>
        </fieldset>
    </div>
</div>
@endsection
@section('script')
    @parent
    <script>
    $(".check-customer").on('click', function (e) {
        var phone = $('input[name=customer_phone]').val();
        if(phone != ''){
            load.on();
            $.get('ajax/customer-by-phone/'+phone).done(function(result){

            if(result.length==0){
                load.off();
                // alert('No Result');
                $('input[name=customer_address]').val('');
                $('input[name=customer_name]').val('');
                $('input[name=customer_id]').val('');
            }else{
                $('input[name=customer_address]').val(result.customer_address);
                $('input[name=customer_name]').val(result.customer_name);
                $('input[name=customer_id]').val(result.customer_id);
                load.off();
            }
        });
        }else{
            alert('Please enter customer phone number.');
        }
    });
    </script>
@endsection
