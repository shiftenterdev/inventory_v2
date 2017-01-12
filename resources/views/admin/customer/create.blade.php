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
                        <input class="form-control" placeholder="Name" type="text" name="customer_name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Address</label>

                    <div class="col-lg-8">
                        <textarea name="customer_address" class="form-control" placeholder="Address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Phone</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Phone" type="text" name="customer_phone">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>

                    <div class="col-lg-8">
                        <input class="form-control" placeholder="Email" type="email" name="customer_email">
                    </div>
                </div>


                <hr>
                <div class="form-group">
                    <div class="col-lg-8 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </fieldset>

    </div>
@endsection

