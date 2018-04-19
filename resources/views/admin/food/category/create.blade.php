@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Food</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Food Category
            </legend>
            <form action="food/category/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">




                <div class="form-group">
                    <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Title" type="text" name="title">
                    </div>
                </div>


                <hr>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Add Food Category</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

