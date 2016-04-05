@extends('admin.layout.index') @section('content')
<div class="col-md-9 mB">
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Sell</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Sell Product
            </legend>
            <form action="sell/store" class="form-horizontal" method="post">
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
                                <input class="form-control" placeholder="Customer ID" type="text" name="customer_id">
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
                                <input class="form-control" placeholder="Mobile" type="text" name="customer_phone">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <legend>Product List</legend>
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
            <br>
            <br>
        </fieldset>
    </div>
</div>
@endsection
