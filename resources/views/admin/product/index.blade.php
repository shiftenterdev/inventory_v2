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
                        <th>Status</th>
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
                            <td>{{$p->pro_status==1?'Active':'Inactive'}}</td>
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

    @include('admin.layout.img_modal')
@endsection

@section('script')
    @parent
    <script>
        $('.add-product').on('click',function(){
            $('#productModal').modal('show');
        });
        var uBt = '';
        $('.uI').on('click',function(){
            uBt = $(this);
            $('#aIL').load('ajax/images',function(){
                $('#productModal').modal('hide');
                $('#imgModal').modal('show');
            });

        });
        $('#imgModal').on('hidden.bs.modal', function () {
            $('#productModal').modal('show');
        });
        $('.uui').on('click',function(){
            $('.img-upload').click();
        });

        $('body').on('click','#aIL .dImg',function(){
            var id = $(this).data('id');
            $.get('ajax/delete-image/'+id).done(function(){
                $('#aIL').load('ajax/images');
            });
        });

        $('body').on('click','#aIL .gImg',function(){
            var id = $(this).data('id');
            $.get('ajax/image-name/'+id).done(function(result){
                $('#imgModal').modal('hide');
                $('input[name=pro_image_id]').val(result);
            });
        });

        $('.img-upload').on('change', function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            if (this.files[0].size / 1024 > 512) {
                alert('File size cannot greater than 500KB');
                return false;
            }

            var myFormData = new FormData();
            myFormData.append('image', $(this).prop("files")[0]);
            myFormData.append('_token', CSRF_TOKEN);


            $.ajax({
                url: 'ajax/upload-image',
                type: 'POST',
                processData: false, // important
                contentType: false, // important
                dataType: 'json',
                data: myFormData,
                success: function (rs) {
                    $('#aIL').load('ajax/images');
                }
            });


        });
    </script>
@stop