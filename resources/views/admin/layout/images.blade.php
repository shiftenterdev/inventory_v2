<style>
    .iMP{
        height: 104px;
        text-align: center;
        background-color: #ddd;
        padding: 2px;
        width: 100%;
        display: inline-table;
        margin-bottom: 5px;
    }
    .iMP .img-thumbnail{
        max-height: 100px;
        max-width: 110px;
        cursor: pointer;
    }
    .iMP a{
        float: right;
        margin-top: -6px;
    }
</style>
<div class="row">
    @foreach($images as $i)
        <div class="col-md-3">
            <div class="iMP">
                <a href="javascript:" data-id="{{$i->id}}" class="dImg">
                    <i class="fa fa-times-circle text-danger"></i>
                </a>
                <img src="/uploads/{{$i->img_title}}" class="img-thumbnail gImg" data-id="{{$i->id}}">
            </div>
        </div>
    @endforeach
</div>
