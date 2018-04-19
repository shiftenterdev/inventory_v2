@extends('admin.layout.index')


@section('content')
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Table</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Table List
                <a href="table/create" class="btn btn-sm btn-primary nB pull-right"><i class="fa fa-plus"></i> New
                    Table</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Table No</th>
                    <th>To Seat</th>
                    <th>Status</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tables as $p)
                    <tr>
                        <td>{{$p->table_no}}</td>
                        <td>{{$p->to_seat}}</td>
                        <td>{{$p->status==1?'Free':'Closed'}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="table/edit/{{$p->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="table/delete/{{$p->id}}" class="btn btn-sm btn-danger confirm"><i
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
