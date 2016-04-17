<style>

    .iMP .img-thumbnail{
        max-height: 100px;
        max-width: 110px;
        cursor: pointer;
    }
    .img-div a{
        position: absolute;
        top: -8px;
        right: 0;
        font-size: 16px;
        z-index: 20;
    }
</style>
<div class="row">
    @foreach($images as $i)
        <div class="col-md-3">
            <div class="img-div">
                <a href="javascript:" data-id="{{$i->id}}" class="dImg">
                    <i class="fa fa-times-circle text-danger"></i>
                </a>
                <img src="/uploads/{{$i->img_title}}" class="gImg" data-id="{{$i->id}}">
            </div>
        </div>
    @endforeach
</div>
