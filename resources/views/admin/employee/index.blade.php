@extends('admin.layout.index')


@section('content')

    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Employee</li>
    </ul>
    <div class="cN">
        <fieldset>
            <legend>
                Employee List
                <a href="javascript:" class="btn btn-sm btn-primary nB pull-right openRight">
                    <i class="fa fa-plus"></i> New Employee</a>
            </legend>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Status</th>
                    <th>Join Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $k => $b)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$b->name}}</td>
                        <td>{{$b->designation}}</td>
                        <td>{{$b->status=='1'?'Active':'Inactive'}}</td>
                        <td>{{$b->date_of_join}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="employee/edit/{{$b->id}}" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                <a href="employee/delete/{{$b->id}}" class="btn btn-sm btn-danger confirm"><i
                                            class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </fieldset>

    </div>

    @extends('admin.layout.right',['title'=>'New Employee'])
@section('slot')
    <form action="employee/store" class="form-horizontal" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="first-option">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Designation</label>
                <input type="text" name="designation" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control select">
                    <option value="1">Active</option>
                    <option value="0">In-active</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Date of Join</label>
                <input type="text" name="date_of_join" class="form-control date">
            </div>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Employee</button>
        </div>
    </form>
@stop

@endsection
