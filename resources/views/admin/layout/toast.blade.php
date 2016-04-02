@if(Session::has('success'))
    <style>
        .nD{
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 12;
            box-shadow: 0 0 5px black;
            font-size: 15px;
            letter-spacing: 1px;
        }
    </style>

    <div class="alert alert-dismissible alert-{{Session::has('success')?'success':'warning'}} nD">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{Session::get('success')}}</strong>
    </div>
@endif