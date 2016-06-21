@extends('admin.layout.index')


@section('content')

    <div class="col-md-9 mB">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Category</li>
        </ul>
        <div class="cN">
            <fieldset>
                <legend>
                    Add Category
                </legend>
                <form action="category/update/{{$category->id}}" class="form-horizontal" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Parent</label>

                        <div class="col-lg-6">
                            <select name="cat_parent_id" class="form-control">
                                <option value="">Select</option>
                                <option value="-1" {{$category->cat_parent_id=='-1'?'selected':''}}>No Parent</option>
                                @foreach($categories as $c)
                                    <option value="{{$c->id}}" {{$c->id==$category->cat_parent_id?'selected':''}}>{{$c->cat_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Title</label>

                        <div class="col-lg-6">
                            <input class="form-control" placeholder="Title" type="text" name="cat_title" value="{{$category->cat_title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </fieldset>

        </div>
    </div>
@endsection

