@extends('admin.layout.index') 

@section('content')
<link rel="stylesheet" href="admin/css/select2.min.css">
<style>
    .select2-container--default .select2-selection--single {
     background-color: transparent; 
     border: 0; 
     border-radius: 0; 
    border-bottom: 1px solid #ddd;
}
.select2-container--default .select2-selection--single:hover {
     background-color: transparent; 
     border: 0; 
     border-radius: 0; 
    border-bottom: 1px solid #ddd;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 28px;
    font-size: 17px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered:focus {
    box-shadow: 0px -2px 0px #673AB7 inset;
}
.select2-container--default .select2-search--dropdown .select2-search__field {
    border: 0px;
    box-shadow: 0px -2px 0px #673AB7 inset;
}
.select2-dropdown{
    border-radius: 0;
}
.select2-container .select2-selection--single{
    height: 38px;
}
</style>
<div class="col-md-9 mB">
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Sell</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Customer Info
            </legend>
            <form action="sell/store" class="form-horizontal" method="post" style="margin-bottom: 200px">
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
                            <label class="col-lg-3 control-label">ID</label>
                            <div class="col-lg-8">
                                <select name="customer_id" class="form-control s2">
                                    <option value="">Select</option>
                                    @foreach($phones as $p)
                                        <option value="{{$p->customer_id}}">{{$p->customer_id}}</option>
                                    @endforeach
                                </select>
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
                            <label class="col-lg-3 control-label">Mobile</label>
                            <div class="col-lg-8">
                                <select name="customer_phone" class="form-control s2">
                                    <option value="">Select</option>
                                    @foreach($phones as $p)
                                        <option value="{{$p->customer_phone}}">{{$p->customer_phone}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <legend>
                    Product List
                </legend>
                <div id="productList">
                    @include('admin.sell.product_list')
                </div>
                <hr>
                <div id="productInput">
                    <div class="row">
                        <div class="col-md-5">
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
                        <input type="hidden" name="pro_price" class="ppj spo">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Quantity</label>
                                <div class="col-lg-8">
                                    <input class="form-control spo" placeholder="Quantity" type="number" name="pro_quantity" min="1">
                                    <span class="help-block pqj"></span>
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
            </form>
        </fieldset>
    </div>
</div>
@endsection

@section('script') 
    @parent
    <script src="admin/js/select2.min.js"></script>
    <script>
    var s2 = $('.s2').select2({
        tags: true,
        tokenSeparators: [' ']
    });
    </script>
@endsection