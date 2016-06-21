@extends('admin.layout.index')


@section('content')

    <div class="col-md-9 mB">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Product</li>
        </ul>
        <div class="cN">
            <fieldset>
                <legend>
                    Add Product
                </legend>
                <form action="product/store" class="form-horizontal" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Category</label>

                        <div class="col-lg-8">
                            <select name="category_id" class="form-control parCat" required>
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
                            <select name="sub_category_id" class="form-control parSubCat">
                                <option value="">Sub Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Brand</label>

                        <div class="col-lg-8">
                            <select name="brand_id" class="form-control">
                                <option value="">Select Brand</option>
                                @foreach($brands as $b)
                                    <option value="{{$b->id}}">{{$b->brand_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Title</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Title" type="text" name="product_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Description</label>

                        <div class="col-lg-8">
                            <textarea name="product_description" class="form-control" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Price</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Price" type="text" name="product_price">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-8">
                            <div class="radio">
                                <input name="product_status" id="radio1" value="1" checked="" type="radio">
                                <label for="radio1">
                                    <mark></mark> Active
                                </label>
                            </div>
                            <div class="radio">
                                <input name="product_status" id="radio2" value="2" type="radio">
                                <label for="radio2">
                                    <mark></mark> Inactive
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Image</label>


                        <div class="col-lg-7">
                            <img src="preview.png" alt="" style="height:120px;max-width: 120px;margin-right: 20px" class="img-thumbnail prvImg">
                            <input type="hidden" name="product_image_id" id="imgIdVal">
                            <button class="btn btn-info uI" type="button">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                </form>
            </fieldset>

        </div>
    </div>
@endsection

