@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Refund</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                New Refund
            </legend>
            <form action="refund/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Sell ID</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Sell ID" type="text" name="sell_id">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Customer ID</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Customer ID" type="test" name="customer_id">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Product List</label>

                    <div class="col-lg-8">
                        <select name="pro_list" class="form-control">
                            <option value="">Select</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Quantity</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Product Quantity" type="test" name="pro_quantity">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Price</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Product Price" type="test" name="pro_price"
                               readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Type</label>

                    <div class="col-lg-8">
                        <div class="radio">
                            <label>
                                <input name="refund_type" value="1" checked="checked" type="radio" id="radio1">
                                <label for="radio1">
                                    <mark></mark>
                                    Refund
                                </label>

                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input name="refund_type" value="2" type="radio" id="radio2">
                                <label for="radio2">
                                    <mark></mark>
                                    Return
                                </label>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Reason</label>

                    <div class="col-lg-8">
                        <textarea name="reason" class="form-control" placeholder="Reason"></textarea>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Add Refund</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

