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
                    <button class="btn btn-sm btn-primary nB pull-right add-product"><i class="fa fa-plus"></i> New Product</button>
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
                    @foreach($products as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->pro_title}}</td>
                            <td>{{$p->pro_stock}}</td>
                            <td>{{$p->pro_price}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </fieldset>

        </div>
    </div>

    <div class="modal" id="productModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Product</h4>
                </div>
                <div class="modal-body">
                    @include('admin.product.form')
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @parent
    <script>
        $('.add-product').on('click',function(){
            $('#productModal').modal('show');
        });
    </script>
@stop