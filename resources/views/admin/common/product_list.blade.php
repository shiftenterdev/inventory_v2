<table class="table table-bordered">
    <thead>
        <tr class="t-imp">
            <th width="3%">Sl</th>
            <th>Product</th>
            <th width="10%">Price</th>
            <th width="10%">Quantity</th>
            <th width="8%">Discount</th>
            <th width="10%">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0;?>
        @if(count($invoice->products) > 0)
        @foreach($invoice->products as $k => $t)
        <tr>
            <td>{{$k+1}}</td>
            <td>
                {{title($t->product->title)}} [{{$t->product->code}}]
                <small>
                    <a href="javascript:" class="confirm remove red" data-code="{{$t->product->code}}">
                        <i class="fa fa-times"></i> Remove</a>
                    </small>
                </td>
                <td><input type="text" class="input-sm form-control num price small select-text" data-code="{{$t->product->code}}"
                 value="{{$t->price}}" style="display: inline-block;"></td>
                 <td>
                    <div class="input-group">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-warning btn-quantity" data-type="mmp" data-field="quantity[{{$k}}]">
                              <span class="fa fa-minus"></span>
                          </button>
                      </span>
                      <input type="text" name="quantity[{{$k}}]" class="form-control input-sm quantity" data-code="{{$t->product->code}}"
                  value="{{$t->quantity}}">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-success btn-quantity" data-type="plus" data-field="quantity[{{$k}}">
                              <span class="fa fa-plus"></span>
                          </button>
                      </span>
                  </div>
              </td>
              <td>
                <input type="text" class="input-sm form-control num discount small select-text" data-code="{{$t->product->code}}"
                value="{{$t->discount}}">
            </td>
            <td class="text-right">{{money($t->quantity * ($t->price - $t->discount))}}</td>
        </tr>
        <?php $total += ($t->quantity * ($t->price - $t->discount));?>
        @endforeach
        @endif

        <tr>
            <td>#</td>
            <td colspan="5">
                <input type="text" class="form-control" placeholder="Search by Name or Code" id="product">
            </td>
        </tr>
    </tbody>
    <tfooter>
        <tr>
            <td colspan="5" class="text-right">Net Total</td>
            <td><input type="text" class="small form-control" value="{{money($total)}}" readonly="readonly"></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">Other Discount</td>
            <td><input type="text" class="small form-control select-text" name="other_discount" value="{{$invoice->other_discount}}"></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">Delivery Charge</td>
            <td><input type="text" class="small form-control select-text" name="delivery_charge" value="{{$invoice->delivery_charge}}"></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">TAX(<input type="text" class="form-control small select-text" style="width: 100px" value="{{$invoice->tax}}" name="tax">%)</td>
            <td><input type="text" class="small form-control select-text" name="tax_amount" value="{{money($total*($invoice->tax/100))}}" readonly="readonly"></td>
        </tr>

        <tr>

            <td colspan="5" class="text-right">Grand Total :</td>
            <td colspan="1" class="text-right">{{money($total-($invoice->other_discount)+($invoice->delivery_charge)+($total*($invoice->tax/100)))}}</td>
        </tr>
    </tfooter>
</table>