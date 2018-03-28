@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="purchase">Purchase</a></li>
        <li class="active">History</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Purchase History
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Customer ID</th>
                    <th>Payment Opt</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </fieldset>

    </div>

@endsection
