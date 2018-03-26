<table class="table table-bordered">
    <thead>
    <tr class="t-imp">
        <th>Sl</th>
        <th>Product</th>
        <th>Price</th>
        <th width="5%">Quantity</th>
        <th width="8%">Discount</th>
        <th width="10%">Total</th>
    </tr>
    </thead>
    <tbody>
    <?php $total = 0;?>
    @if(!empty($temp_pro))
        @foreach($temp_pro as $k => $p)
            <tr>
                <td>{{$k+1}}</td>
                <td>
                    {{title($p->product->title)}} [{{$p->product->code}}]
                    <small>
                        <a href="javascript:" class="confirm rSI red" data-code="{{$p->product->code}}">
                            <i class="fa fa-times"></i> Remove</a>
                    </small>
                </td>
                <td class="text-right">{{money($p->product->price)}}</td>
                <td>
                    <input type="text" class="input-sm form-control num pq-s small select-text" data-code="{{$p->product->code}}"
                           value="{{$p->quantity}}">
                </td>
                <td>
                    <input type="text" class="input-sm form-control num pd-s small select-text" data-code="{{$p->product->code}}"
                           value="{{$p->discount}}">
                </td>
                <td class="text-right">{{money($p->quantity * ($p->product->price - $p->discount))}}</td>
            </tr>
            <?php $total += $p->quantity * ($p->product->price - $p->dicount)?>
        @endforeach
    @endif
    <tr>
        <td>#</td>
        <td colspan="5">
            <select id="pro_code" class="form-control input-sm spo select">
                <option value="">Select</option>
                @foreach($products as $p)
                    <option value="{{$p->code}}">{{$p->title}} [{{$p->code}}]</option>
                @endforeach
            </select>
        </td>
    </tr>
    </tbody>
    <tfooter>
        <tr>
            <td colspan="5" class="text-right">Discount</td>
            <td><input type="text" class="small form-control discount select-text" value="{{$invoice->delivery_charge}}"></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">Delivery Charge</td>
            <td><input type="text" class="small form-control dc select-text" value="{{$invoice->delivery_charge}}"></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">TAX(%)</td>
            <td><input type="text" class="small form-control tax select-text" value="{{$invoice->tax}}"></td>
        </tr>

        <tr>

            <td colspan="5" class="text-right">Net Total :</td>
            <td colspan="1" class="text-right">{{money($total+$invoice->delivery_charge+$invoice->tax/100*$total)}}</td>
        </tr>
    </tfooter>
</table>