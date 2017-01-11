@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Payment</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Add Payment
            </legend>
            <form action="discount/store" class="form-horizontal" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label class="col-lg-2 control-label">Product</label>

                    <div class="col-lg-6">
                        <select name="product_id" class="form-control">
                            <option value="">Select</option>
                            @foreach($products as $p)
                                <option value="{{$p->id}}">{{$p->pro_title}} [{{$p->pro_code}}]</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Payment Type</label>

                    <div class="col-lg-6">
                        <div class="radio">
                            <input name="type" id="radio1" value="1" checked="" type="radio">
                            <label for="radio1">
                                <mark></mark>
                                Inward
                            </label>
                        </div>
                        <div class="radio">
                            <input name="type" id="radio2" value="2" type="radio">
                            <label for="radio2">
                                <mark></mark>
                                Forward
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Amount</label>

                    <div class="col-lg-6">
                        <input class="form-control" placeholder="Amount" type="text" name="amount">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Method</label>

                    <div class="col-lg-6">
                        <div class="radio">
                            <input name="method" id="radio1" value="1" checked="" type="radio">
                            <label for="radio1">
                                <mark></mark>
                                Cheque
                            </label>
                        </div>
                        <div class="radio">
                            <input name="method" id="radio2" value="2" type="radio">
                            <label for="radio2">
                                <mark></mark>
                                Cash
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Date</label>
                    <div class="col-lg-6">
                        <input type="date" placeholder="Date" name="date" class="form-control">
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
