@extends('admin.layout.index') 

@section('content')

<div class="col-md-9 mB">
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Sell</li>
    </ul>
    <div class="cN">
        <fieldset style="margin-bottom: 200px">
            <legend>
                Customer Info
            </legend>
                
                <div class="row">
                <form action="javascript:" id="customerForm" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                <input class="form-control" placeholder="Email" type="text" name="customer_email">
                            </div>
                        </div>
                    </div>
                    
                </form>
                </div>
                <legend>
                    Product List
                </legend>
                <div id="productList">
                    @include('admin.sell.product_list')
                </div>
                <hr>
                <div id="productInput">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-5">
                            <div class="form-group">
                                <label class="col-lg-5 control-label">Product Code</label>
                                <div class="col-lg-6">
                                    <select name="pro_code" id="pro_code" class="form-control spo">
                                        <option value="">Select</option>
                                        @foreach($products as $p)
                                            <option value="{{$p->pro_code}}">{{$p->pro_code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-info add-pro-s"><i class="fa fa-plus"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
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
            }else{
                $('input[name=customer_address]').val(result.customer_address);
                $('input[name=customer_name]').val(result.customer_name);
                $('input[name=customer_email]').val(result.customer_email);
                load.off();
            }
        });
        }else{
            alert('Please enter customer phone number.');
        }
    });
    </script>
@endsection