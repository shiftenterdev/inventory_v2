@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Category</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Category
            </legend>
            <form action="category/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Parent</label>

                    <div class="col-lg-6">
                        <select name="cat_parent_id" class="form-control select">
                            <option value="">Select</option>
                            <option value="-1">No Parent</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->cat_title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Title" type="text" name="cat_title">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

