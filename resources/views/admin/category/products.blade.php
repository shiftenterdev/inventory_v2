<legend>Category: <ins>{{$category->title}}</ins></legend>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Code</th>
        <th>Title</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Purchase Price</th>
        <th>Sell Price</th>
        <th>Quantity</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $p)
        <tr>
            <td>{{$p->code}}</td>
            <td>{{$p->title}}</td>
            <td>{{$p->category_names}}</td>
            <td>{{$p->brand->title}}</td>
            <td>{{money($p->purchase_price)}}</td>
            <td>{{money($p->sell_price)}}</td>
            <td>{{$p->quantity}}</td>
            <td>{!! $p->status==1?'<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>' !!}</td>

        </tr>
    @endforeach
    </tbody>
</table>