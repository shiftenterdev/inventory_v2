@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Role</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Role
            </legend>
            <form action="role/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">



                <div class="form-group">
                    <label class="col-lg-2 control-label">Role</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Role" type="text" name="role">
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
