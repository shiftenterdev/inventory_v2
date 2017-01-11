@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Brand</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Brand
            </legend>
            <form action="brand/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Title</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Title" type="text" name="brand_title" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Image</label>


                    <div class="col-lg-7">
                        <img src="preview.png" alt="" style="height:120px;max-width: 120px;margin-right: 20px"
                             class="img-thumbnail prvImg">
                        <input type="hidden" name="brand_logo_id" id="imgIdVal">
                        <button class="btn btn-info uI" type="button">Upload</button>
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

