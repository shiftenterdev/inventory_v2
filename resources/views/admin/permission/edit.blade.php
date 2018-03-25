@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Permission</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Update Role
            </legend>
            <form action="permission/update/{{$permission->id}}" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">



                <div class="form-group">
                    <label class="col-lg-2 control-label">Permission</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Permission" type="text" name="title" value="{{$permission->title}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Slug</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Slug" type="text" name="slug" value="{{$permission->slug}}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="button" onclick="history.back()" class="btn btn-warning">Back</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection
