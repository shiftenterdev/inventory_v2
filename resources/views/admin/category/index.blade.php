@extends('admin.layout.index')


@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css"/>
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Category</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Category List
                <a href="category/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New
                    Category</a>
            </legend>
            <div class="col-md-3">
                <div class="well">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">New Category</button>
                    <a href="javascript:" class="btn btn-info edit">Edit Category</a>
                    <br><br>
                    <div class="tree-view">

                    </div>
                </div>
            </div>
            <div class="col-md-9 lp">

                <table class="table table-bordered" hidden>
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Title</th>
                        <th>Full Category</th>
                        <th>Products</th>
                        <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $k=>$c)
                        <tr>
                            <td>{{$k+1}}</td>
                            <td>{{$c->title}}</td>
                            <td>{{$c->full_category}}</td>
                            <td>{{$c->product_count}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="category/edit/{{$c->id}}" class="btn btn-sm btn-warning"><i
                                                class="fa fa-pencil"></i></a>
                                    <a href="category/delete/{{$c->id}}" class="btn btn-sm btn-danger confirm"><i
                                                class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Category</h4>
                </div>
                <div class="modal-body">
                    <form action="category/store" class="form-horizontal" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="parent_id">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Title</label>

                            <div class="col-lg-9">
                                <input class="form-control" placeholder="Title" type="text" name="title">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary">Save Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script>
        var categoryId;
        $(function () {
            var arrayCollection = {!! json_encode($trees) !!};
            var $treeview = $(".tree-view");
            $treeview.jstree({
                "core" : {
                    "data":arrayCollection,
                    "check_callback" : true
                },
                "plugins": ["dnd","wholerow","state"],
                'contextmenu' : {
                    'items': function (node) {
                        var tmp = $.jstree.defaults.contextmenu.items();
                        delete tmp.create.action;
                        return tmp;
                    }
                }
            }).on('loaded.jstree', function() {
                //$treeview.jstree('open_all');
            }).on('changed.jstree', function (e, data) {
                if(data.node!==undefined){
//                    console.log(data.node.id);
                    categoryId = data.node.id;
                    $('input[name="parent_id"]').val(categoryId);
                    loadProducts(categoryId);
                }
            }).bind("move_node.jstree", function(e, data) {
                //console.log("Drop node " + data.node.id + " to " + data.parent);
                $.post('category/change',{parent:data.parent,child:data.node.id},function(result){
                    location.reload();
                });
            });
        });

        var loadProducts = function (id) {
            load.on();
            $('.lp').load('category/products/'+id,function(){
                load.off();
            });
        }

    </script>
@stop
