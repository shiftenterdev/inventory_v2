@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Customer</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Customer
            </legend>
            <form action="customer/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Name</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Name" type="text" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Address</label>

                    <div class="col-lg-8">
                        <textarea name="address" class="form-control" placeholder="Address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Phone</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Phone" type="text" name="mobile">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Email" type="email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Account Balance</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Account Balance" type="text" name="balance">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Status</label>

                    <div class="col-lg-8">
                        <div class="radio">
                            <input name="status" id="radio1" value="1" checked="" type="radio">
                            <label for="radio1">
                                <mark></mark>
                                Active
                            </label>
                        </div>
                        <div class="radio">
                            <input name="status" id="radio2" value="2" type="radio">
                            <label for="radio2">
                                <mark></mark>
                                Inactive
                            </label>
                        </div>
                    </div>
                </div>


                <hr>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="button" class="btn btn-warning" onclick="history.back()">Back</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

