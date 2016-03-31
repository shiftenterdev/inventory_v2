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
    }
</style>
<div class="row">
    @foreach($images as $i)
        <div class="col-md-3">
            <div class="iMP">
                <img src="/uploads/{{$i->img_title}}" alt="" class="img-thumbnail">
            </div>
        </div>
    @endforeach
</div>
