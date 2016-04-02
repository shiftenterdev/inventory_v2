@if(Session::has('success'))
    <div class="alert alert-dismissible alert-success nD">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{Session::get('success')}}</strong>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-dismissible alert-warning nD">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{Session::get('error')}}</strong>
    </div>
@endif