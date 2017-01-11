@extends('admin.layout.index')


@section('content')

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
                    <label class="col-lg-2 control-label">Product</label>

                    <div class="col-lg-8">
                        <select name="pro_id" class="form-control parProduct">
                            <option value="">Product</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Quantity</label>

                    <div class="col-lg-8">
                        <input type="text" name="pro_stock" class="form-control num" placeholder="Quantity">
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
                        <button type="submit" class="btn btn-primary">Add Stock</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

