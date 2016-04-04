@extends('admin.layout.index')


@section('content')

    <div class="col-md-9 mB">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Stock</li>
        </ul>
        <div class="cN">
            <fieldset>
                <legend>
                    Add Stock
                </legend>
                <form action="stock/store" class="form-horizontal" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Category</label>

                        <div class="col-lg-8">
                            <select class="form-control parCat">
                                <option value="">Select Category</option>
                                @foreach($categories as $c)
                                    <option value="{{$c->id}}">{{$c->cat_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Sub Category</label>

                        <div class="col-lg-8">
                            <select class="form-control parSubCat">
                                <option value="">Sub Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Product</label>

                        <div class="col-lg-8">
                            <select name="pro_id" class="form-control parProduct">
                                <option value="" >Product</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Quantity</label>

                        <div class="col-lg-8">
                            <input type="number" name="pro_stock" class="form-control" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Price</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Price" type="text" name="pro_price">
                        </div>
                    </div>

                    
                    <hr>
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </fieldset>

        </div>
    </div>
@endsection

