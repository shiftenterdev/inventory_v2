<div class="row">
    <div class="col-md-12">
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
                            {{title($p->product->pro_title)}} [{{$p->product->pro_code}}]
                            <small>
                                <a href="javascript:" class="confirm rSI red" data-code="{{$p->product->pro_code}}">
                                    <i class="fa fa-times"></i> Remove</a>
                            </small>
                        </td>
                        <td>{{money($p->product->pro_price)}}</td>
                        <td>
                            <input type="text" class="input-sm form-control num pq-s small" data-code="{{$p->product->pro_code}}"
                                    value="{{$p->quantity}}">
                        </td>
                        <td>
                            <input type="text" class="input-sm form-control num pd-s small" data-code="{{$p->product->pro_code}}"
                                    value="{{$p->discount}}">
                        </td>
                        <td>{{money($p->quantity * ($p->product->pro_price - $p->discount))}}</td>
                    </tr>
                    <?php $total += $p->quantity * ($p->product->pro_price - $p->dicount)?>
                @endforeach
            @endif
            <tr>
                <td>#</td>
                <td colspan="5">
                    <select name="pro_code" id="pro_code" class="form-control input-sm spo select">
                        <option value="">Select</option>
                        @foreach($products as $p)
                            <option value="{{$p->pro_code}}">{{$p->pro_title}} [{{$p->pro_code}}]</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            </tbody>
            <tfooter>
                <tr>
                    <td colspan="5" class="text-right">Delivery Charge</td>
                    <td><input type="text" class="small form-control dc" value="{{session('charge')}}"></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">TAX(%)</td>
                    <td><input type="text" class="small form-control tax" value="{{session('tax')}}"></td>
                </tr>

                <tr>

                    <td colspan="5" class="text-right">Net Total :</td>
                    <td colspan="1">{{money($total)}}</td>
                </tr>
            </tfooter>
        </table>
        <div class="text-center">
            <a href="javascript:" class="btn btn-primary sell-invoice"><i class="fa fa-print"></i> Invoice</a>
        </div>

    </div>
</div>