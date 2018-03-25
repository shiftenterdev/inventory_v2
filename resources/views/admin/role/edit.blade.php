@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Role</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Edit Role
            </legend>
            <form action="role/update/{{$role->id}}" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">



                <div class="form-group">
                    <label class="col-lg-2 control-label">Role</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Role" type="text" name="title" value="{{$role->title}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Slug</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Slug" type="text" name="slug" value="{{$role->slug}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Permissions</label>

                    <div class="col-lg-6">
                        @foreach($permissions as $k=> $p)
                            <div class="checkbox">
                                <input name="permission_id[]" id="radio{{$k}}" value="{{$p->id}}" type="checkbox" {{$role->hasPermission($p->slug)?'checked':''}}>
                                <label for="radio{{$k}}">
                                    <mark></mark>
                                    {{$p->title}}
                                </label>
                            </div>
                            <br>
                        @endforeach
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
