<form class="form-horizontal" method="post" action="product/create">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label class="col-lg-2 control-label">Title</label>

        <div class="col-lg-10">
            <input class="form-control" placeholder="Title" type="text" name="pro_title">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Description</label>

        <div class="col-lg-10">
            <textarea name="pro_description" class="form-control" placeholder="Description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Price</label>

        <div class="col-lg-10">
            <input class="form-control" placeholder="Price" type="text" name="pro_price">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Status</label>
        <div class="col-lg-10">
            <div class="radio">
                <label>
                    <input name="pro_status" value="1" checked="" type="radio">
                    Active
                </label>
            </div>
            <div class="radio">
                <label>
                    <input name="pro_status" value="2" type="radio">
                    Inactive
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Image</label>


        <div class="col-lg-7">
            <input type="text" class="form-control" name="pro_image_id">
        </div>
        <div class="col-lg-1">
            <button class="btn btn-info uI" type="button">Upload</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>