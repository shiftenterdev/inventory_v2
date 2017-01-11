@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Brand</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Update Brand
            </legend>
            <form action="brand/update/{{$brand->id}}" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Title" type="text" name="brand_title" value="{{$brand->brand_title}}" required>
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
                        <input type="hidden" name="brand_logo_id" id="imgIdVal">
                        <button class="btn btn-info uI" type="button">Upload</button>
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
@endsection

