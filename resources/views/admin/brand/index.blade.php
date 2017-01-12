@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Brand</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Brand List
                <a href="brand/create" class="btn btn-sm btn-primary nB pull-right">
                    <i class="fa fa-plus"></i> New Brand</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Logo</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $k => $b)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>
                            @if(!empty($b->logo))
                            <img src="/uploads/{{$b->logo}}" alt="No Image" class="t-img">
                                @endif
                        </td>
                        <td>{{$b->brand_title}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="brand/edit/{{$b->id}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="brand/delete/{{$b->id}}" class="btn btn-sm btn-danger confirm"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </fieldset>

    </div>
@endsection
