@extends('admin.layout.index')


@section('content')

<div class="col-md-9 mB">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Product</li>
            </ul>
            <div class="cN">
                <fieldset>
                    <legend>
                        Product List
                        <a href="" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New Product</a>
                    </legend>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>

            </div>
        </div>

@endsection