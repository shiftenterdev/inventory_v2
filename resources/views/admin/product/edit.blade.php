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
                    Update Product
                </legend>
                <form action="product/update/{{$product->id}}" class="form-horizontal" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Category</label>

                        <div class="col-lg-8">
                            <select name="pro_cat_id" class="form-control parCat" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $c)
                                    <option value="{{$c->id}}" {{$c->id==$product->pro_cat_id?'selected':''}}>{{$c->cat_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Sub Category</label>

                        <div class="col-lg-8">
                            <select name="pro_subcat_id" class="form-control parSubCat">
                            <option value="{{$sub_cat->id}}">{{$sub_cat->cat_title}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Brand</label>

                        <div class="col-lg-8">
                            <select name="brand_id" class="form-control">
                                <option value="">Select Brand</option>
                                @foreach($brands as $b)
                                    <option value="{{$b->id}}" {{$product->brand_id==$b->id?'selected':''}}>{{$b->brand_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Title</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Title" type="text" name="pro_title" value="{{$product->pro_title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Description</label>

                        <div class="col-lg-8">
                            <textarea name="pro_description" class="form-control" placeholder="Description">{{$product->pro_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Price</label>

                        <div class="col-lg-8">
                            <input class="form-control" placeholder="Price" type="text" name="pro_price" value="{{$product->pro_price}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-8">
                            <div class="radio">
                                <label>
                                    <input name="pro_status" value="1" {{$product->pro_status=='1'?'checked':''}} type="radio">
                                    Active
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="pro_status" value="2" {{$product->pro_status=='2'?'checked':''}} type="radio">
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Image</label>


                        <div class="col-lg-7">
                            @if(isset($image))
                            <img src="/uploads/{{$image}}" alt="" style="height:120px;max-width: 120px;margin-right: 20px" class="img-thumbnail prvImg">
                            @else
                            <img src="preview.jpeg" alt="" style="height:120px;max-width: 120px;margin-right: 20px" class="img-thumbnail prvImg">
                            @endif
                            <input type="hidden" name="pro_image_id" id="imgIdVal" value="{{$product->pro_image_id}}">
                            <button class="btn btn-info uI" type="button">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </div>
                </form>
            </fieldset>

        </div>
    </div>
@endsection

