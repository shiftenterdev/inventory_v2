@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Slider</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Slider List
                <a href="slider/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New
                    Slider</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Url</th>
                    <th>target</th>
                    <th>Status</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $p)
                    <tr>
                        <td><img src="{{$p->image_url}}" alt="" style="width: 100px"></td>
                        <td>{{$p->title}}</td>
                        <td>{{$p->link}}</td>
                        <td>{{$p->brand->title}}</td>
                        <td>{{$p->target}}</td>
                        <td>{!! $p->status==1?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>' !!}</td>
                        <td>
                            <div class="btn-group">
                                <a href="product/edit/{{$p->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="product/delete/{{$p->id}}" class="btn btn-sm btn-danger confirm"><i
                                            class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </fieldset>

    </div>

@endsection
