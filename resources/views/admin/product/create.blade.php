@extends('admin.layout.index')


@section('content')
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
                        <select name="category_id" class="form-control select" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->full_category}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Brand</label>

                    <div class="col-lg-8">
                        <select name="brand_id" class="form-control select">
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
                        <input class="form-control" placeholder="Title" type="text" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Description</label>

                    <div class="col-lg-8">
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Price</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Price" type="text" name="price">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Status</label>

                    <div class="col-lg-8">
                        <div class="radio">
                            <input name="status" id="radio1" value="1" checked="" type="radio">
                            <label for="radio1">
                                <mark></mark>
                                Active
                            </label>
                        </div>
                        <div class="radio">
                            <input name="status" id="radio2" value="2" type="radio">
                            <label for="radio2">
                                <mark></mark>
                                Inactive
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Image</label>


                    <div class="col-lg-8">
                        <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                            <input id="thumbnail" class="form-control" type="text" name="image">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
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
@endsection

@section('script')
    @parent
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        var prefix = "{{config('lfm.url_prefix')}}";
        $('#lfm').filemanager('image', {prefix: prefix});
    </script>
@stop

