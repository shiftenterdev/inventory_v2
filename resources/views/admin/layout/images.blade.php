<div class="row">
    @foreach($images as $i)
        <div class="col-md-3">
            <div class="img-div">
                <a href="javascript:" data-id="{{$i->id}}" class="dImg">
                    Delete
                </a>
                <img src="/uploads/{{$i->img_title}}" class="gImg" data-id="{{$i->id}}">
            </div>
        </div>
    @endforeach
</div>
