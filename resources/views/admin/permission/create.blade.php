@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Permission</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Role
            </legend>
            <form action="permission/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">



                <div class="form-group">
                    <label class="col-lg-2 control-label">Permission</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Permission" type="text" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Slug</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Slug" type="text" name="slug">
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
