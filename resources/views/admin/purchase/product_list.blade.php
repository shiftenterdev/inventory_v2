<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr class="t-imp">
                <th>Sl</th>
                <th>Product Code</th>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php setlocale(LC_MONETARY, 'en_IN');?>
            <?php $total = 0;?>
            @if(!empty($temp_pro))
                @foreach($temp_pro as $k => $p)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$p->pro_code}}</td>
                        <td>{{$p->pro_title}}
                            <a href="javascript:" class="text-danger confirm rBI" data-key="{{$k}}"><i
                                        class="fa fa-times"></i></a>
                        </td>
                        <td>{{money_format('%!i',$p->pro_price)}}</td>
                        <td>

                            <input type="text" class="input-sm num pq-p" data-code="{{$p->pro_code}}"
                                   style="width:40px;text-align: center" value="{{$p->pro_quantity}}">
                        </td>
                        <td>{{money_format('%!i',($p->pro_quantity * $p->pro_price))}}</td>

                    </tr>
                    <?php $total += $p->pro_quantity * $p->pro_price?>
                @endforeach
            @endif
            <tr>
                <td>#</td>
                <td>
                    <select name="pro_code" class="form-control input-sm bpo">
                        <option value="">Select</option>
                        @foreach($products as $p)
                            <option value="{{$p->pro_code}}">{{$p->pro_code}}</option>
                        @endforeach
                    </select>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            </tbody>
            <tfooter>
                <tr class="t-imp">

                    <th colspan="5" class="text-right">Net Total :</th>
                    <th colspan="`">{{money_format('%!i', $total)}}</th>
                </tr>
            </tfooter>
        </table>
        <div class="text-center">
            <a href="javascript:" class="btn btn-primary purchase-invoice"><i class="fa fa-print"></i> Invoice</a>
        </div>
    </div>
</div>